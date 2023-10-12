<?php

namespace App\Exports;

use App\Models\Ketimpangan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportKetimpangan implements FromCollection, WithHeadings
{
    public function collection()
    {
        $data = DB::table('dataketimpangan')->get();
        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Tahun',
            'Gini Ratio',
        ];
    }
}
