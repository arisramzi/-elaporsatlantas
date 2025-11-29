<?php

// app/Models/Laporan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    
    // Tentukan kolom mana saja yang boleh diisi (mass assignment)
    protected $fillable = [
        'user_id', 
        'judul_laporan', 
        'kategori', 
        'tanggal_kejadian', 
        'lokasi_kejadian', 
        'detail_laporan', 
        'bukti_foto', 
        'status'
    ];
}