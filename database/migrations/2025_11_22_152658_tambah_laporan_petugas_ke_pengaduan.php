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
        Schema::table('pengaduans', function (Blueprint $table) {
            // Kolom untuk tulisan laporan petugas
            $table->text('tanggapan_petugas')->nullable()->after('tanggapan');
            // Kolom untuk foto bukti kerja petugas
            $table->string('foto_penanganan')->nullable()->after('foto_kejadian');
        });
    }

    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->dropColumn(['tanggapan_petugas', 'foto_penanganan']);
        });
    }
};
