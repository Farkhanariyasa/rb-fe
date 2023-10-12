<?php

namespace App\Imports;

use App\Models\Kependudukan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KependudukanImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Kependudukan([
            // id	fungsi	indikator	time_lag	tahun	variabel	satuan	hierarki1	sensus_penduduk	penduduk 	penduduk_jenis_kelamin	persen_penduduk	sex_ratio	luas_wilayah	kepadatan_penduduk
            'id' => $row[0],
            'fungsi' => $row[1],
            'indikator' => $row[2],
            'time_lag' => $row[3],
            'tahun' => $row[4],
            'variabel' => $row[5],
            'satuan' => $row[6],
            'hierarki1' => $row[7],
            'sensus_penduduk' => $row[8],
            'penduduk' => $row[9],
            'penduduk_jenis_kelamin' => $row[10],
            'persen_penduduk' => $row[11],
            'sex_ratio' => $row[12],
            'luas_wilayah' => $row[13],
            'kepadatan_penduduk' => $row[14]
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
