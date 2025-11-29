<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. BUAT AKUN ADMIN (Komandan)
        User::create([
            'nik' => null, // Admin tidak wajib ada NIK
            'name' => 'Komandan Satlantas',
            'email' => 'admin@polres.id',
            'telp' => '08123456789',
            'role' => 'admin',
            'password' => Hash::make('password'), // Passwordnya: password
        ]);

        // 2. BUAT AKUN PETUGAS LAPANGAN
        User::create([
            'nik' => null,
            'name' => 'Bripka Budi Santoso',
            'email' => 'petugas@polres.id',
            'telp' => '08987654321',
            'role' => 'petugas',
            'password' => Hash::make('password'),
        ]);

        // 3. BUAT AKUN MASYARAKAT (Contoh)
        User::create([
            'nik' => '3201123456789001',
            'name' => 'Warga Sipil',
            'email' => 'warga@gmail.com',
            'telp' => '08555555555',
            'role' => 'masyarakat',
            'password' => Hash::make('password'),
        ]);

        // 4. BUAT KATEGORI LAPORAN (Penting!)
        // Kita pakai array agar kodenya rapi
        $kategori = [
            'Kemacetan Lalu Lintas',
            'Kecelakaan Lalu Lintas',
            'Jalan Rusak / Berlubang',
            'Lampu Merah / Rambu Rusak',
            'Pungutan Liar (Pungli)'
        ];

        foreach ($kategori as $k) {
            Kategori::create([
                'nama_kategori' => $k
            ]);
        }
    }
}