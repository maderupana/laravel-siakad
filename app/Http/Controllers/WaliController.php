<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\DataWali;

class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        @$data_profile = isset(Profile::where('id_user', auth()->user()->id)->get()[0]) ? Profile::where('id_user', auth()->user()->id)->get()[0] : 'no data';
        @$data_wali = isset(DataWali::where('id_user', auth()->user()->id)->get()[0]) ? DataWali::where('id_user', auth()->user()->id)->get()[0] : 'no data';
        if ($data_profile !== 'no data') {
            return view('profile.waliTemplate', [
                'title' => 'Form Data Wali',
                'data_account' => User::where('id', auth()->user()->id)->get()[0],
                'data_profile' => $data_profile,
                'data_wali' => $data_wali
            ]);
        }
        return redirect('/profile');
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
        $validateData = $request->validate([
            'id_user' => 'required',
            'nama_ibu' => 'required|max:255'
        ]);

        DataWali::create($request->all(), $validateData);
        $request->session()->flash('warning', 'ayo selesaikan pendaftaranmu.');

        return redirect('pembayaran')->with('success', 'ayo selesaikan pendaftaranmu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'id_user' => 'required',
            'nama_ibu' => 'required|max:255'
        ]);

        DataWali::where('id_user', $id)->update([
            'id_user' => $validateData['id_user'],
            'nama_ayah' => $request->nama_ayah,
            'nik_ayah' => $request->nik_ayah,
            'tgl_lahir_ayah' => $request->tgl_lahir_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'nik_ibu' => $request->nik_ibu,
            'tgl_lahir_ibu' => $request->tgl_lahir_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan_ibu' => $request->penghasilan_ibu,
            'nama_wali' => $request->nama_wali,
            'nik_wali' => $request->nik_wali,
            'tgl_lahir_wali' => $request->tgl_lahir_wali,
            'pendidikan_wali' => $request->pendidikan_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'penghasilan_wali' => $request->penghasilan_wali

        ], $validateData);
        $request->session()->flash('warning', 'ayo selesaikan pendaftaranmu.');

        return redirect('pembayaran')->with('success', 'ayo selesaikan pendaftaranmu.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
