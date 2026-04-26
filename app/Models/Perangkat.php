<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perangkat extends Model
{
    protected $table = 'perangkat';

    protected $fillable = [
        'token_perangkat',
        'nama_perangkat',
        'pengguna_id'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    public function dataKesehatan()
    {
        return $this->hasMany(DataKesehatan::class, 'perangkat_id');
    }
}