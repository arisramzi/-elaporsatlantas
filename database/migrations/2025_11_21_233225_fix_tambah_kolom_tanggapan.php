<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Cek dulu, kalau kolomnya belum ada, baru dibuat.
        // Ini biar tidak error kalau dijalankan berkali-kali.
        if (!Schema::hasColumn('pengaduans', 'tanggapan')) {
            Schema::table('pengaduans', function (Blueprint $table) {
                $table->text('tanggapan')->nullable()->after('status');
            });
        }
    }

    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->dropColumn('tanggapan');
        });
    }
};