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
            'tahun' => $row[1],
            'pdrb_adhb' => $row[2],
            'pdrb_adhk' => $row[3],
            'pdrb_perkapita' => $row[4],
            'laju_pertumbuhan_ekonomi' => $row[5],
        ]);
    }

    public function startRow(): int
    {
        $lastRecord = Pdrb::orderBy('id', 'desc')->first();
        return $lastRecord->id + 2;
    }
}
