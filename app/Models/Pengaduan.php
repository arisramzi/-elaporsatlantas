<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';
    protected $guarded = []; // Izinkan semua kolom diisi

    // Relasi ke Pelapor (Masyarakat)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    // --- TAMBAHAN BARU: Relasi ke Petugas ---
    // Kita pakai 'belongsTo' ke User lagi, tapi kuncinya 'petugas_id'
    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}