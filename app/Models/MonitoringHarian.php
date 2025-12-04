<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MonitoringHarian extends Model
{
    protected $fillable = [
        'batch_penetasan_id',
        'tanggal',
        'suhu',
        'kelembapan',
        'status_pembalikan_telur',
        'kondisi_mesin',
        'jumlah_menetas',
        'catatan',
    ];

    protected $casts = [
        'tanggal' => 'datetime',
        'suhu' => 'integer',
        'kelembapan' => 'integer',
        'jumlah_menetas' => 'integer',
    ];

    public function batchPenetasan(): BelongsTo
    {
        return $this->belongsTo(BatchPenetasan::class);
    }
}
