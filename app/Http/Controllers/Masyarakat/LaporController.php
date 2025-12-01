<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use App\Models\Kategori; // Pastikan Model Kategori ada
use Illuminate\Support\Str;

class LaporController extends Controller
{
    // 1. HALAMAN BUAT LAPORAN
    public function create()
    {
        $kategoris = Kategori::all();
        return view('masyarakat.lapor.create', compact('kategoris'));
    }

    // 2. PROSES SIMPAN LAPORAN
    public function store(Request $request)
    {
        $request->validate([
            'judul_laporan'   => 'required|max:255',
            'kategori_id'     => 'required',
            'tgl_kejadian'    => 'required|date',
            'lokasi_kejadian' => 'required',
            'isi_laporan'     => 'required',
            'foto_kejadian'   => 'nullable|image|max:2048',
        ]);

        $nama_file = null;
        if ($request->hasFile('foto_kejadian')) {
            $file = $request->file('foto_kejadian');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move('bukti_laporan', $nama_file);
        }

        Pengaduan::create([
            'user_id'           => Auth::id(),
            'tgl_pengaduan'     => now(),
            'judul_laporan'     => $request->judul_laporan,
            'kategori_id'       => $request->kategori_id,
            'tgl_kejadian'      => $request->tgl_kejadian,
            'lokasi_kejadian'   => $request->lokasi_kejadian,
            'isi_laporan'       => $request->isi_laporan,
            'foto_kejadian'     => $nama_file,
            'status'            => '0',
        ]);

        return redirect()->route('masyarakat.dashboard')
            ->with('success', 'Laporan berhasil dikirim!');
    }

    // 3. HALAMAN DETAIL
    public function show($id)
    {
        $pengaduan = Pengaduan::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();
        return view('masyarakat.show', compact('pengaduan'));
    }

    // 4. HALAMAN EDIT (INI YANG HILANG TADI)
    // 4. FORM EDIT
    public function edit($id)
    {
        $pengaduan = Pengaduan::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();
        
        // PERBAIKAN LOGIKA:
        // Jika statusnya SUDAH 'proses', 'selesai', atau 'ditolak', BARU KITA TOLAK.
        // Selain itu (termasuk 0, pending, null) BOLEH MASUK.
        if (in_array($pengaduan->status, ['proses', 'selesai', 'ditolak'])) {
            return redirect()->route('masyarakat.dashboard')->with('error', 'Laporan sedang diproses, tidak bisa diedit lagi!');
        }

        // Ambil kategori untuk dropdown agar form edit sama seperti admin
        $kategoris = \App\Models\Kategori::all();
        return view('masyarakat.lapor.edit', compact('pengaduan', 'kategoris'));
    }

    // 5. UPDATE
    public function update(Request $request, $id)
    {
        $pengaduan = Pengaduan::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Cek status lagi sebelum simpan
        if (in_array($pengaduan->status, ['proses', 'selesai', 'ditolak'])) {
            return redirect()->route('masyarakat.dashboard')->with('error', 'Gagal update! Laporan sudah diproses.');
        }

        $request->validate([
            'judul_laporan' => 'required|max:255',
            'isi_laporan'   => 'required',
            'foto_kejadian' => 'nullable|image|max:2048',
            'kategori_id'   => 'nullable|exists:kategoris,id',
            'tgl_kejadian'  => 'nullable|date',
            'lokasi_kejadian' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('foto_kejadian') && $request->file('foto_kejadian')->isValid()) {
            $file = $request->file('foto_kejadian');
            $ext = $file->getClientOriginalExtension();
            $nama_file = time() . '_' . Str::random(8) . '.' . $ext;

            $targetDir = public_path('bukti_laporan');
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }

            // Pindahkan file baru
            $file->move($targetDir, $nama_file);

            // Hapus file lama jika ada
            if ($pengaduan->foto_kejadian && file_exists($targetDir . DIRECTORY_SEPARATOR . $pengaduan->foto_kejadian)) {
                @unlink($targetDir . DIRECTORY_SEPARATOR . $pengaduan->foto_kejadian);
            }

            // Set nama file baru ke model
            $pengaduan->foto_kejadian = $nama_file;
        }

        $pengaduan->judul_laporan = $request->judul_laporan;
        $pengaduan->isi_laporan   = $request->isi_laporan;
        // Simpan kategori dan tanggal kejadian jika diberikan
        if ($request->has('kategori_id')) {
            $pengaduan->kategori_id = $request->kategori_id;
        }
        if ($request->has('tgl_kejadian')) {
            $pengaduan->tgl_kejadian = $request->tgl_kejadian;
        }
        if ($request->has('lokasi_kejadian')) {
            $pengaduan->lokasi_kejadian = $request->lokasi_kejadian;
        }
        
        $pengaduan->save();

        return redirect()->route('masyarakat.dashboard')->with('success', 'Laporan berhasil diperbarui!');
    }

    // Hapus hanya foto laporan (user)
    public function hapusFoto($id)
    {
        $pengaduan = Pengaduan::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Cek status sebelum hapus foto
        if (in_array($pengaduan->status, ['proses', 'selesai', 'ditolak'])) {
            return redirect()->back()->with('error', 'Foto tidak bisa dihapus setelah laporan diproses.');
        }

        $targetDir = public_path('bukti_laporan');
        if ($pengaduan->foto_kejadian && file_exists($targetDir . DIRECTORY_SEPARATOR . $pengaduan->foto_kejadian)) {
            @unlink($targetDir . DIRECTORY_SEPARATOR . $pengaduan->foto_kejadian);
        }

        $pengaduan->foto_kejadian = null;
        $pengaduan->save();

        return redirect()->back()->with('success', 'Foto berhasil dihapus.');
    }

    // 6. HAPUS
    public function destroy($id)
    {
        $pengaduan = Pengaduan::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Cek status
        if (in_array($pengaduan->status, ['proses', 'selesai', 'ditolak'])) {
            return redirect()->route('masyarakat.dashboard')->with('error', 'Gagal hapus! Laporan sudah diproses.');
        }

        // Hapus file foto jika ada
        $targetDir = public_path('bukti_laporan');
        if ($pengaduan->foto_kejadian && file_exists($targetDir . DIRECTORY_SEPARATOR . $pengaduan->foto_kejadian)) {
            @unlink($targetDir . DIRECTORY_SEPARATOR . $pengaduan->foto_kejadian);
        }

        $pengaduan->delete();

        return redirect()->route('masyarakat.dashboard')->with('success', 'Laporan berhasil dihapus.');
    }
}