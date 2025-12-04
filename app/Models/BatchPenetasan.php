<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BatchPenetasan extends Model
{
    protected $fillable = [
        'kode_batch',
        'jenis_telur',
        'tanggal_penetasan',
        'jumlah_telur',
        'lama_inkubasi',
        'sumber_telur',
        'id_mesin_penetas',
        'catatan',
    ];

    protected $casts = [
        'tanggal_penetasan' => 'datetime',
        'jumlah_telur' => 'integer',
    ];

    public function monitoringHarian(): HasMany
    {
        return $this->hasMany(MonitoringHarian::class);
    }
}
