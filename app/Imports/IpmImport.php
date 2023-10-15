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
        $rows = [
            'id' => $row[0],
            'tahun' => $row[1],
            'ipm' => $row[2],
            'rls' => $row[3],
            'ahs' => $row[4],
            'ahh' => $row[5],
            'pengeluaran_perkapita' => $row[6],
            'garis_kemiskinan_tahun' => $row[7],
        ];
        return new Ipm($rows);
    }

    public function startRow(): int
    {
        // get last id
        $lastRecord = Ipm::orderBy('id', 'desc')->first();
        return $lastRecord->id + 2;
        // return 2;
    }
}
