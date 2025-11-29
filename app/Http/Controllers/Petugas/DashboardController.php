<?php

namespace App\Http\Controllers\Petugas;

use App\Models\ActivityLog; // <--- Tambahkan di paling atas file
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        $petugasId = Auth::id();
        $tugasSaya = Pengaduan::where('petugas_id', $petugasId)
                            ->whereIn('status', ['proses', '0', 'pending']) 
                            ->orderBy('created_at', 'desc')
                            ->get();
        $selesaiSaya = Pengaduan::where('petugas_id', $petugasId)
                            ->where('status', 'selesai')
                            ->count();

        return view('petugas.dashboard', compact('tugasSaya', 'selesaiSaya'));
    }

    // 1. MENAMPILKAN FORM LAPORAN KERJA
    public function edit($id)
    {
        $pengaduan = Pengaduan::where('id', $id)
                        ->where('petugas_id', Auth::id())
                        ->firstOrFail();

        return view('petugas.edit', compact('pengaduan'));
    }

    // 2. MENYIMPAN LAPORAN KERJA (UPDATE)
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:proses,selesai,ditolak',
            'tanggapan_petugas' => 'required_if:status,selesai,ditolak', // Wajib isi jika selesai/tolak
            'foto_penanganan' => 'nullable|image|max:2048',
        ]);

        $pengaduan = Pengaduan::where('id', $id)->where('petugas_id', Auth::id())->firstOrFail();

        // Upload Foto Penanganan (Jika ada)
        $nama_file = $pengaduan->foto_penanganan;
        if ($request->hasFile('foto_penanganan')) {
            $file = $request->file('foto_penanganan');
            $nama_file = time() . "_penanganan_" . $file->getClientOriginalName();
            $file->move('bukti_laporan', $nama_file);
        }

        // Update Database
        $pengaduan->update([
            'status' => $request->status,
            'tanggapan_petugas' => $request->tanggapan_petugas,
            'foto_penanganan' => $nama_file
        ]);

        ActivityLog::record('Petugas menyelesaikan tugas laporan #' . $id);

        return redirect()->route('petugas.dashboard')->with('success', 'Laporan kerja berhasil dikirim!');
    }
}