<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportHarga;
use App\Imports\HargaImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;


class HargaController extends Controller
{
    protected $table = 'harga';

    public function index()
    {
        $harga = DB::table($this->table)->paginate(10);
        $data = [
            "title" => "HARGA",
            "active" => "harga"
        ];

        return view('admin.ekonomi.harga', [
            'harga' => $harga,
            'data' => $data
        ]);
    }

    public function index_tabel()
    {
        $produksi = DB::table('dataproduksi')->paginate(10);
        $data = [
            "title" => "Produksi",
            "active" => "produksi"
        ];
        return view('ekonomi.harga', ['data' => $data, 'produksi' => $produksi]);
    }

    public function export()
    {
        try {
            return Excel::download(new ExportHarga, 'produksi.xlsx');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to download template file.');
            return redirect()->back();
        }
    }

    public function import(Request $request)
    {
        try {
            $file = $request->file('file');
            // $nama_file = rand() . $file->getClientOriginalName() ."inilah";
            // $file->move('harga', $nama_file);
            Excel::import(new HargaImport, $file);
            Alert::success('Success', 'Data imported successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to import data.');
            return redirect()->back();
        }
    }
}
