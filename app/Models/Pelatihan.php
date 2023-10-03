<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;
    protected $table='pelatihan';
    protected $primaryKey = 'id_pelatihan';
    protected $fillable = [
        'bidang',
        'deskripsi',
        'nama',
        'tahun_pelaksanaan',
        'nim',
        'sertifikat',
        'id_pengubah',
    ];

}
