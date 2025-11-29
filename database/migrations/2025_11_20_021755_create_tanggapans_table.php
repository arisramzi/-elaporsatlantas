<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('tanggapans', function (Blueprint $table) {
        $table->id();
        
        // Relasi ke Pengaduan (Laporan mana yang dibalas?)
        $table->foreignId('pengaduan_id')->constrained('pengaduans')->cascadeOnDelete();
        
        // Relasi ke User (Siapa polisi yang membalas?)
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        
        $table->date('tgl_tanggapan');
        $table->text('tanggapan'); // Isi jawaban polisi
        
        // Bukti kerja polisi (Fitur Pro)
        $table->string('foto_penyelesaian')->nullable(); 
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggapans');
    }
};
