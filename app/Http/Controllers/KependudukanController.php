<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Exports\ExportKependudukan;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KependudukanImport;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KependudukanController extends Controller
{
    protected $table = 'kependudukan';
    public function index()
    {
        $kependudukan = DB::table($this->table)->get();
        $data = [
            "title" => "Kependudukan",
            "active" => "kependudukan"
        ];

        // $kependudukans = DataTables::of($kependudukan)->make(true);
        return view('admin/sosial/kependudukan', ['data' => $data, 'kependudukan' => $kependudukan]);
        // return $kependudukans;
    }

    // index_tabel
    public function index_tabel()
    {
        $kependudukan = DB::table('datapenduduk')->get();
        $data = [
            "title" => "Kependudukan",
            "active" => "kependudukan"
        ];
        return view('sosial.table.kependudukan', ['data' => $data, 'kependudukan' => $kependudukan]);
    }

    public function export()
    {
        try {
            return Excel::download(new ExportKependudukan(), 'kependudukan.xlsx');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to download template file.');
            return redirect()->back();
        } // Convert array to collection and then download
    }

    public function import(Request $request)
    {
        try {
            $file = $request->file('file');
            Excel::import(new KependudukanImport, $file);
            // Alert::success('Success', 'Data imported successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            error_log("Pesan yang akan dicetak ke konsol");
            alert()->success('Success', 'Data imported successfully.');
            return redirect()->back()->with('error', 'Data gagal diimport');
        }
    }
}
