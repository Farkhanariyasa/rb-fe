<?php

namespace App\Imports;

use App\Models\Ketenagakerjaan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KetenagakerjaanImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Ketenagakerjaan([
            // id	fungsi	indikator	time_lag	tahun	variabel	hierarki1	usia_kerja	angkatan_kerja	bukan_angkatan_kerja	persen_h1_usia_kerja	bekerja	pengangguran	sekolah	mengurus_rt	lainnya	persen_h2_usia_kerja	jml_tenaga_kerja	TPAK	TPT
            'id' => $row[0],
            'fungsi' => $row[1],
            'indikator' => $row[2],
            'time_lag' => $row[3],
            'tahun' => $row[4],
            'variabel' => $row[5],
            'hierarki1' => $row[6],
            'usia_kerja' => $row[7],
            'angkatan_kerja' => $row[8],
            'bukan_angkatan_kerja' => $row[9],
            'persen_h1_usia_kerja' => $row[10],
            'bekerja' => $row[11],
            'pengangguran' => $row[12],
            'sekolah' => $row[13],
            'mengurus_rt' => $row[14],
            'lainnya' => $row[15],
            'persen_h2_usia_kerja' => $row[16],
            'jml_tenaga_kerja' => $row[17],
            'TPAK' => $row[18],
            'TPT' => $row[19]
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
