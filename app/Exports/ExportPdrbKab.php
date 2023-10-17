<?php

namespace App\Exports;

use App\Models\PdrbKab;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPdrbKab implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PdrbKab::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Tahun',
            'Kabupaten',
            'PDRB',
        ];
    }
}
