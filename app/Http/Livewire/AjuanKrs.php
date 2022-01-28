<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\AfterCekKrs;
use App\Models\User;
use App\Models\OpenPeriode;
use App\Models\PddiktiToken;
use App\Helpers\CurlPddikti;


class AjuanKrs extends Component
{
    public $data_krs_mhs;
    public $data_mhs;
    public $id_mhs_ajuan;
    public $validasi_krs;
    public $validasi_status;
    public $GetOpenPeriode;
    public $tesToken;
    public $GetDataKHS;
    public $semesterKHS;
    public $tokenPddikti;
    public $sksxindeks, $collection_KHS, $krsValidate;
    public $sum_sks = 0;
    public $totalsksxindeks = 0;
    public $numOfPage = 1;
    public $angkatan;
    public $search = '';




    public function mount()
    {
        // $this->data_krs_mhs = collect(AfterCekKrs::where('id_pa', auth()->user()->id)->get());
        // $this->data_mhs = collect(User::where('status', 'Mahasiswa')->get());
        $this->id_mhs_ajuan;
        $this->GetOpenPeriode = OpenPeriode::where('id', 1)->get()[0];
        $this->GetDataKHS;
        $this->krsValidate;
    }

    public function getToken()
    {
        if ($this->id_mhs_ajuan != '') {
            $this->tesToken = CurlPddikti::GetTranskripMahasiswa($this->id_mhs_ajuan);
            if ($this->tesToken['error_code'] == 100) {
                PddiktiToken::where('id', 1)->update(['the_token' => CurlPddikti::GetToken()]);
                $this->GetDataKHS = CurlPddikti::GetTranskripMahasiswa($this->id_mhs_ajuan)['data'];
            } else {
                $this->GetDataKHS = CurlPddikti::GetTranskripMahasiswa($this->id_mhs_ajuan)['data'];
            }
        }
    }

    public function render()
    {
        $this->data_mhs = collect(User::where('status', 'Mahasiswa')->get());
        $this->data_krs_mhs = collect(AfterCekKrs::where('id_pa', auth()->user()->id)->get());
        return view('livewire.ajuan-krs', [
            'test' => AfterCekKrs::join('users', 'after_cek_krs.id_mhs', '=', 'users.id_registrasi_mahasiswa')
                ->where('id_pa', auth()->user()->id)
                ->where(function ($query) {
                    $query->orWhere('nama', 'like', '%' . $this->search . '%')
                        ->orWhere('username', 'like', '%' . $this->search . '%')
                        ->orWhere('periode_semester', 'like', '%' . $this->search . '%');
                })
                ->where('username', 'like', $this->angkatan . '%')
                ->get()
                ->groupBy('id_mhs')
        ]);
    }

    public function validasiKRSf()
    {

        AfterCekKrs::where('id_mhs', $this->id_mhs_ajuan)
            ->where('id_pa', auth()->user()->id)
            ->where('periode_semester', $this->GetOpenPeriode['nama_periode'])
            ->update(['status_validasi' => $this->validasi_krs]);
        $this->emit('validasiKrs');
    }
}
