<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PddiktiToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'the_token',
        'url_api',
        'username_api',
        'password_api'
    ];
}
