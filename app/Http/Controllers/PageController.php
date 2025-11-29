<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // 1. Halaman Kemacetan
    public function kemacetan()
    {
        return view('pages.kemacetan');
    }

    // 2. Halaman Kecelakaan
    public function kecelakaan()
    {
        return view('pages.kecelakaan');
    }

    // 3. Halaman Infrastruktur
    public function infrastruktur()
    {
        return view('pages.infrastruktur');
    }

    // 4. Halaman Pelanggaran
    public function pelanggaran()
    {
        return view('pages.pelanggaran');
    }
}