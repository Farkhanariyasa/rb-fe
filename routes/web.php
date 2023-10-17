<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Name;
use App\Exports\ExportKemiskinan;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = [
        "title" => "HOME",
        "active" => "home"
    ];

    return view('home', ["data" => $data]);
});



// kemiskinan
Route::get('/admin/kemiskinan', [KemiskinanController::class, 'index']);
Route::get('export/excel_kemiskinan', [KemiskinanController::class, 'export'])->name('export.excel_kemiskinan');
Route::post('/admin/kemiskinan/import_excel', [KemiskinanController::class, 'import'])->name('import.excel_kemiskinan');

//ipm
Route::get('/admin/ipm', [IpmController::class, 'index']);
Route::get('export/excel_ipm', [IpmController::class, 'export'])->name('export.excel_ipm');
Route::post('/admin/ipm/import_excel', [IpmController::class, 'import'])->name('import.excel_ipm');

//kependudukan
Route::get('/admin/kependudukan', [KependudukanController::class, 'index']);
Route::get('export/excel_kependudukan', [KependudukanController::class, 'export'])->name('export.excel_kependudukan');
Route::post('/admin/kependudukan/import_excel', [KependudukanController::class, 'import'])->name('import.excel_kependudukan');

//ketenagakerjaan
Route::get('/admin/ketenagakerjaan', [KetenagakerjaanController::class, 'index']);
Route::get('export/excel_ketenagakerjaan', [KetenagakerjaanController::class, 'export'])->name('export.excel_ketenagakerjaan');
Route::post('/admin/ketenagakerjaan/import_excel', [KetenagakerjaanController::class, 'import'])->name('import.excel_ketenagakerjaan');

// pdrb
Route::get('/admin/pdrb', [PdrbController::class, 'index']);
Route::get('export/excel_pdrb', [PdrbController::class, 'export'])->name('export.excel_pdrb');
Route::get('export/excel_pdrblapus', [PdrbController::class, 'export_pdrblapus'])->name('export.excel_pdrblapus');
Route::post('/admin/pdrb/import_excel', [PdrbController::class, 'import'])->name('import.excel_pdrb');
Route::post('/admin/pdrblapus/import_excel', [PdrbController::class, 'import_lapus'])->name('import.excel_pdrblapus');


// penerimaan
Route::get('/admin/penerimaan', [PenerimaanController::class, 'index']);
Route::get('export/excel_penerimaan', [PenerimaanController::class, 'export'])->name('export.excel_penerimaan');
Route::get('export/excel_sumberpenerimaan', [PenerimaanController::class, 'export_sumberpenerimaan'])->name('export.excel_sumberpenerimaan');
Route::post('/admin/penerimaan/import_excel', [PenerimaanController::class, 'import'])->name('import.excel_penerimaan');
Route::post('/admin/sumberpenerimaan/import_excel', [PenerimaanController::class, 'import_sumber'])->name('import.excel_sumberpenerimaan');

//harga
Route::get('/admin/harga', [HargaController::class, 'index']);
Route::get('export/excel_harga', [HargaController::class, 'export'])->name('export.excel_harga');
Route::post('/admin/harga/import_excel', [HargaController::class, 'import'])->name('import.excel_harga');

// ketimpangan
Route::get('/admin/ketimpangan', [KetimpanganController::class, 'index']);
Route::get('export/excel_ketimpangan', [KetimpanganController::class, 'export'])->name('export.excel_ketimpangan');
Route::post('/admin/ketimpangan/import_excel', [KetimpanganController::class, 'import'])->name('import.excel_ketimpangan');

// inflasi
Route::get('/admin/inflasi', [InflasiController::class, 'index']);
Route::get('export/excel_inflasi', [InflasiController::class, 'export'])->name('export.excel_inflasi');
Route::post('/admin/inflasi/import_excel', [InflasiController::class, 'import'])->name('import.excel_inflasi');

// inflasi-bulanan
Route::get('/admin/inflasi-bulanan', [InflasiController::class, 'index_bulanan']);
Route::get('export/excel_inflasi_bulanan', [InflasiController::class, 'export_inflasibulanan'])->name('export.excel_inflasi_bulanan');
Route::post('/admin/inflasi-bulanan/import_excel', [InflasiController::class, 'import_inflasibulanan'])->name('import.excel_inflasi_bulanan');

// ihk
Route::get('/admin/ihk', [InflasiController::class, 'index_ihk']);
Route::get('export/excel_ihk', [InflasiController::class, 'export_ihk'])->name('export.excel_ihk');
Route::post('/admin/ihk/import_excel', [InflasiController::class, 'import_ihk'])->name('import.excel_ihk');

// tpak
Route::get('/admin/tpak', [KetenagakerjaanController::class, 'index_tpak']);
Route::get('export/excel_tpak', [KetenagakerjaanController::class, 'export_tpak'])->name('export.excel_tpak');
Route::post('/admin/tpak/import_excel', [KetenagakerjaanController::class, 'import_tpak'])->name('import.excel_tpak');

// ipmkab
Route::get('/admin/ipmkab', [IpmController::class, 'index_ipmkab']);
Route::get('export/excel_ipmkab', [IpmController::class, 'export_ipmkab'])->name('export.excel_ipmkab');
Route::post('/admin/ipmkab/import_excel', [IpmController::class, 'import_ipmkab'])->name('import.excel_ipmkab');

// ginikab
Route::get('/admin/ginikab', [KetimpanganController::class, 'index_ginikab']);
Route::get('export/excel_ginikab', [KetimpanganController::class, 'export_ginikab'])->name('export.excel_ginikab');
Route::post('/admin/ginikab/import_excel', [KetimpanganController::class, 'import_ginikab'])->name('import.excel_ginikab');

// pdrbkab
Route::get('/admin/pdrbkab', [PdrbController::class, 'index_pdrbkab']);
Route::get('export/excel_pdrbkab', [PdrbController::class, 'export_pdrbkab'])->name('export.excel_pdrbkab');
Route::post('/admin/pdrbkab/import_excel', [PdrbController::class, 'import_pdrbkab'])->name('import.excel_pdrbkab');

Route::get('/dashboard-ipm', function () {
    $data = [
        "title" => "IPM",
        "active" => "ipm"
    ];
    return view('sosial/ipm', ['data' => $data]);
});

Route::get('/dashboard-kependudukan', function () {
    $data = [
        "title" => "KEPENDUDUKAN",
        "active" => "kependudukan"
    ];
    return view('sosial/kependudukan', ['data' => $data]);
});

Route::get('/dashboard-ketenagakerjaan', function () {
    $data = [
        "title" => "KETENAGAKERJAAN",
        "active" => "ketenagakerjaan"
    ];
    return view('sosial/ketenagakerjaan', ['data' => $data]);
});

Route::get('/dashboard-ketimpangan', function () {
    $data = [
        "title" => "KETIMPANGAN",
        "active" => "ketimpangan"
    ];
    return view('sosial/ketimpangan', ['data' => $data]);
});

Route::get('/dashboard-kemiskinan', function () {
    $data = [
        "title" => "KEMISKINAN",
        "active" => "kemiskinan"
    ];
    return view('sosial/kemiskinan', ['data' => $data]);
});

// dashboard penerimaan
Route::get('/dashboard-penerimaan', function () {
    $data = [
        "title" => "PENERIMAAN",
        "active" => "penerimaan"
    ];
    return view('sosial/penerimaan', ['data' => $data]);
});

// dashboardproduksi
Route::get('/dashboard-produksi', function () {
    $data = [
        "title" => "PRODUKSI",
        "active" => "produksi"
    ];
    return view('sosial/produksi', ['data' => $data]);
});

// dashboard-inflasi
Route::get('/dashboard-inflasi', function () {
    $data = [
        "title" => "INFLASI",
        "active" => "inflasi"
    ];
    return view('sosial/inflasi', ['data' => $data]);
});

// dashboard-pdrb
Route::get('/dashboard-pdrb', function () {
    $data = [
        "title" => "PDRB",
        "active" => "pdrb"
    ];
    return view('sosial/pdrb', ['data' => $data]);
});


Route::get('/tabulasi-pdrb', [PdrbController::class, 'index_tabel']);
Route::get('/tabulasi-produksi', [HargaController::class, 'index_tabel']);
Route::get('/tabulasi-penerimaan', [PenerimaanController::class, 'index_tabel']);
Route::get('/tabulasi-kemiskinan', [KemiskinanController::class, 'index_tabel']);
Route::get('/tabulasi-ipm', [IpmController::class, 'index_tabel']);
Route::get('/tabulasi-kependudukan', [KependudukanController::class, 'index_tabel']);
Route::get('/tabulasi-ketenagakerjaan', [KetenagakerjaanController::class, 'index_tabel']);
Route::get('/tabulasi-ketimpangan', [KetimpanganController::class, 'index_tabel']);
// inflasi
Route::get('/tabulasi-inflasi', [InflasiController::class, 'index']);

// Show the login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle the login form submission
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
