<?php

namespace App\Imports;

use App\Models\Tpak;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TpakImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tpak([
            'id' => $row[0],
            'tahun' => $row[1],
            'kabupaten' => $row[2],
            'tpak' => $row[3],
            'tpt' => $row[4],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
