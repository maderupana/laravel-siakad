<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\PddiktiToken;
use App\Helpers\CurlPddikti;

class Khs extends Component
{
    public $userData;
    public $getallKHS, $arridSmt, $prodi, $total_sks;
    public $kodeMK = [];
    public $getKHS = [];
    public $get_khs_between, $b_total_sks, $b_totalsksxindeks;
    public $periodeAwal;
    public $listMatkul;
    public $idsemester;
    public $errorCode;
    public $angkatan, $c;


    public function mount()
    {
        $this->userData = User::where('id', auth()->user()->id)->get()[0];
        $this->getallKHS = collect(CurlPddikti::GetKHSMahasiswa($this->userData['id_registrasi_mahasiswa'])['data']);
        $this->prodi = $this->getallKHS->pluck('nama_program_studi')[0];
        $this->listMatkul = collect(CurlPddikti::GetListMataKuliah($this->prodi)['data']);
        $this->periodeAwal = $this->getallKHS->pluck('id_periode')->min();
        $this->angkatan = $this->getallKHS->pluck('angkatan')[0];
        $this->arridSmt = $this->getallKHS->groupBy('id_periode');
    }


    public function render()
    {
        if ($this->idsemester % 2 != 0) {
            $a = (($this->idsemester + 10) - 1) / 10;
            $b = $a - $this->angkatan;
            $this->c = ($b * 2) - 1;
        } else {
            $a = (($this->idsemester + 10) - 2) / 10;
            $b = $a - $this->angkatan;
            $this->c = $b * 2;
        }
        $this->listMatkul;
        $this->kodeMK = $this->listMatkul->pluck('kode_mata_kuliah');
        $this->arridSmt;
        $this->get_khs_between = $this->getallKHS->whereBetween('id_periode', [$this->periodeAwal, $this->idsemester]);
        $this->b_total_sks = collect($this->get_khs_between)->sum('sks_mata_kuliah');
        $this->getKHS = $this->getallKHS->where('id_periode', $this->idsemester);
        $this->total_sks = $this->getKHS->sum('sks_mata_kuliah');
        $this->b_totalsksxindeks = $this->get_khs_between->sum('sks_x_indeks');
        return view('livewire.khs');
    }
}
