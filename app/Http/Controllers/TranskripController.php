<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\OpenKurikulum;
use App\Models\PddiktiToken;
use App\Helpers\CurlPddikti;

class TranskripController extends Controller
{
    public function index()
    {
        $userData = User::where('id', auth()->user()->id)->get()[0];
        $getTranskrip = CurlPddikti::GetTranskripMahasiswa($userData['id_registrasi_mahasiswa'], ''); //test token
        $errorCode = $getTranskrip['error_code'];
        if ($errorCode == 100) {
            PddiktiToken::where('id', 1)->update(['the_token' => CurlPddikti::GetToken()]);
            return redirect('/transkrip');
        } else {
            $getListMahasiswa = collect(CurlPddikti::GetListMahasiswa($userData->id_registrasi_mahasiswa)['data']);
            $getBioMhs = collect(CurlPddikti::GetBiodataMahasiswa($getListMahasiswa->first()['id_mahasiswa'])['data']);
            $angkatan_mhs = substr($getListMahasiswa->pluck('id_periode')[0], 0, 4);
            $prodi_mhs = $getListMahasiswa->pluck('nama_program_studi')[0];
            $id_kurikulum = collect(OpenKurikulum::where('prodi', $prodi_mhs)->where('untuk_angkatan', 'LIKE', '%' . $angkatan_mhs . '%')->get())->pluck('id_kurikulum')[0];
            return view('siakad.transkrip.index', [
                'title' => 'Transkrip Mahasiswa',
                'data_account' => $userData,
                'getTranskrip' =>  $getTranskrip['data'],
                'bio_mhs' => $getBioMhs->first(),
                'getKurikulum' => CurlPddikti::GetMatkulKurikulum($id_kurikulum)['data'],
                'total_sks' => collect($getTranskrip['data'])->sum('sks_mata_kuliah')
            ]);
        }
    }


    public function cetakTranskrip()
    {
        $userData = User::where('id', auth()->user()->id)->get()[0];
        $getTranskrip = CurlPddikti::GetTranskripMahasiswa($userData['id_registrasi_mahasiswa'], ''); //test token
        $errorCode = $getTranskrip['error_code'];
        if ($errorCode == 100) {
            PddiktiToken::where('id', 1)->update(['the_token' => CurlPddikti::GetToken()]);
            return redirect('/cetak-transkrip');
        } else {
            $getListMahasiswa = collect(CurlPddikti::GetListMahasiswa($userData->id_registrasi_mahasiswa)['data']);
            $getBioMhs = collect(CurlPddikti::GetBiodataMahasiswa($getListMahasiswa->first()['id_mahasiswa'])['data']);
            $angkatan_mhs = substr($getListMahasiswa->pluck('id_periode')[0], 0, 4);
            $prodi_mhs = $getListMahasiswa->pluck('nama_program_studi')[0];
            $id_kurikulum = collect(OpenKurikulum::where('prodi', $prodi_mhs)->where('untuk_angkatan', 'LIKE', '%' . $angkatan_mhs . '%')->get())->pluck('id_kurikulum')[0];
            // $getMatkulKurikulum = 
            return view('siakad.transkrip.cetak', [
                'title' => 'Cetak Transkrip Mahasiswa',
                'data_account' => $userData,
                'getTranskrip' =>  $getTranskrip['data'],
                'getKurikulum' => CurlPddikti::GetMatkulKurikulum($id_kurikulum)['data'],
                'total_sks' => collect($getTranskrip['data'])->sum('sks_mata_kuliah'),
                'prodi' => $prodi_mhs,
                'bio_mhs' => $getBioMhs->first(),
                'getlistMhs' => $getListMahasiswa,
                'tgl_lahir' => Carbon::parse($getBioMhs->first()['tanggal_lahir'])->isoFormat('D MMMM Y'),
                'riwayatPendidikan' => collect(CurlPddikti::GetListRiwayatPendidikanMahasiswa($userData->id_registrasi_mahasiswa)['data'])
                // 'tetsTranskrip' => CurlPddikti::GetTranskripMahasiswa('944e8723-4d5d-482f-a04a-fb6323d82d1b', '')
            ]);
        }
    }
}
