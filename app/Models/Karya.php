<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    use HasFactory;
    protected $table='karya';
    protected $primaryKey = 'id_karya';
    protected $fillable = [
        'deskripsi',
        'dokumentasi',
        'link_karya',
        'nama',
        'bidang',
        'nim',
        'id_pengubah',
    ];


}
