<?php

namespace App\Imports;

use App\Models\Penerimaan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class PenerimaanImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Penerimaan([
            //id	fungsi	indikator	time_lag	tahun	variabel	satuan	hierarki1	penerimaan_daerah	penyusun_penerimaan_daerah

            'id' => $row[0],
            'tahun' => $row[1],
            'penerimaan_daerah' => $row[2],

        ]);
    }

    public function startRow(): int
    {
        $lastRecord = Penerimaan::orderBy('id', 'desc')->first();
        return $lastRecord->id + 2;
    }
}
