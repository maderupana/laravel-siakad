<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Helpers\CurlPddikti;
use Illuminate\Support\Facades\DB;

class OpenPeriode extends Component
{
    public $getPeriode, $idPeriode, $semesterPeriode;
    public $mOpenPeriode, $id_periode_saved;
    public $namaPeriode, $accessPeriode;



    public function updateAndOpenPeriode($id, $nama_periode, $access)
    {
        DB::table('open_periodes')->where('id', 1)->update([
            'id_periode' => $this->idPeriode = $id,
            'nama_periode' => $this->namaPeriode = $nama_periode,
            'access' => $this->accessPeriode = $access,
        ]);
    }


    public function render()
    {
        $this->mOpenPeriode = DB::table('open_periodes')->where('id', 1)->get(['id_periode', 'access']);
        $this->id_periode_saved = $this->mOpenPeriode;
        $this->idPeriode;
        $this->namaPeriode;
        $this->accessPeriode;
        $this->getPeriode = collect(CurlPddikti::GetPeriode()['data'])->where('kode_prodi', '61201')->groupBy('periode_pelaporan');
        return view('livewire.open-periode');
    }
}
