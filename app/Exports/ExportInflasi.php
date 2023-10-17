<?php

namespace App\Exports;

use App\Models\Inflasi;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportInflasi implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = DB::table('datainflasi')->get();
        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Tahun',
            'Inflasi Yogyakarta',
            'Inflasi Nasional',
        ];
    }
}
