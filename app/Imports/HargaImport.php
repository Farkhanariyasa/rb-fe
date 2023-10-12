<?php

namespace App\Imports;

use App\Models\Harga;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class HargaImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Harga([
            //id	fungsi	indikator	time_lag	tahun	variabel	satuan	produksi_padi 	luas_panen_padi
            'id' => $row[0],
            'fungsi' => $row[1],
            'indikator' => $row[2],
            'time_lag' => $row[3],
            'tahun' => $row[4],
            'variabel' => $row[5],
            'satuan' => $row[6],
            'produksi_padi' => $row[7],
            'luas_panen_padi' => $row[8]
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
