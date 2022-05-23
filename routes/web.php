<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsnController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RapatController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\NonasnController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\NotulenController;
use App\Http\Controllers\PenggunaController;

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
    return view('welcome');
})->middleware('guest');


//PENGGUNA
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna')->middleware('auth', 'cekAdmin');
Route::get('/pengguna/create', [PenggunaController::class, 'create'])->middleware('auth', 'cekAdmin');
Route::post('/pengguna/create/proses', [PenggunaController::class, 'store'])->middleware('auth', 'cekAdmin');
Route::get('pengguna/tampil/{id_user}', [PenggunaController::class, 'show'])->middleware('auth', 'cekAdmin');
Route::put('pengguna/edit/proses/{id_user}', [PenggunaController::class, 'update'])->middleware('auth', 'cekAdmin');
Route::delete('pengguna/delete/{id_user}', [PenggunaController::class, 'destroy'])->middleware('auth', 'cekAdmin');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

//LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

//LOGOUT
Route::post('/logout', [LoginController::class, 'logout']);

//ASN
Route::get('/asn', [AsnController::class, 'index'])->name('asn')->middleware('auth', 'cekAdmin');
Route::get('/asn/create', [AsnController::class, 'create'])->middleware('auth', 'cekAdmin');
Route::post('/asn/create/proses', [AsnController::class, 'store'])->middleware('auth', 'cekAdmin');
Route::get('asn/tampil/{id_asn}', [AsnController::class, 'show'])->middleware('auth', 'cekAdmin');
Route::put('asn/edit/proses/{id_asn}', [AsnController::class, 'update'])->middleware('auth', 'cekAdmin');
Route::delete('asn/delete/{id_asn}', [AsnController::class, 'destroy'])->middleware('auth', 'cekAdmin');

//NON-ASN
Route::get('/nonasn', [NonasnController::class, 'index'])->name('nonasn')->middleware('auth', 'cekAdmin');
Route::get('/nonasn/create', [NonasnController::class, 'create'])->middleware('auth', 'cekAdmin');
Route::post('/nonasn/create/proses', [NonasnController::class, 'store'])->middleware('auth', 'cekAdmin');
Route::get('nonasn/tampil/{id_non}', [NonasnController::class, 'show'])->middleware('auth', 'cekAdmin');
Route::put('nonasn/edit/proses/{id_non}', [NonasnController::class, 'update'])->middleware('auth', 'cekAdmin');
Route::delete('nonasn/delete/{id_non}', [NonasnController::class, 'destroy'])->middleware('auth', 'cekAdmin');

//RAPAT 
// Route::get('/rapat', [RapatController::class, 'index'])->name('rapat')->middleware('auth', 'cekAdmin');

//PUBLIK
Route::get('/publik', [RapatController::class, 'publik'])->name('publik')->middleware('auth', 'cekAdmin');
Route::get('/rapat/publik/create', [RapatController::class, 'createpublik'])->middleware('auth', 'cekAdmin');
Route::post('/rapat/publik/create/proses', [RapatController::class, 'storepublik'])->middleware('auth', 'cekAdmin');
Route::get('rapat/publik/tampil/{id_rapat}', [RapatController::class, 'showpublik'])->middleware('auth', 'cekAdmin');
Route::put('rapat/publik/edit/proses/{id_rapat}', [RapatController::class, 'updatepublik'])->middleware('auth', 'cekAdmin');
Route::delete('rapat/publik/delete/{id_rapat}', [RapatController::class, 'destroypublik'])->middleware('auth', 'cekAdmin');

//PRIVATE
Route::get('/private', [RapatController::class, 'private'])->name('private')->middleware('auth', 'cekAdmin');
Route::get('/rapat/private/create', [RapatController::class, 'createprivate'])->middleware('auth', 'cekAdmin');
Route::post('/rapat/private/create/proses', [RapatController::class, 'storeprivate'])->middleware('auth', 'cekAdmin');
Route::get('rapat/private/tampil/{id_rapat}', [RapatController::class, 'showprivate'])->middleware('auth', 'cekAdmin');
Route::put('rapat/private/edit/proses/{id_rapat}', [RapatController::class, 'updateprivate'])->middleware('auth', 'cekAdmin');
Route::delete('rapat/private/delete/{id_rapat}', [RapatController::class, 'destroyprivate'])->middleware('auth', 'cekAdmin');

//JABATAN
Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan')->middleware('auth', 'cekAdmin');
Route::get('/jabatan/create', [JabatanController::class, 'create'])->middleware('auth', 'cekAdmin');
Route::post('/jabatan/create/proses', [JabatanController::class, 'store'])->middleware('auth', 'cekAdmin');
Route::get('jabatan/tampil/{id_jabatan}', [JabatanController::class, 'show'])->middleware('auth', 'cekAdmin');
Route::put('jabatan/edit/proses/{id_jabatan}', [JabatanController::class, 'update'])->middleware('auth', 'cekAdmin');
Route::delete('jabatan/delete/{id_jabatan}', [JabatanController::class, 'destroy'])->middleware('auth', 'cekAdmin');

//INSTANSI
Route::get('/instansi', [InstansiController::class, 'index'])->name('instansi')->middleware('auth', 'cekAdmin');
Route::get('/instansi/create', [InstansiController::class, 'create'])->middleware('auth', 'cekAdmin');
Route::post('/instansi/create/proses', [InstansiController::class, 'store'])->middleware('auth', 'cekAdmin');
Route::get('instansi/tampil/{id_instansi}', [InstansiController::class, 'show'])->middleware('auth', 'cekAdmin');
Route::put('instansi/edit/proses/{id_instansi}', [InstansiController::class, 'update'])->middleware('auth', 'cekAdmin');
Route::delete('instansi/delete/{id_instansi}', [InstansiController::class, 'destroy'])->middleware('auth', 'cekAdmin');

//BIDANG
Route::get('/bidang', [BidangController::class, 'index'])->name('bidang')->middleware('auth', 'cekAdmin');
Route::get('/bidang/create', [BidangController::class, 'create'])->middleware('auth', 'cekAdmin');
Route::post('/bidang/create/proses', [BidangController::class, 'store'])->middleware('auth', 'cekAdmin');
Route::get('bidang/tampil/{id_bidang}', [BidangController::class, 'show'])->middleware('auth', 'cekAdmin');
Route::put('bidang/edit/proses/{id_bidang}', [BidangController::class, 'update'])->middleware('auth', 'cekAdmin');
Route::delete('bidang/delete/{id_bidang}', [BidangController::class, 'destroy'])->middleware('auth', 'cekAdmin');

//NOTULENSI
Route::get('/notulensi', [NotulenController::class, 'index'])->name('notulensi')->middleware('auth');
Route::get('/notulensi/create', [NotulenController::class, 'create'])->middleware('auth');
Route::post('/notulensi/create/proses', [NotulenController::class, 'store'])->middleware('auth');
Route::get('notulensi/tampil/{id_notulensi}', [NotulenController::class, 'show'])->middleware('auth');
Route::put('notulensi/edit/proses/{id_notulensi}', [NotulenController::class, 'update'])->middleware('auth');
Route::delete('notulensi/delete/{id_notulensi}', [NotulenController::class, 'destroy'])->middleware('auth');

//HASIL
Route::get('/hasil', [HasilController::class, 'index'])->name('hasil')->middleware('auth');
Route::get('hasil/download/{id_hasil}', [HasilController::class, 'download'])->name('download')->middleware('auth');
