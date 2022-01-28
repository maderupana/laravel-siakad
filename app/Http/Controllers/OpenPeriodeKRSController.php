<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PddiktiToken;
use App\Helpers\CurlPddikti;

class OpenPeriodeKRSController extends Controller
{
    public function index()
    {
        $getPeriode = CurlPddikti::GetPeriode(); //test token
        $errorCode = $getPeriode['error_code'];
        if ($errorCode == 100) {
            PddiktiToken::where('id', 1)->update(['the_token' => CurlPddikti::GetToken()]);
            return redirect('/open-periode-krs');
        }
        return view('siakad.operator.index', [
            'title' => 'Open Periode KRS',
            'data_account' => User::where('id', auth()->user()->id)->get()[0],
        ]);
    }
}
