<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OpenPeriode;
use App\Helpers\CurlPddikti;
// use App\Models\OpenKurikulum;
use App\Models\AfterCekKrs;
// use Illuminate\Auth\Events\Validated;
// use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;


class KrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $dataUser = User::where('id', auth()->user()->id)->get()[0];
        $OpenPeriodKRS = collect(OpenPeriode::where('id', 1)->get()[0]);
        // $accesOpenPeriode = $OpenPeriodKRS['access'];
        $NamaPeriode = $OpenPeriodKRS['nama_periode'];
        // $groupEvenOdd = $OpenPeriodKRS['id_periode'] % 2;
        $GetDetailNilai = CurlPddikti::GetDetailNilaiPerkuliahanKelas($dataUser['id_registrasi_mahasiswa'], $NamaPeriode);
        $cekNilaiKosong =  collect(Arr::get($GetDetailNilai, 'data'));
        $userDosenPA = collect(User::where('status', 'Dosen')->get());
        $getIdPAKrs = collect(AfterCekKrs::where('id_mhs', $dataUser['id_registrasi_mahasiswa'])->get());



        if (Arr::get($GetDetailNilai, 'error_code') == 100 || Arr::get($GetDetailNilai, 'error_code') == 106) {
            DB::table('pddikti_tokens')->where('id', 1)->update(['the_token' => CurlPddikti::GetToken()]);
            return redirect('/krs');
        } else {
            $getListMahasiswa = collect(CurlPddikti::GetListMahasiswa($dataUser['id_registrasi_mahasiswa'])['data']);
            // $AngkatanMhs = substr($getListMahasiswa->pluck('id_periode')->first(), 0, 4);
            $prodi_mhs = $getListMahasiswa->pluck('nama_program_studi');
            // $cek_id_kurikulum = collect(OpenKurikulum::where('prodi', $prodi_mhs)->where('untuk_angkatan', 'LIKE', '%' . $AngkatanMhs . '%')->get())->pluck('id_kurikulum')->first();
            // $transkrip_sementara = CurlPddikti::GetTranskripMahasiswa($dataUser['id_registrasi_mahasiswa']);

            // $getMatkulKurikulum = CurlPddikti::GetMatkulKurikulum($cek_id_kurikulum);
            return view('siakad.krs.index', [
                'title' => 'KRS Mahasiswa',
                'data_account' => $dataUser,
                // 'namaPeriode' => $NamaPeriode,
                'cek_nilai_kosong' => $cekNilaiKosong->where('nilai_huruf', null),
                // 'groupingMatkulKurikulum' => collect($getMatkulKurikulum['data'])->sortBy('semester')->groupBy('semester'),
                'prodi' => $prodi_mhs,
                // 'accesOpenPeriode' => $accesOpenPeriode,
                'userDosenPA' => $userDosenPA,
                'id_pa_saved' => $getIdPAKrs->isNotEmpty() ? $getIdPAKrs->pluck('id_pa')[0] : '',
                // 'set_semester' => $groupEvenOdd,
                // 'macth_nilai_matkul' => collect($transkrip_sementara['data']),
                // 'cek_matkul_saved' => collect(AfterCekKrs::where('id_mhs', $dataUser['id_registrasi_mahasiswa']))
            ]);
        }
    }

    // update id PA saat memilih dosen PA
    public function update(Request $request)
    {
        $validate = $request->validate(['pilih_pa' => 'required']);
        $dataUser = User::where('id', auth()->user()->id)->get()[0];

        AfterCekKrs::where('id_mhs', $dataUser['id_registrasi_mahasiswa'])->update(['id_pa' => $validate['pilih_pa'], 'status_validasi' => null]);

        return redirect()->back()->with('success', 'KRS sudah diterima dosen PA.');
    }
}
