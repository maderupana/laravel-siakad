<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\OpenPeriode;
use App\Helpers\CurlPddikti;
use App\Models\OpenKurikulum;
// use Illuminate\Support\Str;
use App\Models\AfterCekKrs;
// use illuminate\Auth;

class Krs extends Component
{
    public $OpenPeriodKRS, $accesOpenPeriode, $namaPeriode, $id_kurikulum, $getMatkulKurikulum;
    public $getListMahasiswa, $prodi_mhs, $angkatan_mhs, $dataUser;
    public $groupingMatkulKurikulum, $groupEvenOdd;
    public $cek_matkul_saved, $alreadySaved;
    public $id_matkul_saved, $id_matkul;

    public $nilaiMatkul;

    public function mount()
    {

        $this->dataUser = User::where('id', auth()->user()->id)->get()[0];
        $this->OpenPeriodKRS = collect(OpenPeriode::where('id', 1)->get());
        $this->getListMahasiswa = collect(CurlPddikti::GetListMahasiswa($this->dataUser->id_registrasi_mahasiswa)['data']);

        $this->angkatan_mhs = substr($this->getListMahasiswa->pluck('id_periode')[0], 0, 4);
        $this->prodi_mhs = $this->getListMahasiswa->pluck('nama_program_studi')[0];


        $this->id_kurikulum = collect(OpenKurikulum::where('prodi', $this->prodi_mhs)->where('untuk_angkatan', 'LIKE', '%' . $this->angkatan_mhs . '%')->get())->pluck('id_kurikulum')[0];
        $this->getMatkulKurikulum = CurlPddikti::GetMatkulKurikulum($this->id_kurikulum);
        $this->transkrip_sementara = collect(CurlPddikti::GetTranskripMahasiswa($this->dataUser['id_registrasi_mahasiswa'])['data']);
        $this->accesOpenPeriode = $this->OpenPeriodKRS->pluck('access');
        $this->namaPeriode = $this->OpenPeriodKRS->pluck('nama_periode');

        $this->groupingMatkulKurikulum = collect($this->getMatkulKurikulum['data'])->sortBy('semester')->groupBy('semester');

        $this->groupEvenOdd = $this->OpenPeriodKRS->pluck('id_periode')[0] % 2;

        $this->cek_matkul_saved = collect(AfterCekKrs::where('id_mhs', $this->dataUser['id_registrasi_mahasiswa'])->get());
        $this->alreadySaved = $this->cek_matkul_saved->where('periode_semester', $this->namaPeriode[0]);
    }




    public function store()
    {
        $collectMatkul = collect($this->getMatkulKurikulum['data'])->where('id_matkul', $this->id_matkul);
        $macth_trans_toMatkul = collect($this->transkrip_sementara)->where('id_matkul', $this->id_matkul)->pluck('nilai_huruf');

        AfterCekKrs::create([
            'id_mhs' => $this->dataUser['id_registrasi_mahasiswa'],
            'id_pa' => '',
            'id_matkul' => $this->id_matkul,
            'nama_matkul' => $collectMatkul->pluck('nama_mata_kuliah')[0],
            'sks' => $collectMatkul->pluck('sks_mata_kuliah')[0],
            'nilai_huruf' => $macth_trans_toMatkul->isEmpty() ? '' : $macth_trans_toMatkul[0],
            'semester' => $collectMatkul->pluck('semester')[0],
            'periode_semester' => $this->namaPeriode->first(),

        ]);
    }


    public function destroy()
    {

        if ($this->id_matkul_saved) {
            $foundId = AfterCekKrs::where('id', $this->id_matkul_saved);
            $foundId->delete();
        }
    }

    public function render()
    {
        $this->OpenPeriodKRS;
        $this->accesOpenPeriode;
        $this->namaPeriode;
        $this->cek_matkul_saved = collect(AfterCekKrs::where('id_mhs', $this->dataUser['id_registrasi_mahasiswa'])->get());
        $this->alreadySaved = $this->cek_matkul_saved->where('periode_semester', $this->namaPeriode[0]);
        $this->id_matkul_saved;
        return view('livewire.krs');
    }
}
