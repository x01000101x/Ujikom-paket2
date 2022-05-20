<?php

use App\Http\Controllers\AnyController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\ResepsiController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\TransferController;
use Illuminate\Support\Facades\Route;

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

// Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('landing');

Route::get('/abc', function () {
    return view('dashboard');
})->name('abc')->middleware('auth');

//Dashboard jetstream
// Route::get('/ssc', function () {
//     return view('dashboard-bak');
// })->name('ssc');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Cek tanggal
Route::post('pesan', [BookController::class, 'show'])->name('pesan');
// Route::get('pesan1', [BookController::class, 'show'])->name('pesan1');
Route::post('apply', [ApplyController::class, 'add'])->name('apply');

Route::get('resepsi', [ResepsiController::class, 'show'])->name('resepsi')->middleware('auth');

Route::post('logout', [AnyController::class, 'logout'])->name('logout')->middleware('auth');

//PDF Downloads
Route::get('unduh',  [PdfController::class, 'download'])->name('download')->middleware('auth');
Route::get('report',  [PdfController::class, 'download_log'])->name('download2')->middleware('auth');


Route::get('fasilitas', [FasilitasController::class, 'index'])->name('fasilitas');

Route::get('kamar', [KamarController::class, 'index'])->name('kamar');

Route::get('check/{idku}', [ResepsiController::class, 'check_payment'])->name('check_pembayaran');

// Route::get('transfer', [ApplyController::class, 'ipaymu'])->name('transfer');

Route::middleware(['auth', 'role:resepsionis'])->group(function () {
    Route::get('resepsionis', [ResepsiController::class, 'resepsionisFunc'])->name('resepsionis')->middleware('auth');
    Route::get('resepsionis2', [ResepsiController::class, 'searchDate'])->name('resepsionis2')->middleware('auth');
    Route::post('resepsiAksi', [ResepsiController::class, 'Aksi'])->name('resepsiAksi')->middleware('auth');
    Route::post('resepsiDelete', [ResepsiController::class, 'Delete'])->name('resepsiDelete')->middleware('auth');
    // Route::get('showResepsi', [ResepsiController::class, 'showreservasi'])->name('resepsishow')->middleware('auth');

    // Route::get('search', [ResepsiController::class, 'Search'])->name('search')->middleware('auth');
});



// Route::group(['middleware' => ['resepsionis']], function () {
//     Route::get('resepsionis', [ResepsiController::class, 'resepsionis'])->name('resepsionis.view');
// });

// Route::get('/', [AnyController::class, 'getData'])->name('getData')->middleware('auth');
//Apply
// Route::post('apply', [UserProfileController::class, 'show'])->name('apply');
