<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenKurikulum extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kurikulum',
        'prodi',
        'untuk_angkatan',
    ];
}
