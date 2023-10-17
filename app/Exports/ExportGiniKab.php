<?php

namespace App\Exports;

use App\Models\GiniKab;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportGiniKab implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return GiniKab::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Tahun',
            'Kabupaten',
            'Gini Ratio',
        ];
    }
}
