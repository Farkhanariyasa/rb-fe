<?php

namespace App\Exports;

use App\Models\Kemiskinan;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportKetenagakerjaan implements FromCollection, WithHeadings
{
    public function collection()
    {
        $data = DB::table('datatenagakerja')->get();
        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Tahun',
            'Usia Kerja',
            'Angkatan Kerja',
            'Bukan Angkatan Kerja',
            'Bekerja',
            'Pengangguran',
            'Sekolah',
            'Mengurus Rumah Tangga',
            'Lainnya',
            'Tingkat Partisipasi Angkatan Kerja',
            'Tingkat Pengangguran Terbuka',
        ];
    }
}
