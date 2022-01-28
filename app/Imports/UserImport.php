<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class UserImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'id_registrasi_mahasiswa' => $row['id_registrasi_mahasiswa'],
            'nama' => $row['nama'],
            'username' => $row['username'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
            'status' => $row['status'],
        ]);
        // return dd($row);
    }
}
