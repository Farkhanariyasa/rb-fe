<?php

namespace App\Exports;

use App\Models\Pdrb;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPdrb implements FromCollection, WithHeadings
{
    public function collection()
    {
        $data = DB::table('datapdrb')->get();
        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Tahun',
            'PDRB ADHB',
            'PDRB ADHK',
            'PDRB Perkapita',
            'Laju Pertumbuhan Ekonomi',
        ];
    }
}
