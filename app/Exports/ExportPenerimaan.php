<?php

namespace App\Exports;

use App\Models\Penerimaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPenerimaan implements FromCollection, WithHeadings
{
    public function collection()
    {
        $data = DB::table('datapenerimaan')->get();
        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Tahun',
            'Penerimaan Daerah',
        ];
    }
}
