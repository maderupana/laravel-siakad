<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWali extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'nama_ayah',
        'nik_ayah',
        'tgl_lahir_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nama_ibu',
        'nik_ibu',
        'tgl_lahir_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'nama_wali',
        'nik_wali',
        'tgl_lahir_wali',
        'pendidikan_wali',
        'pekerjaan_wali',
        'penghasilan_wali'
    ];
}
