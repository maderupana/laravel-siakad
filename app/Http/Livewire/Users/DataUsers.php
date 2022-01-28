<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataUsers extends Component
{

    public $model = User::class;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->sortBy('id'),

            Column::name('nama')
                ->label('Name'),

            Column::name('email'),

            DateColumn::name('created_at')
                ->label('Creation Date')
        ];
    }
    // public function render()
    // {
    //     return view('livewire.users.data-users');
    // }
}
