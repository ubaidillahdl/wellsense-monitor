<?php

namespace App\Models;

use App\Models\Pengguna;
use App\Models\Perangkat;
use Illuminate\Database\Eloquent\Model;

class DataKesehatan extends Model
{
    protected $table = 'data_kesehatan';

    protected $casts = [
        'raw_ir'          => 'array',
        'raw_red'         => 'array',
        'filtered_ir'     => 'array',
        'filtered_red'    => 'array',
        'features' => 'array',
        'hr'              => 'float',
        'spo2'            => 'float',
        'sbp'             => 'float',
        'dbp'             => 'float',
        'hb'              => 'float',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    public function perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'perangkat_id');
    }
}