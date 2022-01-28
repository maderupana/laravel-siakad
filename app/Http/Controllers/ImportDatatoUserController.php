<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Excel;
use App\Imports\UserImport;
use App\Exports\UserExport;

class ImportDatatoUserController extends Controller
{
    public function index()
    {
        return view('import.user', [
            'title' => 'Import User',
            'data_account' => User::where('id', auth()->user()->id)->get()[0],
            'data_profile' =>
            isset(Profile::where('id_user', auth()->user()->id)->get()[0]) ? Profile::where('id_user', auth()->user()->id)->get()[0] : 'no data',
        ]);
    }

    public function import(Request $request)
    {
        Excel::import(new UserImport, $request->file);
        return redirect('/import-user');
    }

    public function exportUser()
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }
}
