<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Exports\ExportKetenagakerjaan;
use Maatwebsite\Excel\Facades\Excel;
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
        $data = [
            "title" => "Ketenagakerjaan",
            "active" => "ketenagakerjaan"
        ];
        return view('sosial.table.ketenagakerjaan', ['data' => $data, 'ketenagakerjaan' => $ketenagakerjaan]);
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
}
