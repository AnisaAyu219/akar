<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $table='prestasi';
    protected $fillable = [
        'sertifikat',
        'bidang',
        'tahun_diperoleh',
        'nim',
        'id_prestasi',
        'nama',
        'id_pengubah',
    ];

}
