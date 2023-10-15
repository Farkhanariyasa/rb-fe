<?php

namespace App\Imports;

use App\Models\Pdrblapus;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PdrblapusImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pdrblapus([
            //idtahun	kode_lapangan_usaha	lapangan_usaha	adhb_lapangan_usaha	adhk_lapangan usaha	distribusi_lapangan usaha	laju_adhk_lapangan_usaha
            'id' => $row[0],
            'tahun' => $row[1],
            'kode_lapangan_usaha' => $row[2],
            'lapangan_usaha' => $row[3],
            'adhb_lapangan_usaha' => $row[4],
            'adhk_lapangan_usaha' => $row[5],
            'distribusi_lapangan_usaha' => $row[6],
            'laju_adhk_lapangan_usaha' => $row[7],
        ]);
    }

    public function startRow(): int
    {
        $lastRecord = Pdrblapus::orderBy('id', 'desc')->first();
        return $lastRecord->id + 2;
    }
}
