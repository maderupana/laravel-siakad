<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AfterCekKrs extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_mhs',
        'id_pa',
        'id_matkul',
        'nama_matkul',
        'sks',
        'nilai_huruf',
        'semester',
        'periode_semester',
        'status_validasi'
    ];
}
