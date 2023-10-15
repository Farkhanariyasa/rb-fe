<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportPenerimaan;
use App\Imports\PenerimaanImport;
use App\Exports\ExportSumberPenerimaan;
use App\Imports\SumberpenerimaanImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class PenerimaanController extends Controller
{
    protected $table = 'penerimaan';

    public function index()
    {
        $penerimaan = DB::table($this->table)->get();
        $data = [
            "title" => "PENERIMAAN",
            "active" => "penerimaan"
        ];

        return view('admin.ekonomi.penerimaan', [
            'penerimaan' => $penerimaan,
            'data' => $data
        ]);
    }

    public function export()
    {
        try {
            return Excel::download(new ExportPenerimaan, 'penerimaan.xlsx');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to download template file.');
            return redirect()->back();
        }
    }

    // export sumberpenerimaan
    public function export_sumberpenerimaan()
    {
        try {
            return Excel::download(new ExportSumberPenerimaan, 'sumber_penerimaan.xlsx');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to download template file.');
            return redirect()->back();
        }
    }

    public function index_tabel()
    {
        $penerimaan = DB::table('datapenerimaan')->get();
        $sumber = DB::table('datasumberpenerimaan')->get();
        $data = [
            "title" => "Penerimaan Daerah",
            "active" => "penerimaan"
        ];
        return view('ekonomi.penerimaan', ['data' => $data, 'penerimaan' => $penerimaan, 'sumber' => $sumber]);
    }

    public function import(Request $request)
    {
        try {
            $file = $request->file('file');
            Excel::import(new PenerimaanImport, $file);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    // import_sumber
    public function import_sumber(Request $request)
    {
        try {
            $file = $request->file('file');
            Excel::import(new SumberpenerimaanImport, $file);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
