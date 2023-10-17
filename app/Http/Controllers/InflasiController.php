<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Imports\InflasiImport;
use App\Imports\InflasiBulananImport;
use App\Imports\IhkImport;
use App\Exports\ExportIhk;
use App\Exports\ExportInflasiBulanan;
use App\Exports\ExportInflasi;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class InflasiController extends Controller
{
    public function index()
    {
        $inflasi = DB::table('datainflasi')->get();
        $inflasi_bulanan = DB::table('datainflasibulanan')->get();
        $Ihk = DB::table('dataihk')->get();
        $data = [
            "title" => "INFLASI",
            "active" => "inflasi"
        ];
        return view('sosial.table.inflasi', ['inflasi' => $inflasi, 'data' => $data, 'inflasi_bulanan' => $inflasi_bulanan, 'Ihk' => $Ihk]);
    }

    public function export()
    {
        try {
            return Excel::download(new ExportInflasi, 'inflasi.xlsx');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function import(Request $request)
    {
        try {
            // $request->validate([
            //     'file' => 'required|mimes:xls,xlsx'
            // ]);
            $file = $request->file('file');
            Excel::import(new InflasiImport, $file);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    // ekspor dan impor inflasi bulanan
    public function export_inflasibulanan()
    {
        try {
            return Excel::download(new ExportInflasiBulanan, 'inflasi_bulanan.xlsx');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function import_inflasibulanan(Request $request)
    {
        try {
            // $request->validate([
            //     'file' => 'required|mimes:xls,xlsx'
            // ]);
            DB::table('datainflasibulanan')->truncate();
            $file = $request->file('file');
            Excel::import(new InflasiBulananImport, $file);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    // ex im ihk
    public function export_ihk()
    {
        try {
            return Excel::download(new ExportIhk, 'ihk.xlsx');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function import_ihk(Request $request)
    {
        try {
            // $request->validate([
            //     'file' => 'required|mimes:xls,xlsx'
            // ]);
            DB::table('dataihk')->truncate();
            $file = $request->file('file');
            Excel::import(new IhkImport, $file);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
