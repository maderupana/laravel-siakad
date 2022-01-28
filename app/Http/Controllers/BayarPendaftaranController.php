<?php

namespace App\Http\Controllers;

use App\Models\PembayaranPendaftaran;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class BayarPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cek_bukti_bayar =  PembayaranPendaftaran::where('id_user', auth()->user()->id)->get();
        return view('pembayaran.pendaftaran', [
            'title' => 'Form Upload Bukti Pembayaran',
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

        if ($request->hasFile('bukti_bayar')) {
            $validatedData = $request->validate([
                'id_user' => 'required',
                'bukti_bayar' => 'required|image|file|mimes:jpg,png,jpeg|max:2048',
                'jml_bayar' => 'required|max:255',
                'tgl_bayar' => 'required',
                'bank' => 'required',
                'an_bank' => 'required',
                'recomend' => 'max:255'
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product

            // Store the record, using the new file hashname which will be it's new filename identity.
            $bayar = new PembayaranPendaftaran([
                "id_user" => $request->id_user,
                "jumlah_bayar" => $request->jml_bayar,
                "tgl_bayar" => $request->tgl_bayar,
                "nama_bank" => $request->bank,
                "an_bank" => $request->an_bank,
                "bukti_bayar" => $request->bukti_bayar->hashName(),
                "recomend" => $request->recomend
            ]);
            $request->bukti_bayar->store('images/p_pendaftaran');
            $bayar->save(); // Finally, save the record.
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PembayaranPendaftaran  $pembayaranPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(PembayaranPendaftaran $pembayaranPendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PembayaranPendaftaran  $pembayaranPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(PembayaranPendaftaran $pembayaranPendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PembayaranPendaftaran  $pembayaranPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PembayaranPendaftaran $pembayaranPendaftaran, $id)
    {
        $cek_data = $pembayaranPendaftaran::where('id_user', $id)->get();

        if ($request->hasFile('bukti_bayar')) {
            $validatedData = $request->validate([
                'id_user' => 'required',
                'bukti_bayar' => 'image|file|mimes:jpg,png,jpeg|max:2048',
                'jml_bayar' => 'required|max:255',
                'tgl_bayar' => 'required',
                'bank' => 'required',
                'an_bank' => 'required',
                'recomend' => 'max:255'
            ]);

            Storage::delete('images/p_pendaftaran/' . $cek_data->first()->bukti_bayar);
            $request->bukti_bayar->store('images/p_pendaftaran');

            $pembayaranPendaftaran->where('id_user', $id)->update([
                "jumlah_bayar" => $request->jml_bayar,
                "tgl_bayar" => $request->tgl_bayar,
                "nama_bank" => $request->bank,
                "an_bank" => $request->an_bank,
                "bukti_bayar" => $request->bukti_bayar->hashName(),
                "recomend" => $request->recomend
            ]); // Finally, save the record.

            return redirect('/pembayaran');
        }
        $validatedData = $request->validate([
            'id_user' => 'required',
            'bukti_bayar' => 'image|file|mimes:jpg,png,jpeg|max:2048',
            'jml_bayar' => 'required|max:255',
            'tgl_bayar' => 'required',
            'bank' => 'required',
            'an_bank' => 'required',
            'recomend' => 'max:255'
        ]);


        // $cek_bukti_bayar = $pembayaranPendaftaran::where('id_user', auth()->user()->id->get());

        // Save the file locally in the storage/public/ folder under a new folder named /product

        // Store the record, using the new file hashname which will be it's new filename identity.

        $pembayaranPendaftaran->where('id_user', $id)->update([
            "jumlah_bayar" => $request->jml_bayar,
            "tgl_bayar" => $request->tgl_bayar,
            "nama_bank" => $request->bank,
            "an_bank" => $request->an_bank,
            "recomend" => $request->recomend
        ]); // Finally, save the record.

        return redirect('/pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PembayaranPendaftaran  $pembayaranPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembayaranPendaftaran $pembayaranPendaftaran)
    {
        //
    }
}
