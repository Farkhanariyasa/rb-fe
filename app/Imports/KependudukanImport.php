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
            'id' => $row[0], // Sesuaikan kolom id dengan Kependudukan
            'tahun' => $row[1],
            'penduduk' => $row[2], // Sesuaikan dengan indeks kolom yang sesuai di dalam array $row
            'sex_ratio' => $row[3],
            'luas_wilayah' => $row[4],
            'kepadatan_penduduk' => $row[5],
            'laki_laki' => $row[6],
            'perempuan' => $row[7],
            'persen_laki' => $row[8],
            'persen_perempuan' => $row[9],
        ]);
        
    }

    public function startRow(): int
    {
        $lastRecord = Kependudukan::orderBy('id', 'desc')->first();
        return $lastRecord->id + 2;
    }
}
