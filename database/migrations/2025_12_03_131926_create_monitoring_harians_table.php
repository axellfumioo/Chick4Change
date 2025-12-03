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
        Schema::create('monitoring_harians', function (Blueprint $table) {
            $table->id();
            $table->datetime('tanggal');
            $table->integer('suhu');
            $table->integer('kelembapan');
            $table->enum('status_pembalikan_telur', ['NORMAL', 'MANUAL', 'MACET', 'TIDAK_DIBALIK']);
            $table->enum('kondisi_mesin', ['NORMAL', 'PANAS_BERLEBIH', 'KELEMBAPAN_TURUN', 'MOTOR_PEMBALIK_MACET', "WADAH_AIR_KERING"]);
            $table->integer('jumlah_menetas');
            $table->text('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitoring_harians');
    }
};
