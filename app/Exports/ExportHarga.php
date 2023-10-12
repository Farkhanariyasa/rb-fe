<?php

namespace App\Exports;

use App\Models\Harga;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ExportHarga implements FromCollection, WithHeadings
{
    public function collection()
    {
        $data = DB::table('dataproduksi')->get();
        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Tahun',
            'Produksi Padi (GKG)',
            'Luas Panen Padi (Ha)',
        ];
    }
}
