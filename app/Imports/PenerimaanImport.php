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
            'fungsi' => $row[1],
            'indikator' => $row[2],
            'time_lag' => $row[3],
            'tahun' => $row[4],
            'variabel' => $row[5],
            'satuan' => $row[6],
            'hierarki1' => $row[7],
            'penerimaan_daerah' => $row[8],
            'penyusun_penerimaan_daerah' => $row[9]

        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
