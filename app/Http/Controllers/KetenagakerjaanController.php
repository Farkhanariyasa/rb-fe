<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Exports\ExportKetenagakerjaan;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TpakImport;
use App\Exports\ExportTpak;
use App\Imports\KetenagakerjaanImport;
use RealRashid\SweetAlert\Facades\Alert;


use Illuminate\Http\Request;

class KetenagakerjaanController extends Controller
{
    protected $table = 'ketenagakerjaan';
    public function index()
    {
        $ketenagakerjaan = DB::table($this->table)->paginate(10);
        $data = [
            "title" => "Ketenagakerjaan",
            "active" => "ketenagakerjaan"
        ];
        return view('admin/sosial/ketenagakerjaan', ['data' => $data, 'ketenagakerjaan' => $ketenagakerjaan]);
    }

    // index_tabel
    public function index_tabel()
    {
        $ketenagakerjaan = DB::table('datatenagakerja')->get();
        $tpak = DB::table('tpakmap')->get();
        $tpt = DB::table('tptmap')->get();
        $data = [
            "title" => "Ketenagakerjaan",
            "active" => "ketenagakerjaan"
        ];
        return view('sosial.table.ketenagakerjaan', ['data' => $data, 'ketenagakerjaan' => $ketenagakerjaan, 'tpak' => $tpak, 'tpt' => $tpt]);
    }

    public function export()
    {
        try {
            return Excel::download(new ExportKetenagakerjaan(), 'ketenagakerjaan.xlsx');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to download template file.');
            return redirect()->back();
        } // Convert array to collection and then download
    }

    public function import(Request $request)
    {
        try {
            $file = $request->file('file');
            Excel::import(new KetenagakerjaanImport, $file);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
    
    // ex im tpak
    public function export_tpak()
    {
        try {
            return Excel::download(new ExportTpak, 'tpak.xlsx');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to download template file.');
            return redirect()->back();
        } // Convert array to collection and then download
    }

    public function import_tpak(Request $request)
    {
        try {
            $file = $request->file('file');
            DB::table('tpakmap')->truncate();
            Excel::import(new TpakImport, $file);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
