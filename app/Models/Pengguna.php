<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Model
{
    use Notifiable;

    protected $table = 'pengguna';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'email',
        'kata_sandi'
    ];

    protected $hidden = [
        'kata_sandi',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->kata_sandi;
    }

    public function perangkat()
    {
        return $this->hasMany(Perangkat::class, 'pengguna_id');
    }
}