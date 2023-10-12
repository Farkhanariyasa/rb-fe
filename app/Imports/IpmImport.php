<?php

namespace App\Imports;

use App\Models\Ipm;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class IpmImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ipm([
            //id	fungsi	indikator	time_lag	tahun	variabel	satuan	IPM	RLS	AHS	RPJM_sekolah	AHH	pengeluaran_perkapita	garis_kemiskinan_tahun
            'id' => $row[0],
            'fungsi' => $row[1],
            'indikator' => $row[2],
            'time_lag' => $row[3],
            'tahun' => $row[4],
            'variabel' => $row[5],
            'satuan' => $row[6],
            'IPM' => $row[7],
            'RLS' => $row[8],
            'AHS' => $row[9],
            'RPJM_sekolah' => $row[10],
            'AHH' => $row[11],
            'pengeluaran_perkapita' => $row[12],
            'garis_kemiskinan_tahun' => $row[13]
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
