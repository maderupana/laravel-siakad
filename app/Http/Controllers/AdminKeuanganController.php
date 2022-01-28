<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\tempStatusPembayaran;
use Excel;
use App\Imports\bulkSP;

class AdminKeuanganController extends Controller
{
    public function index()
    {
        $userData = User::where('id', auth()->user()->id)->get()[0];
        return view('siakad.adminKeuangan.index', [
            'title' => 'Page Open Access KRS',
            'data_account' => $userData
        ]);
    }

    public function importStatusPembayaran(Request $request)
    {
        $validate = $request->validate([
            'excel' => 'required|mimes:xlsx,csv|max:2048'
        ]);


        Excel::import(new bulkSP, $validate['excel']);
        $tempSP = tempStatusPembayaran::all();
        foreach ($tempSP as $key => $value) {
            User::where('username', $value->nim)->update(['status_pembayaran' => $value->status_pembayaran]);
        }

        tempStatusPembayaran::whereNotNull('id')->delete();
        return redirect('/admin-keu')->with('success', 'data succesfuly updated');
    }
}
