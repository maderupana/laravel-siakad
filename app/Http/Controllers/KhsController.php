<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\PddiktiToken;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Helpers\CurlPddikti;

class KhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $userData = User::where('id', auth()->user()->id)->get()[0];
        $getKHS = CurlPddikti::GetKHSMahasiswa($userData['id_registrasi_mahasiswa'], ''); //test token
        $errorCode = $getKHS['error_code'];
        if ($errorCode == 100) {
            PddiktiToken::where('id', 1)->update(['the_token' => CurlPddikti::GetToken()]);
            return redirect('/khs');
        } else {
            return view('siakad.khs.index', [
                'title' => 'KHS Mahasiswa',
                'data_account' => $userData,
            ]);
        }
    }


    // cetak khs
    public function cetakKHS(Request $request)
    {

        $userData = User::where('id', auth()->user()->id)->get()[0];
        $cekDataSmester = $request->data;
        // Data KHS
        $data_pddikti = collect(CurlPddikti::GetKHSMahasiswa($userData['id_registrasi_mahasiswa'])['data']);
        // list Mata Kuliah curl
        $listMatkul = collect(CurlPddikti::GetListMataKuliah($data_pddikti->pluck('nama_program_studi')[0])['data']);
        $angkatan = $data_pddikti->pluck('angkatan')->first();
        $periodeAwal = $data_pddikti->pluck('id_periode')->min();
        // Data Detail Nilai Mahasiswa Persemester
        if ($cekDataSmester % 2 != 0) {
            $a = (($cekDataSmester + 10) - 1) / 10;
            $b = $a - $angkatan;
            $c = ($b * 2) - 1;
        } else {
            $a = (($cekDataSmester + 10) - 2) / 10;
            $b = $a - $angkatan;
            $c = $b * 2;
        }
        $collectkhs = $data_pddikti->where('id_periode', $cekDataSmester);
        $collectkhsBetween = $data_pddikti->whereBetween('id_periode', [$periodeAwal, $cekDataSmester]);

        if (Arr::get($data_pddikti, 'error_code') == 100 || Arr::get($data_pddikti, 'error_code') == 106) {
            DB::table('pddikti_tokens')->where('id', 1)->update(['the_token' => CurlPddikti::GetToken()]);
            return redirect('/cetak-khs');
        } else {
            if ($userData->status != 'Mahasiswa') {
                return redirect()->route('khs');
            }
            return view('siakad.khs.cetakKHS', [
                'title' => 'Cetak KHS Mahasiswa',
                'data_account' => $userData,
                'data_pddikti' => isset($collectkhs) ? $collectkhs : 'No Data',
                'total_sks' => isset($collectkhs) ? $collectkhs->sum('sks_mata_kuliah') : 'No Data',
                'b_total_sks' => isset($collectkhsBetween) ? $collectkhsBetween->sum('sks_mata_kuliah') : 'No Data',
                'cek_nilai_kosong' => $data_pddikti->where('nilai_indeks', 0.00) ? true : false,
                'smt' => $c,
                'prodi' => $data_pddikti->pluck('nama_program_studi'),
                'periode' => $collectkhs->pluck('nama_periode')->first(),
                'listMatkul' => $listMatkul,
                'get_khs_between' => $collectkhsBetween
            ]);
        }
    }
}
