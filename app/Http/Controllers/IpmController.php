<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exports\ExportIpm;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\IpmImport;
use RealRashid\SweetAlert\Facades\Alert;

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
        return view('sosial.table.ipm', ['data' => $data, 'ipm' => $ipm]);
    }

    public function export()
    {
        try {
            return Excel::download(new ExportIpm(), 'ipm.xlsx');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to download template file.');
            return redirect()->back();
        } // Convert array to collection and then download
    }

    public function import(Request $request)
    {
        try {
            $file = $request->file('file');
            $nama_file = rand() . $file->getClientOriginalName();
            $file->move('ipm', $nama_file);
            // DB::table('ipm')->truncate();
            Excel::import(new IpmImport, public_path('/ipm/' . $nama_file));
            Alert::success('Success', 'Data imported successfully.');
            return redirect('admin/ipm');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to import data.');
            return redirect()->back();
        }
    }
}
