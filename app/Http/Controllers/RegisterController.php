<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255|min:2',
            'username' => ['required', 'min:4', 'max:50', 'unique:users', 'regex:/^\S*$/u'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        $request->session()->flash('success', 'Registrasi Berhasil!! Silahkan Login.');

        return redirect('/login');
    }
}
