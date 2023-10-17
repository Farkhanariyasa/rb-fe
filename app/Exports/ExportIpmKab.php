<?php

namespace App\Exports;

use App\Models\IpmKab;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportIpmKab implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return IpmKab::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Tahun',
            'Kabupaten',
            'Ipm',
        ];
    }
}
