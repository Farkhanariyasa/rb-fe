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
            'tahun' => $row[1],
            'produksi_padi' => $row[2],
            'luas_panen_padi' => $row[3]
        ]);
    }

    public function startRow(): int
    {
        $lastRecord = Harga::orderBy('id', 'desc')->first();
        return $lastRecord->id + 2;
    }
}
