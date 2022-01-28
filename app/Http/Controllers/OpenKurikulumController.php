<?php

namespace App\Http\Controllers;

use App\Models\OpenKurikulum;
// use App\Http\Requests\StoreOpenKurikulumRequest;
use Illuminate\Support\Str;
use App\Http\Requests\UpdateOpenKurikulumRequest;
use App\Models\User;
use App\Helpers\CurlPddikti;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class OpenKurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GetListKurikulum = CurlPddikti::GetListKurikulum();
        if (Arr::get($GetListKurikulum, 'error_code') == 100) {
            DB::table('pddikti_tokens')->where('id', 1)->update(['the_token' => CurlPddikti::GetToken()]);
            return redirect('/open-kurikulum');
        } else {
            return view('siakad.krs.manageKurikulumAdmin', [
                'title' => 'Manage Open Kurikulum',
                'data_account' => User::where('id', auth()->user()->id)->get()[0],
                'data_list_kurikulum' => $GetListKurikulum,
                'data_db_open_kurikulum' => OpenKurikulum::all()
            ]);
        }
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
     * @param  \App\Http\Requests\StoreOpenKurikulumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_validate = $request->validate([
            'id_kurikulum' => 'required',
            'untuk_angkatan' => 'required'
        ]);

        OpenKurikulum::create($data_validate);
        return redirect('open-kurikulum')->with('success', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OpenKurikulum  $openKurikulum
     * @return \Illuminate\Http\Response
     */
    public function show(OpenKurikulum $openKurikulum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OpenKurikulum  $openKurikulum
     * @return \Illuminate\Http\Response
     */
    public function edit(OpenKurikulum $openKurikulum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOpenKurikulumRequest  $request
     * @param  \App\Models\OpenKurikulum  $openKurikulum
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOpenKurikulumRequest $request, OpenKurikulum $openKurikulum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OpenKurikulum  $openKurikulum
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpenKurikulum $openKurikulum)
    {
        //
    }
}
