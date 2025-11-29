<?php

// app/Http/Controllers/MasyarakatController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;      // Pastikan Model Laporan di-import
use Illuminate\Support\Facades\Auth; // Pastikan Auth di-import

class MasyarakatController extends Controller
{
    /**
     * Menampilkan Dashboard untuk pengguna (masyarakat).
     */
    public function dashboard()
{
    // 1. Ambil ID User yang login
    $userId = Auth::id();

    // 2. Ambil SEMUA laporan milik user ini
    // (Jangan pakai filter 'where status' dulu, agar semua muncul)
    $riwayatLaporan = Laporan::where('user_id', $userId)
                        ->orderBy('created_at', 'desc') // Urutkan dari yang terbaru
                        ->get();

    // 3. Hitung jumlah untuk kartu statistik
    $totalLaporan = $riwayatLaporan->count();
    $diproses = $riwayatLaporan->where('status', 'proses')->count(); // Sesuaikan 'proses' dengan database kamu
    $selesai = $riwayatLaporan->where('status', 'selesai')->count(); // Sesuaikan 'selesai' dengan database kamu

    // 4. Kirim ke View
    return view('masyarakat.dashboard', compact('riwayatLaporan', 'totalLaporan', 'diproses', 'selesai'));
}
}