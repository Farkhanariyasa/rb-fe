<?php

namespace App\Exports;

use App\Models\Tpak;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportTpak implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tpak::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Tahun',
            'Kabupaten',
            'Tpak',
            'Tpt',
        ];
    }
}
