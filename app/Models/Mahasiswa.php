<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;


class Mahasiswa extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $table='mahasiswa';
    protected $fillable = [
        'email',
        'nim',
        'password',
        'no_telp',
        'nama',
        'alamat',
    ];

    public function biodata()
    {
        return $this->hasOne(Biodata::class, 'nim', 'nim');
    }

    public function karya()
    {
        return $this->hasMany(Karya::class, 'nim', 'nim');
    }

    public function pelatihan()
    {
        return $this->hasMany(Pelatihan::class, 'nim', 'nim');
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class, 'nim', 'nim');
    }
}
