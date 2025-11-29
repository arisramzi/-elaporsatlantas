<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil ID user yang login
        $userId = Auth::id();

        // 2. Ambil SEMUA data laporan milik user ini
        $riwayatLaporan = Pengaduan::where('user_id', $userId)
                            ->with('kategori') // Optimasi query
                            ->latest('tgl_pengaduan')
                            ->get();

        // 3. HITUNG STATISTIK (Ini bagian pentingnya)
        
        // A. Total Semua
        $totalLaporan = $riwayatLaporan->count();

        // B. Verifikasi (Status 0 atau pending)
        $pending = $riwayatLaporan->filter(function ($item) {
            return $item->status == '0' || $item->status == 'pending' || $item->status == null;
        })->count();

        // C. Diproses
        $diproses = $riwayatLaporan->where('status', 'proses')->count();

        // D. Selesai
        $selesai = $riwayatLaporan->where('status', 'selesai')->count();

        // E. Ditolak (Hitung status 'ditolak')
        $ditolak = $riwayatLaporan->where('status', 'ditolak')->count();

        // 4. Kirim semua data ke View
        return view('masyarakat.dashboard', compact(
            'riwayatLaporan', 
            'totalLaporan', 
            'pending', 
            'diproses', 
            'selesai', 
            'ditolak'
        ));
    }
}