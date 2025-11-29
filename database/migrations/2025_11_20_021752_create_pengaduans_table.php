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
    Schema::create('pengaduans', function (Blueprint $table) {
        $table->id();
        
        // RELASI (Foreign Key)
        // Menghubungkan pengaduan ke si pelapor (users)
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        
        // Menghubungkan pengaduan ke kategori
        $table->foreignId('kategori_id')->constrained('kategoris')->cascadeOnDelete();
        
        // DATA LAPORAN
        $table->date('tgl_pengaduan');
        $table->string('judul_laporan'); // Judul singkat
        $table->text('isi_laporan'); // Cerita lengkap (bisa panjang banget)
        $table->date('tgl_kejadian')->nullable(); // Kapan kejadiannya?
        $table->string('lokasi_kejadian');
        $table->string('foto_kejadian')->nullable(); // Path/alamat file gambar
        
        // STATUS & TRACKING
        // Enum status lengkap
        $table->enum('status', ['pending', 'proses', 'selesai', 'tolak'])->default('pending');
        
        // Kolom tambahan (Fitur Pro)
        $table->text('alasan_tolak')->nullable(); // Diisi cuma kalau status = tolak
        $table->date('tgl_selesai')->nullable(); // Diisi cuma kalau status = selesai
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
