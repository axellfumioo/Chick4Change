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
        Schema::create('batch_penetasans', function (Blueprint $table) {
            $table->id();
            $table->text('kode_batch');
            $table->enum('jenis_telur', ['AYAM_KAMPUNG', 'BROILER', 'BEBEK', 'ENTOK', 'PUYUH']);
            $table->datetime('tanggal_penetasan');
            $table->integer('jumlah_telur');
            $table->enum('lama_inkubasi', ['22','29','36','18'])->default('22');
            $table->text('sumber_telur');
            $table->text('id_mesin_penetas');
            $table->text('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_penetasans');
    }
};
