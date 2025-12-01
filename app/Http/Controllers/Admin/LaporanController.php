<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivityLog; // <--- Tambahkan di paling atas file
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Pengaduan; // Panggil Model Pengaduan
use App\Models\User; // <--- TAMBAHKAN INI
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LaporanController extends Controller
{
// 1. MENAMPILKAN DAFTAR LAPORAN (DENGAN FITUR SEARCH)
    public function index(Request $request)
    {
        // Mulai query dasar (ambil data + relasi user)
        // Kita pakai 'updated_at' desc agar yang baru diupdate ada di atas
        $query = Pengaduan::with('user')->orderBy('updated_at', 'desc');

        // LOGIKA PENCARIAN
        // Jika di URL ada ?search=sesuatu
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            
            // Cari di Judul ATAU Lokasi ATAU Nama Pelapor
            $query->where(function($q) use ($search) {
                $q->where('judul_laporan', 'like', '%' . $search . '%')
                  ->orWhere('lokasi_kejadian', 'like', '%' . $search . '%')
                  // Cari juga berdasarkan nama user (relasi)
                  ->orWhereHas('user', function($u) use ($search) {
                      $u->where('name', 'like', '%' . $search . '%');
                  });
            });
        }

        // Eksekusi (Ambil Datanya)
        $laporanMasuk = $query->get();

        return view('admin.laporan.index', compact('laporanMasuk'));
    }

// 2. MENAMPILKAN DETAIL LAPORAN
    public function show($id)
    {
        $pengaduan = Pengaduan::with(['user', 'petugas'])->findOrFail($id);

        // TAMBAHAN: Ambil daftar user yang role-nya 'petugas'
        // Ini biar Admin bisa milih: "Mau kasih tugas ke siapa?"
        $penduduk_petugas = User::where('role', 'petugas')->get();

        return view('admin.laporan.show', compact('pengaduan', 'penduduk_petugas'));
    }

    // 3. MENGUPDATE STATUS & PETUGAS
    public function update(Request $request, $id)
    {
        $request->validate([
            'status'     => 'required|in:0,proses,selesai,ditolak',
            'tanggapan'  => 'nullable|string',
            'petugas_id' => 'nullable|exists:users,id', // Validasi ID Petugas
        ]);

        $pengaduan = Pengaduan::findOrFail($id);

        $pengaduan->update([
            'status'     => $request->status,
            'tanggapan'  => $request->tanggapan,
            'petugas_id' => $request->petugas_id, // Simpan Petugas yang dipilih
        ]);

        ActivityLog::record('Admin memperbarui status laporan #' . $id . ' menjadi: ' . $request->status);

        return redirect()->back()->with('success', 'Status dan Petugas berhasil diperbarui!');
    }

    // Fungsi Cetak PDF
    public function cetak($id)
    {
        $pengaduan = Pengaduan::with('user')->findOrFail($id);
        
        // Load view khusus PDF (kita buat sebentar lagi)
        $pdf = Pdf::loadView('admin.laporan.pdf', compact('pengaduan'));
        
        // Download PDF
        return $pdf->download('laporan-satlantas-'.$pengaduan->id.'.pdf');
    }

// 1. MENAMPILKAN HALAMAN KHUSUS CETAK (View Filter)
    public function halamanCetak()
    {
        return view('admin.laporan.cetak');
    }

    // 2. PROSES CETAK PDF (Action Download)
    public function cetakLaporan(Request $request)
    {
        // 1. Ambil Input
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        $type  = $request->input('type', 'download'); // Default download

        // 2. Query Data
        $query = Pengaduan::with(['user', 'petugas'])->orderBy('tgl_pengaduan', 'asc');

        if ($bulan) {
            $query->whereMonth('tgl_pengaduan', $bulan);
        }
        if ($tahun) {
            $query->whereYear('tgl_pengaduan', $tahun);
        }

        $laporan = $query->get();

        // 3. Judul Periode (CARA LEBIH AMAN - Manual Array Bulan)
        $namaBulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        if ($bulan && $tahun) {
            $periode = "PERIODE: " . strtoupper($namaBulan[$bulan]) . " " . $tahun;
        } elseif ($tahun) {
            $periode = "PERIODE: TAHUN " . $tahun;
        } else {
            $periode = "PERIODE: SEMUA WAKTU";
        }

        // 4. Load PDF
        $pdf = Pdf::loadView('admin.laporan.rekap_pdf', compact('laporan', 'periode'));
        $pdf->setPaper('a4', 'landscape');

        // 5. Cek Permintaan: Mau Preview (Print) atau Download?
        if ($type == 'print') {
            return $pdf->stream('laporan-satlantas.pdf'); // Buka di browser (bisa langsung print)
        } else {
            return $pdf->download('laporan-satlantas.pdf'); // Langsung download file
        }
    }
// --- FUNGSI EDIT (MENAMPILKAN FORM) ---
    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        // Ambil data kategori untuk dropdown (jika pakai tabel kategori)
        $kategoris = \App\Models\Kategori::all(); 
        
        return view('admin.laporan.edit', compact('pengaduan', 'kategoris'));
    }

    // --- FUNGSI UPDATE (MENYIMPAN PERUBAHAN) ---
    public function updateLaporan(Request $request, $id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $request->validate([
            'judul_laporan' => 'required|string|max:255',
            'isi_laporan' => 'required',
            'kategori_id' => 'nullable|exists:kategoris,id',
            'foto_kejadian' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'lokasi_kejadian' => 'nullable|string|max:255',
        ]);

        // Siapkan data untuk update
        $data = [
            'judul_laporan' => $request->judul_laporan,
            'isi_laporan' => $request->isi_laporan,
            'kategori_id' => $request->kategori_id,
            'lokasi_kejadian' => $request->lokasi_kejadian,
        ];

        // Jika ada file foto baru, simpan dan hapus file lama
        if ($request->hasFile('foto_kejadian') && $request->file('foto_kejadian')->isValid()) {
            $file = $request->file('foto_kejadian');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '_' . Str::random(8) . '.' . $ext;

            // Pastikan folder tujuan ada
            $targetDir = public_path('bukti_laporan');
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }

            // Pindahkan file
            $file->move($targetDir, $filename);

            // Hapus file lama jika ada
            if ($pengaduan->foto_kejadian && file_exists($targetDir . DIRECTORY_SEPARATOR . $pengaduan->foto_kejadian)) {
                @unlink($targetDir . DIRECTORY_SEPARATOR . $pengaduan->foto_kejadian);
            }

            // Set nama file baru ke data update
            $data['foto_kejadian'] = $filename;
        }

        // Lakukan update
        $pengaduan->update($data);

        return redirect()->route('admin.laporan.index')->with('success', 'Data laporan berhasil diperbarui!');
    }

    // --- FUNGSI DESTROY (MENGHAPUS) ---
    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        
        // Hapus file foto jika ada (agar hemat penyimpanan)
        $targetDir = public_path('bukti_laporan');
        if ($pengaduan->foto_kejadian && file_exists($targetDir . DIRECTORY_SEPARATOR . $pengaduan->foto_kejadian)) {
            @unlink($targetDir . DIRECTORY_SEPARATOR . $pengaduan->foto_kejadian);
        }

        $pengaduan->delete();

        return redirect()->route('admin.laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }

    // Hapus hanya foto laporan (Admin)
    public function hapusFoto($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        $targetDir = public_path('bukti_laporan');
        if ($pengaduan->foto_kejadian && file_exists($targetDir . DIRECTORY_SEPARATOR . $pengaduan->foto_kejadian)) {
            @unlink($targetDir . DIRECTORY_SEPARATOR . $pengaduan->foto_kejadian);
        }

        $pengaduan->foto_kejadian = null;
        $pengaduan->save();

        return redirect()->back()->with('success', 'Foto laporan berhasil dihapus.');
    }

}