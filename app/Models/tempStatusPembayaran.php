<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tempStatusPembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim',
        'status_pembayaran'
    ];
}
