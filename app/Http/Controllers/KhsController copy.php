<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
// use App\Models\PddiktiToken;
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

    public function index(Request $request)
    {

        $userData = User::where('id', auth()->user()->id)->get()[0];
        $cekDataSmester = $request->input('cek_smester');
        // Data KHS/Transkrip Sementara
        $data_pddikti = CurlPddikti::GetTranskripMahasiswa($userData['id_registrasi_mahasiswa']);
        // Data Detail Nilai Mahasiswa Persemester


        $collect = collect(Arr::get($data_pddikti, 'data'));
        $collectkhs = $collect->where('smt_diambil', $cekDataSmester);
        $collectkhsBetween = $collect->whereBetween('smt_diambil', [1, $cekDataSmester]);

        if (Arr::get($data_pddikti, 'error_code') == 100 || Arr::get($data_pddikti, 'error_code') == 106) {
            DB::table('pddikti_tokens')->where('id', 1)->update(['the_token' => CurlPddikti::GetToken()]);
            return redirect('/khs');
        } else {

            return view('siakad.khs.index', [
                'title' => 'KHS Mahasiswa',
                'data_account' => $userData,
                'data_profile' => isset(Profile::where('id_user', auth()->user()->id)->get()[0]) ? Profile::where('id_user', auth()->user()->id)->get()[0] : 'no data',
                'data_pddikti' => isset($collectkhs) ? $collectkhs : 'No Data',
                'total_sks' => isset($collectkhs) ? $collectkhs->sum('sks_mata_kuliah') : 'No Data',
                'b_total_sks' => isset($collectkhsBetween) ? $collectkhsBetween->sum('sks_mata_kuliah') : 'No Data',
                'transkrip_data' => isset($collect) ? $collect : 'No Data',
                'cek_nilai_kosong' => $collect->where('nilai_indeks', 0.00) ? true : false,
                'dum_data' => $data_pddikti,
                'get_khs_between' => $collectkhsBetween
            ]);
        }
    }






    // cetak khs
    public function cetakKHS(Request $request)
    {

        $userData = User::where('id', auth()->user()->id)->get()[0];
        $cekDataSmester = $request->data;
        // Data KHS/Transkrip Sementara
        $data_pddikti = CurlPddikti::GetTranskripMahasiswa($userData['id_registrasi_mahasiswa']);
        // Data Detail Nilai Mahasiswa Persemester
        $collect = collect(Arr::get($data_pddikti, 'data'));
        $collectkhs = $collect->where('smt_diambil', $cekDataSmester);
        $collectkhsBetween = $collect->whereBetween('smt_diambil', [1, $cekDataSmester]);

        if (Arr::get($data_pddikti, 'error_code') == 100 || Arr::get($data_pddikti, 'error_code') == 106) {
            DB::table('pddikti_tokens')->where('id', 1)->update(['the_token' => CurlPddikti::GetToken()]);
            return redirect('/cetak-khs');
        } else {
            if ($userData->status != 'Mahasiswa') {
                return redirect()->route('khs');
            }
            $cek_prodi_mhs = collect(CurlPddikti::GetListMahasiswa($userData['id_registrasi_mahasiswa'])['data'])->pluck('nama_program_studi');
            return view('siakad.khs.cetakKHS', [
                'title' => 'Cetak KHS Mahasiswa',
                'data_account' => $userData,
                'data_pddikti' => isset($collectkhs) ? $collectkhs : 'No Data',
                'total_sks' => isset($collectkhs) ? $collectkhs->sum('sks_mata_kuliah') : 'No Data',
                'b_total_sks' => isset($collectkhsBetween) ? $collectkhsBetween->sum('sks_mata_kuliah') : 'No Data',
                'transkrip_data' => isset($collect) ? $collect : 'No Data',
                'cek_nilai_kosong' => $collect->where('nilai_indeks', 0.00) ? true : false,
                'smt' => $cekDataSmester,
                'prodi' => $cek_prodi_mhs,
                'get_khs_between' => $collectkhsBetween
            ]);
        }
    }
}
