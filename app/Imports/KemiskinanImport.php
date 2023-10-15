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
            'tahun' => $row[1],
            'jumlah_miskin' => $row[2],
            'persentase_miskin' => $row[3],
            'p1' => $row[4],
            'p2' => $row[5],
        ]);
        
    }

    public function startRow(): int
    {
        $lastRecord = Kemiskinan::orderBy('id', 'desc')->first();
        return $lastRecord->id + 2;
    }
}
