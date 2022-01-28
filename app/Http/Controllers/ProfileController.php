<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\PembayaranPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cek_bukti_bayar =  PembayaranPendaftaran::where('id_user', auth()->user()->id)->get();
        // dd($cek_bukti_bayar->first()->validasi);
        // test github
        if ($cek_bukti_bayar->isEmpty() || $cek_bukti_bayar->first()->validasi != 1) {
            return redirect('/pembayaran');
        }
        return view('profile.index', [
            'title' => 'profile',
            'data_account' => User::where('id', auth()->user()->id)->get()[0],
            'data_profile' =>
            isset(Profile::where('id_user', auth()->user()->id)->get()[0]) ? Profile::where('id_user', auth()->user()->id)->get()[0] : 'no data',
            'cek_bukti_bayar' => $cek_bukti_bayar
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

        $validateData = $request->validate([
            'id_user' => 'required',
            'tmpt_lahir' => 'required|max:255',
            'nik' => 'required|unique:profiles',
            'tgl_lahir' => 'required|before:12/31/2006',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required|max:255',
            'no_tlf' => 'required|regex:/(628)([0-9])/|max:13',
            'asal_sekolah' => 'required|max:255',
            'alamat_sekolah' => 'required',
            'tahun_tamat' => 'required',
            'nilai_skhun' => 'required|max:4',
            'jurusan' => 'required',
            'kelas' => 'required'

        ]);

        Profile::create($validateData);
        $request->session()->flash('warning', 'Silahkan lengkapi form berikut.');

        return redirect('wali')->with('success', 'data telah di perbaharui, silahkan isi form tahapan berikut.');
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
    public function edit(User $id)
    {
        $user = User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validateDataUser = $request->validate(
            [
                'email' => 'required|email:dns',
                'nama' => 'required|max:255|min:2'
            ]
        );
        $validateUpdateData = $request->validate([
            'id_user' => 'required',
            'tmpt_lahir' => 'required|max:255',
            'nik' => 'required',
            'tgl_lahir' => 'required|before:12/31/2006',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required|max:255',
            'no_tlf' => 'required|regex:/(628)([0-9])/|max:13',
            'asal_sekolah' => 'required|max:255',
            'alamat_sekolah' => 'required',
            'tahun_tamat' => 'required',
            'nilai_skhun' => 'required|max:4',
            'jurusan' => 'required',
            'kelas' => 'required',

        ]);
        User::find($request->input('id_user'))->update($validateDataUser);
        Profile::where('id_user', $request->input('id_user'))->update($validateUpdateData);
        // Profile::find($request->input('id_user'))->update($validateUpdateData);
        return redirect('wali')->with('success', 'data telah di perbaharui, silahkan isi form tahapan berikut.');
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
