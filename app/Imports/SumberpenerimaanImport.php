<?php

namespace App\Imports;

use App\Models\Sumberpenerimaan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class SumberpenerimaanImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Sumberpenerimaan([
            //id	fungsi	indikator	time_lag	tahun	variabel	satuan	hierarki1	penerimaan_daerah	penyusun_penerimaan_daerah

            'id' => $row[0],
            'tahun' => $row[1],
            'sumber_penerimaan' => $row[2],
            'penerimaan' => $row[3],

        ]);
    }

    public function startRow(): int
    {
        $lastRecord = Sumberpenerimaan::orderBy('id', 'desc')->first();
        return $lastRecord->id + 2;
    }
}
