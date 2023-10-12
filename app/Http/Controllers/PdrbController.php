<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PdrbImport;
use App\Exports\ExportPdrb;
use App\Exports\ExportPdrbLapus;
use App\Models\Pdrb;

class PdrbController extends Controller
{
    protected $tabel = 'pdrb';
    public function index()
    {
        $pdrb = DB::table($this->tabel)->paginate(10);
        $data = [
            "title" => "PDRB",
            "active" => "pdrb"
        ];
        return view('admin.ekonomi.pdrb', ['data' => $data, 'pdrb' => $pdrb]);
    }

    public function index_tabel()
    {
        $pdrb = DB::table('datapdrb')->get();
        $pdrblapus = DB::table('datapdrblapus')->get();
        $data = [
            "title" => "PDRB",
            "active" => "pdrb"
        ];
        return view('ekonomi.pdrb', ['data' => $data, 'pdrb' => $pdrb, 'pdrblapus' => $pdrblapus]);
    }

    public function export()
    {
        try {
            return Excel::download(new ExportPdrb, 'pdrb.xlsx');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to download template file.');
            return redirect()->back();
        }
    }
    
    // export pdrblapus
    public function export_pdrblapus()
    {
        try {
            return Excel::download(new ExportPdrbLapus, 'pdrb_lapangan_usaha.xlsx');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to download template file.');
            return redirect()->back();
        }
    }

    public function import(Request $request)
    {
        try {
            $file = $request->file('file');
            $nama_file = rand() . $file->getClientOriginalName();
            $file->move('pdrb', $nama_file);
            // DB::table('pdrb')->truncate();
            Excel::import(new PdrbImport, public_path('/pdrb/' . $nama_file));
            Alert::success('Success', 'Data imported successfully.');
            return redirect('admin/pdrb');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to import data.');
            return redirect()->back();
        }
    }
}
