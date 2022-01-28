<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AjuanKrsController extends Controller
{
    public function index()
    {
        $userData = User::where('id', auth()->user()->id)->get()[0];
        return view('siakad.krs.ajuan-krs', [
            'title' => 'Ajuan KRS Mahasiswa',
            'data_account' => $userData
        ]);
    }
}
