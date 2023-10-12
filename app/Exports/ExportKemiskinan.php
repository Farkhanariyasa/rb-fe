<?php

namespace App\Exports;

use App\Models\Kemiskinan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportKemiskinan implements FromCollection, WithHeadings  
{
    public function collection()
    {
        $data = DB::table('datakemiskinan')->get();
        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Tahun',
            'Jumlah Penduduk Miskin',
            'Persentase Penduduk Miskin',
            'P1',
            'P2',
        ];
    }
}
