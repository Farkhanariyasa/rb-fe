<?php

namespace App\Imports;

use App\Models\Inflasi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class InflasiImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Inflasi([
            'id' => $row[0], 
            'tahun' => $row[1],
            'Inflasi_yogyakarta' => $row[2],
            'inflasi_nasional' => $row[3],
        ]);
    }

    public function startRow(): int
    {
        $lastRecord = Inflasi::orderBy('id', 'desc')->first();
        return $lastRecord->id + 2;
    }
}
