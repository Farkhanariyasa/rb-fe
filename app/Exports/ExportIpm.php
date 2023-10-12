<?php

namespace App\Exports;

use App\Models\Ipm;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportIpm implements FromCollection, WithHeadings
{
    public function collection()
    {
        $data = DB::table('dataipm')->get();
        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Tahun',
            'IPM',
            'Rata-rata Lama Sekolah',
            'Angka Harapan Lama Sekolah',
            'Angka Harapan Hidup',
            'Pengeluaran Perkapita',
            'Garis Kemiskinan',
        ];
    }
}
