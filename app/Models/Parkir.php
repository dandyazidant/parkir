<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    use HasFactory;

    protected $table = 'parking';
    protected $fillable = [
        'nomor_polisi',
'tanggal_masuk',
'jam_masuk',
'jenis_kendaraan',
'tanggal_keluar',
'jam_keluar',
'biaya_parkir'
    ];
}
