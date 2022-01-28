<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\AfterCekKrs;
use App\Models\OpenPeriode;
use App\Helpers\CurlPddikti;

class DashboardController extends Controller
{

    public function greeting()
    {
        //ambil jam dan menit
        $jam = date('H:i');

        //atur salam menggunakan IF
        if ($jam > '05:30' && $jam < '10:00') {
            $salam = 'Pagi';
        } elseif ($jam >= '10:00' && $jam < '15:00') {
            $salam = 'Siang';
        } elseif ($jam < '18:40') {
            $salam = 'Sore';
        } else {
            $salam = 'Malam';
        }

        return $salam;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataUser = User::where('id', auth()->user()->id)->get()[0];
        return view('dashboard.index', [
            'title' => 'dashboard',
            'data_account' => $dataUser,
            'data_profile' =>
            isset(Profile::where('id_user', auth()->user()->id)->get()[0]) ? Profile::where('id_user', auth()->user()->id)->get()[0] : 'no data',
            'count_krs' => collect(AfterCekKrs::where('id_pa', auth()->user()->id)->get()),
            'periode' => OpenPeriode::where('id', 1)->get(),
            'salam' => $this->greeting(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
