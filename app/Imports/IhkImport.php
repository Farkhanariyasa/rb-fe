<?php

namespace App\Imports;

use App\Models\Ihk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class IhkImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ihk([
            'id' => $row[0], 
            'tahun' => $row[1],
            'januari' => $row[2],
            'februari' => $row[3],
            'maret' => $row[4],
            'april' => $row[5],
            'mei' => $row[6],
            'juni' => $row[7],
            'juli' => $row[8],
            'agustus' => $row[9],
            'september' => $row[10],
            'oktober' => $row[11],
            'november' => $row[12],
            'desember' => $row[13],
        ]);
    }

    public function startRow(): int
    {
        return 1;
    }
}
