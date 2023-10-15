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
            'id' => $row[0],
            // id	tahun	usia_kerja	angkatan_kerja	bukan_angkatan_kerja	bekerja	pengangguran	sekolah	mengurus_rt	lainnya	tpak	tpt
            'tahun' => $row[1],
            'usia_kerja' => $row[2],
            'angkatan_kerja' => $row[3],
            'bukan_angkatan_kerja' => $row[4],
            'bekerja' => $row[5],
            'pengangguran' => $row[6],
            'sekolah' => $row[7],
            'mengurus_rt' => $row[8],
            'lainnya' => $row[9],
            'tpak' => $row[10],
            'tpt' => $row[11],
        ]);
    }

    public function startRow(): int
    {
        $lastRecord = Ketenagakerjaan::orderBy('id', 'desc')->first();
        return $lastRecord->id + 2;
    }
}
