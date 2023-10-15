<?php

namespace App\Imports;

use App\Models\Ketimpangan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KetimpanganImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ketimpangan([
            //id	fungsi	indikator	time_lag	tahun	variabel	satuan	produksi_padi 	luas_panen_padi
            'id' => $row[0],
            'tahun' => $row[1],
            'gini_ratio' => $row[2],
        ]);
    }

    public function startRow(): int
    {
        $lastRecord = Ketimpangan::orderBy('id', 'desc')->first();
        return $lastRecord->id + 2;
    }
}
