<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;


    protected $fillable = [
        'id_user',
        'tmpt_lahir',
        'nik',
        'tgl_lahir',
        'agama',
        'kewarganegaraan',
        'jk',
        'alamat',
        'pekerjaan',
        'no_tlf',
        'asal_sekolah',
        'alamat_sekolah',
        'tahun_tamat',
        'nilai_skhun',
        'jurusan',
        'kelas'
    ];
}
