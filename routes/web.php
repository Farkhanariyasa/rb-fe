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

// penerimaan
Route::get('/admin/penerimaan', [PenerimaanController::class, 'index']);
Route::get('export/excel_penerimaan', [PenerimaanController::class, 'export'])->name('export.excel_penerimaan');
Route::get('export/excel_sumberpenerimaan', [PenerimaanController::class, 'export_sumberpenerimaan'])->name('export.excel_sumberpenerimaan');
Route::post('/admin/penerimaan/import_excel', [PenerimaanController::class, 'import'])->name('import.excel_penerimaan');

//harga
Route::get('/admin/harga', [HargaController::class, 'index']);
Route::get('export/excel_harga', [HargaController::class, 'export'])->name('export.excel_harga');
Route::post('/admin/harga/import_excel', [HargaController::class, 'import'])->name('import.excel_harga');

// ketimpangan
Route::get('/admin/ketimpangan', [KetimpanganController::class, 'index']);
Route::get('export/excel_ketimpangan', [KetimpanganController::class, 'export'])->name('export.excel_ketimpangan');
Route::post('/admin/ketimpangan/import_excel', [KetimpanganController::class, 'import'])->name('import.excel_ketimpangan');

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

Route::get('/tabulasi-pdrb', [PdrbController::class, 'index_tabel']);
Route::get('/tabulasi-produksi', [HargaController::class, 'index_tabel']);
Route::get('/tabulasi-penerimaan', [PenerimaanController::class, 'index_tabel']);
Route::get('/tabulasi-kemiskinan', [KemiskinanController::class, 'index_tabel']);
Route::get('/tabulasi-ipm', [IpmController::class, 'index_tabel']);
Route::get('/tabulasi-kependudukan', [KependudukanController::class, 'index_tabel']);
Route::get('/tabulasi-ketenagakerjaan', [KetenagakerjaanController::class, 'index_tabel']);
Route::get('/tabulasi-ketimpangan', [KetimpanganController::class, 'index_tabel']);

// Show the login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle the login form submission
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
