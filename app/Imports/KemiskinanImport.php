<?php

namespace App\Imports;

use App\Models\Kemiskinan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KemiskinanImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Kemiskinan([
            //id	fungsi	indikator	time_lag	tahun	variabel	satuan	hierarki1	hierarki2	jumlah_miskin	persentase_miskin	p1	p2
            'id' => $row[0],
            'fungsi' => $row[1],
            'indikator' => $row[2],
            'time_lag' => $row[3],
            'tahun' => $row[4],
            'variabel' => $row[5],
            'satuan' => $row[6],
            'hierarki1' => $row[7],
            'hierarki2' => $row[8],
            'jumlah_miskin' => $row[9],
            'persentase_miskin' => $row[10],
            'p1' => $row[11],
            'p2' => $row[12],
        ]);
        
    }

    public function startRow(): int
    {
        return 2;
    }
}
