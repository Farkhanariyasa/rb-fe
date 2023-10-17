<?php

namespace App\Imports;

use App\Models\GiniKab;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GiniKabImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new GiniKab([
            'id' => $row[0],
            'tahun' => $row[1],
            'kabupaten' => $row[2],
            'gini' => $row[3],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
