<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exports\ExportIpm;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\IpmImport;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\ExportIpmKab;
use App\Imports\IpmKabImport;

class IpmController extends Controller
{
    protected $table = 'ipm';
    public function index()
    {
        $ipm = DB::table($this->table)->paginate(10);
        $data = [
            "title" => "IPM",
            "active" => "ipm"
        ];
        return view('admin/sosial/ipm', ['data' => $data, 'ipm' => $ipm]);
    }

    public function index_tabel()
    {
        $ipm = DB::table('dataipm')->get();
        $data = [
            "title" => "IPM",
            "active" => "ipm"
        ];

        $data_map = DB::table('ipmmap')->get();
        return view('sosial.table.ipm', ['data' => $data, 'ipm' => $ipm, 'ipm_map' => $data_map]);
    }

    public function export()
    {
        try {
            return Excel::download(new ExportIpm(), 'ipm.xlsx');
        } catch (\Exception $e) {
            return redirect()->back();
        } // Convert array to collection and then download
    }

    public function import(Request $request)
    {
        try {
            $file = $request->file('file');
            // $nama_file = rand() . $file->getClientOriginalName();
            // $file->move('dataipm', $nama_file);
            // DB::table('dataipm')->truncate();
            error_log("Pesan yang akan dicetak ke konsol");
            Excel::import(new IpmImport,  $file);
            return redirect()->back();
        } catch (\Exception $e) {
            alert()->success('Success', 'Data imported successfully.');
            return redirect()->back();
        }
    }

    // ex im ipmkab
    public function export_ipmkab()
    {
        try {
            return Excel::download(new ExportIpmKab(), 'ipm_kabupaten.xlsx');
        } catch (\Exception $e) {
            return redirect()->back();
        } // Convert array to collection and then download
    }

    public function import_ipmkab(Request $request)
    {
        try {
            $file = $request->file('file');
            // $nama_file = rand() . $file->getClientOriginalName();
            // $file->move('dataipmkab', $nama_file);
            DB::table('ipmmap')->truncate();
            Excel::import(new IpmKabImport, $file);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
