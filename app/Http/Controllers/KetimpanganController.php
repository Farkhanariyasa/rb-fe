<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportKetimpangan;
use App\Imports\KetimpanganImport;
use App\Exports\ExportGiniKab;
use App\Imports\GiniKabImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class KetimpanganController extends Controller
{
    //

    public function index_tabel()
    {
        $ketimpangan = DB::table('dataketimpangan')->get();
        $gini_kab = DB::table('ginimap')->get();
        $data = [
            "title" => "Ketimpangan",
            "active" => "ketimpangan"
        ];
        return view('sosial.table.ketimpangan', ['data' => $data, 'ketimpangan' => $ketimpangan, 'gini' => $gini_kab]);
    }

    // ekspor
    public function export()
    {
        try {
            return Excel::download(new ExportKetimpangan(), 'ketimpangan.xlsx');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to download template file.');
            return redirect()->back();
        }
    }

    // impor
    public function import(Request $request)
    {
        try {
            $file = $request->file('file');
            Excel::import(new KetimpanganImport, $file);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    // ex im ginikab
    public function export_ginikab()
    {
        try {
            return Excel::download(new ExportGiniKab(), 'gini.xlsx');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function import_ginikab(Request $request)
    {
        try {
            $file = $request->file('file');
            DB::table('ginimap')->truncate();
            Excel::import(new GiniKabImport, $file);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
