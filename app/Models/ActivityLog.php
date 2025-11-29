<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ActivityLog extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    // Relasi ke User (Siapa pelakunya)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // --- FUNGSI SAKTI: REKAM JEJAK ---
    // Kita bisa panggil ActivityLog::record("Pesan") dari mana saja
    public static function record($message)
    {
        if (Auth::check()) {
            self::create([
                'user_id' => Auth::id(),
                'description' => $message
            ]);
        }
    }
}