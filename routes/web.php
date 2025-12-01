<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PageController; // <--- Tambahkan ini

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [SiteController::class, 'index'])->name('welcome');

// --- HALAMAN INFORMASI PUBLIK (BARU) ---
Route::prefix('informasi')->name('info.')->group(function () {
    Route::get('/kemacetan', [PageController::class, 'kemacetan'])->name('kemacetan');
    Route::get('/kecelakaan', [PageController::class, 'kecelakaan'])->name('kecelakaan');
    Route::get('/infrastruktur', [PageController::class, 'infrastruktur'])->name('infrastruktur');
    Route::get('/pelanggaran', [PageController::class, 'pelanggaran'])->name('pelanggaran');
});

// --- LOGIKA REDIRECT UTAMA ---
// Mengarahkan user ke dashboard yang sesuai dengan perannya
Route::get('/dashboard', function () {
    $role = Auth::user()->role;
    
    if ($role == 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($role == 'petugas') {
        return redirect()->route('petugas.dashboard');
    } else {
        return redirect()->route('masyarakat.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


// ====================================================
// 1. JALUR MASYARAKAT
// ====================================================
// --- JALUR MASYARAKAT ---
Route::middleware(['auth', 'role:masyarakat'])
    ->prefix('masyarakat')
    ->name('masyarakat.')
    ->group(function () {
        
        // Dashboard
        Route::get('/dashboard', [\App\Http\Controllers\Masyarakat\DashboardController::class, 'index'])
            ->name('dashboard');

        // Detail
        Route::get('/laporan/{id}', [\App\Http\Controllers\Masyarakat\LaporController::class, 'show'])
            ->name('laporan.show');

        // Form Buat Laporan
        Route::get('/lapor/create', [\App\Http\Controllers\Masyarakat\LaporController::class, 'create'])
            ->name('lapor.create');
        
        // Kirim Laporan
        Route::post('/lapor', [\App\Http\Controllers\Masyarakat\LaporController::class, 'store'])
            ->name('lapor.store');

        // --- EDIT & UPDATE ---
        Route::get('/laporan/{id}/edit', [\App\Http\Controllers\Masyarakat\LaporController::class, 'edit'])
            ->name('laporan.edit');

        Route::put('/laporan/{id}', [\App\Http\Controllers\Masyarakat\LaporController::class, 'update'])
            ->name('laporan.update');

        // Hapus/Remove Foto Laporan (Masyarakat)
        Route::delete('/laporan/{id}/hapus-foto', [\App\Http\Controllers\Masyarakat\LaporController::class, 'hapusFoto'])
            ->name('laporan.hapus-foto');

        // --- HAPUS ---
        Route::delete('/laporan/{id}', [\App\Http\Controllers\Masyarakat\LaporController::class, 'destroy'])
            ->name('laporan.destroy');

    });


// ====================================================
// 2. JALUR ADMIN
// ====================================================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard Admin
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])
            ->name('dashboard');

        // 1. Halaman Menu Cetak (GET)
        Route::get('/laporan/menu-cetak', [\App\Http\Controllers\Admin\LaporanController::class, 'halamanCetak'])
            ->name('laporan.menu-cetak');

        // 2. Proses Download PDF (GET dengan parameter)
        Route::get('/laporan/cetak-proses', [\App\Http\Controllers\Admin\LaporanController::class, 'cetakLaporan'])
            ->name('laporan.cetak-rekap');
        
        // Daftar Laporan Masuk
        Route::get('/laporan', [\App\Http\Controllers\Admin\LaporanController::class, 'index'])
            ->name('laporan.index');
        
        // Detail Laporan
        Route::get('/laporan/{id}', [\App\Http\Controllers\Admin\LaporanController::class, 'show'])
            ->name('laporan.show');
        
        // Update Status Laporan
        Route::put('/laporan/{id}', [\App\Http\Controllers\Admin\LaporanController::class, 'update'])
            ->name('laporan.update');
        
        // Cetak PDF
        Route::get('/laporan/{id}/cetak', [\App\Http\Controllers\Admin\LaporanController::class, 'cetak'])
            ->name('laporan.cetak');

        // ... rute admin lainnya ...

        // Edit Laporan
        Route::get('/laporan/{id}/edit', [\App\Http\Controllers\Admin\LaporanController::class, 'edit'])
            ->name('laporan.edit');
        
        // Update Laporan (Simpan Perubahan)
        Route::put('/laporan/{id}/update-data', [\App\Http\Controllers\Admin\LaporanController::class, 'updateLaporan'])
            ->name('laporan.update-data'); // Nama beda biar ga bentrok sama update status

        // Hapus/Remove Foto Laporan (Admin)
        Route::delete('/laporan/{id}/hapus-foto', [\App\Http\Controllers\Admin\LaporanController::class, 'hapusFoto'])
            ->name('laporan.hapus-foto');

        // Hapus Laporan
        Route::delete('/laporan/{id}', [\App\Http\Controllers\Admin\LaporanController::class, 'destroy'])
            ->name('laporan.destroy');

        // --- TAMBAHAN BARU: KELOLA USER ---
        // Route resource otomatis membuatkan jalur untuk index, create, store, destroy
        // --- KELOLA USER (UPDATE LENGKAP) ---
        Route::resource('/users', \App\Http\Controllers\Admin\UserController::class)
            ->names([
                'index'   => 'users.index',
                'create'  => 'users.create',
                'store'   => 'users.store',
                'edit'    => 'users.edit',   // <--- INI YANG TADI KURANG
                'update'  => 'users.update', // <--- INI JUGA
                'destroy' => 'users.destroy',
            ]);
    });


// ====================================================
// 3. JALUR PETUGAS
// ====================================================
Route::middleware(['auth', 'role:petugas'])
    ->prefix('petugas')
    ->name('petugas.')
    ->group(function () {
        
        // Dashboard
        Route::get('/dashboard', [\App\Http\Controllers\Petugas\DashboardController::class, 'index'])
            ->name('dashboard');
            
        // 1. Halaman Form Laporan Kerja (GET) - INI BARU
        Route::get('/laporan/{id}/kerjakan', [\App\Http\Controllers\Petugas\DashboardController::class, 'edit'])
            ->name('laporan.edit');

        // 2. Kirim Laporan Kerja (PUT) - UPDATE STATUS & DATA
        Route::put('/laporan/{id}/update', [\App\Http\Controllers\Petugas\DashboardController::class, 'update'])
            ->name('laporan.update');

        // Pastikan route delete ada di dalam group middleware auth/petugas
Route::delete('/petugas/laporan/{id}', [PetugasController::class, 'destroy'])->name('petugas.laporan.destroy');
Route::get('/petugas/laporan/{id}/edit', [PetugasController::class, 'edit'])->name('petugas.laporan.edit');
    });

// ====================================================
// 4. PROFIL USER
// ====================================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';