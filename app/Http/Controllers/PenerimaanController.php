<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportPenerimaan;
use App\Imports\PenerimaanImport;
use App\Exports\ExportSumberPenerimaan;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class PenerimaanController extends Controller
{
    protected $table = 'penerimaan';

    public function index()
    {
        $penerimaan = DB::table($this->table)->paginate(10);
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
        $penerimaan = DB::table('datapenerimaan')->paginate(10);
        $sumber = DB::table('datasumberpenerimaan')->paginate(10);
        $data = [
            "title" => "Penerimaan Daerah",
            "active" => "penerimaan"
        ];
        return view('ekonomi.penerimaan', ['data' => $data, 'penerimaan' => $penerimaan , 'sumber' => $sumber]);
    }

    public function import(Request $request)
    {
        try {
            $file = $request->file('file');
            $nama_file = rand() . $file->getClientOriginalName();
            $file->move('penerimaan', $nama_file);
            // DB::table('penerimaan')->truncate();
            Excel::import(new PenerimaanImport, public_path('/penerimaan/' . $nama_file));
            Alert::success('Success', 'Data imported successfully.');
            return redirect('admin/penerimaan');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to import data.');
            return redirect()->back();
        }
    }
}
