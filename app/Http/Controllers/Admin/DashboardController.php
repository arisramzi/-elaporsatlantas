<?php

namespace App\Http\Controllers\Admin;

use App\Models\ActivityLog;
use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Hitung Total
        $total = Pengaduan::count();

        // 2. Hitung Perlu Verifikasi (0, '0', 'pending', atau null)
        $pending = Pengaduan::where('status', '0')
                            ->orWhere('status', 0)
                            ->orWhere('status', 'pending')
                            ->orWhereNull('status')
                            ->count();

        // 3. Hitung Sedang Proses
        $proses = Pengaduan::where('status', 'proses')->count();

        // 4. Hitung Ditolak (INI TAMBAHAN BARU)
        $ditolak = Pengaduan::where('status', 'ditolak')->count();

        // 5. Hitung Selesai
        $selesai = Pengaduan::where('status', 'selesai')->count();

        // 5. Ambil 5 Aktivitas Terakhir (Log System)
        $logs = ActivityLog::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
        'total', 'pending', 'proses', 'ditolak', 'selesai', 'logs' // Tambahkan 'logs'
        ));
    }
}