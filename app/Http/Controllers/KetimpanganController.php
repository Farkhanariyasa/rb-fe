<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportKetimpangan;
use App\Imports\KetimpanganImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class KetimpanganController extends Controller
{
    //

    public function index_tabel() {
        $ketimpangan = DB::table('dataketimpangan')->get();
        $data = [
            "title" => "Ketimpangan",
            "active" => "ketimpangan"
        ];
        return view('sosial.table.ketimpangan', ['data' => $data, 'ketimpangan' => $ketimpangan]);
    }

    // ekspor
    public function export() {
        try {
            return Excel::download(new ExportKetimpangan(), 'ketimpangan.xlsx');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to download template file.');
            return redirect()->back();
        }
    }

    // impor
    public function import(Request $request) {
        try {
            $file = $request->file('file');
            Excel::import(new KetimpanganImport, $file);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
