<?php

namespace App\Imports;

use App\Models\Pdrb;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PdrbImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pdrb([
            //id	fungsi	indikator	time_lag	tahun	variabel	satuan	hierarki1	pdrb_adhb	pdrb_adhk	pdrb_perkapita	laju_pertumbuhan_ekonomi	lapangan_usaha	adhb_lapangan_usaha	adhk_lapangan usaha	distribusi_lapangan usaha	laju_adhk_lapangan_usaha	laju_pdrb_pak_rio
            'id' => $row[0],
            'fungsi' => $row[1],
            'indikator' => $row[2],
            'time_lag' => $row[3],
            'tahun' => $row[4],
            'variabel' => $row[5],
            'satuan' => $row[6],
            'hierarki1' => $row[7],
            'pdrb_adhb' => $row[8],
            'pdrb_adhk' => $row[9],
            'pdrb_perkapita' => $row[10],
            'laju_pertumbuhan_ekonomi' => $row[11],
            'lapangan_usaha' => $row[12],
            'adhb_lapangan_usaha' => $row[13],
            'adhk_lapangan_usaha' => $row[14],
            'distribusi_lapangan_usaha' => $row[15],
            'laju_adhk_lapangan_usaha' => $row[16],
            'laju_pdrb_pak_rio' => $row[17]
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
