<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class SiteController extends Controller
{
    public function index()
    {
        // 1. Hitung Statistik Utama
        $total = Pengaduan::count();
        $proses = Pengaduan::where('status', 'proses')->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();

        // 2. Hitung Per Kategori (Fitur Baru)
        // Kita cari berdasarkan kata kunci di nama kategori
        $kemacetan = Pengaduan::whereHas('kategori', function($q){
            $q->where('nama_kategori', 'like', '%macet%');
        })->count();

        $kecelakaan = Pengaduan::whereHas('kategori', function($q){
            $q->where('nama_kategori', 'like', '%celaka%');
        })->count();

        $infrastruktur = Pengaduan::whereHas('kategori', function($q){
            $q->where('nama_kategori', 'like', '%rusak%')
              ->orWhere('nama_kategori', 'like', '%jalan%');
        })->count();

        $pelanggaran = Pengaduan::whereHas('kategori', function($q){
            $q->where('nama_kategori', 'like', '%langgar%');
        })->count();

        // 3. Kirim semua data ke View
        return view('welcome', compact(
            'total', 'proses', 'selesai', 
            'kemacetan', 'kecelakaan', 'infrastruktur', 'pelanggaran'
        ));
    }
}