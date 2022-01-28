<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\user;
use App\Models\OpenPeriode;
use Livewire\WithPagination;

class Openaccesskrs extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $GetOpenPeriode;
    public $concatValuePeriode;
    public $Data_Mahasiswa;
    public $statusValidasi = [];
    public $message;
    public $numOfPaginate = 10;
    public $search = '';
    public $filterAngkatan = '';

    public function mount()
    {
        // $this->Data_Mahasiswa = User::where('status', 'Mahasiswa')->get();
        $this->GetOpenPeriode = OpenPeriode::where('id', 1)->get()[0];
        $this->concatValuePeriode = $this->GetOpenPeriode->pluck('nama_periode')[0];
        $this->statusValidasi;
    }

    public function updateStatusPembayaran($id)
    {
        sleep(1);
        User::where('id', $id)->update(['status_pembayaran' => $this->statusValidasi]);
        $this->statusValidasi = null;
        $this->Data_Mahasiswa;
    }

    // public function tes($id)
    // {
    //     if ($id) {
    //         return $this->statusValidasi = $id;
    //     } else {
    //         return $this->statusValidasi = ['no data'];
    //     }
    // }

    public function render()
    {
        // $this->Data_Mahasiswa = User::where('status', 'Mahasiswa')->paginate(10);
        return view('livewire.openaccesskrs', [
            'validOrNot' => User::where('status', 'Mahasiswa')
                ->where(function ($query) {
                    $query->orWhere('nama', 'like', '%' . $this->search . '%')
                        ->orWhere('username', 'like', '%' . $this->search . '%');
                })
                ->where('username', 'like', $this->filterAngkatan . '%')
                ->paginate($this->numOfPaginate),
            'data_mhs' => User::where('status', 'Mahasiswa')
                ->where(function ($query) {
                    $query->orWhere('nama', 'like', '%' . $this->search . '%')
                        ->orWhere('username', 'like', '%' . $this->search . '%');
                })
                ->where('username', 'like', $this->filterAngkatan . '%')
                ->paginate($this->numOfPaginate),

        ]);
    }
}
