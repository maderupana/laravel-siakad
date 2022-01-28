<?php

namespace App\Imports;

use App\Models\User;
use App\Models\tempStatusPembayaran;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class bulkSP implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    use Importable, SkipsFailures;
    public function model(array $rows)
    {
        return new tempStatusPembayaran([
            'nim' => $rows['nim'],
            'status_pembayaran' => $rows['status_pembayaran']
        ]);
    }
}
