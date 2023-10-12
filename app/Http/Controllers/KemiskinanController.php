<?php

namespace App\Http\Controllers;

use App\Exports\ExportKemiskinan;
use App\Imports\KemiskinanImport;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class KemiskinanController extends Controller
{
    protected $table = 'kemiskinan';

    public function index()
    {
        $kemiskinan = DB::table($this->table)->paginate(10);
        $data = [
            "title" => "KEMISKINAN",
            "active" => "kemiskinan"
        ];

        return view('admin.sosial.kemiskinan', [
            'kemiskinan' => $kemiskinan,
            'data' => $data
        ]);
    }


    public function export()
    {

        try {
            Alert::success('Success', 'Template file downloaded.');
            return Excel::download(new ExportKemiskinan(), 'kemiskinan.xlsx');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to download template file.');
            return redirect()->back();
        }
    }

    // index_tabel
    public function index_tabel()
    {
        $kemiskinan = DB::table('datakemiskinan')->get();
        $data = [
            "title" => "KEMISKINAN TABEL",
            "active" => "kemiskinan"
        ];
        return view('sosial.table.kemiskinan', ['data' => $data, 'kemiskinan' => $kemiskinan]);
    }

    public function import(Request $request)
    {
        try {
            $file = $request->file('file');
            $nama_file = rand() . $file->getClientOriginalName();
            $file->move('kemiskinan', $nama_file);
            // DB::table('kemiskinan')->truncate();
            Excel::import(new KemiskinanImport, public_path('/kemiskinan/' . $nama_file));
            Alert::success('Success', 'Data imported successfully.');
            return redirect('admin/kemiskinan');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to import data.');
            return redirect()->back();
        }
    }
}
