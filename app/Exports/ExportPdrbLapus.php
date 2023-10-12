<?php

namespace App\Exports;

use App\Models\Pdrb;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPdrbLapus implements FromCollection, WithHeadings
{
    public function collection()
    {
        $data = DB::table('datapdrblapus')->get();
        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Tahun',
            'Kode Lapangan Usaha',
            'Lapangan Usaha',
            'ADHB Lapangan Usaha',
            'ADHK Lapangan Usaha',
            'Distribusi Lapangan Usaha',
            'Laju ADHK Lapangan Usaha',
        ];
    }
}
