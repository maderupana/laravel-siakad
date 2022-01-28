<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranPendaftaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'jumlah_bayar',
        'tgl_bayar',
        'nama_bank',
        'an_bank',
        'validasi',
        'bukti_bayar',
        'catatan',
        'recomend'
    ];
}
