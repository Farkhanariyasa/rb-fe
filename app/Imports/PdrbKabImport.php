<?php

namespace App\Imports;

use App\Models\PdrbKab;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PdrbKabImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PdrbKab([
            'id' => $row[0],
            'tahun' => $row[1],
            'kabupaten' => $row[2],
            'pdrb' => $row[3],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
