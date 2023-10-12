<?php

namespace App\Exports;

use App\Models\Kemiskinan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportKependudukan implements FromCollection, WithHeadings
{
    public function collection()
    {
        $data = DB::table('datapenduduk')->get();
        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Tahun',
            'Jumlah Penduduk',
            'Sex Ratio',
            'Luas Wilayah',
            'Kepadatan Penduduk',
            'Jumpah Penduduk Laki-laki',
            'Jumlah Penduduk Perempuan',
            'Persentase Penduduk Laki-laki',
            'Persentase Penduduk Perempuan',
        ];
    }
}
