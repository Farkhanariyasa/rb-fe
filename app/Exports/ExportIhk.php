<?php

namespace App\Exports;

use App\Models\Ihk;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportIhk implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Ihk::all();
        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Tahun',
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];
    }
}
