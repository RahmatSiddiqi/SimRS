<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Routing\RouteGroup;

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
});

Auth::routes();




Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

    Route::get('/pemeriksaan-pasien', [App\Http\Controllers\PemeriksaanController::class, 'index'])->name('pemeriksaan')->middleware('auth');
    Route::post('/pemeriksaan-pasienAdd', [App\Http\Controllers\PemeriksaanController::class, 'store'])->name('pemeriksaan-add')->middleware('auth');
    Route::post('/pemeriksaan-pasienEdit', [App\Http\Controllers\PemeriksaanController::class, 'update'])->name('pemeriksaan-edit')->middleware('auth');
    Route::get('/pemeriksaan-pasiendelete/{no_rawat}', [App\Http\Controllers\PemeriksaanController::class, 'delete'])->name('pemeriksaan-delete{no_rawat}')->middleware('auth');
});

Route::group(['middleware' => 'is_admin'], function () {
    Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

    Route::get('admin/pemeriksaan-pasien', [App\Http\Controllers\PemeriksaanController::class, 'adminPemeriksaan'])->name('admin.pemeriksaan')->middleware('is_admin');

    Route::get('/pasien', [App\Http\Controllers\PasienController::class, 'index'])->name('pasien')->middleware('auth');
    Route::post('/pasien-add', [App\Http\Controllers\PasienController::class, 'store'])->name('pasien-add')->middleware('auth');
    Route::post('/pasien-edit', [App\Http\Controllers\PasienController::class, 'update'])->name('pasien-edit')->middleware('auth');
    Route::get('/pasien-delete/{no_rm}', [App\Http\Controllers\PasienController::class, 'delete'])->name('pasien-delete')->middleware('auth');

    Route::get('/poli', [App\Http\Controllers\PoliController::class, 'index'])->name('poli')->middleware('auth');
    Route::post('/poli-add', [App\Http\Controllers\PoliController::class, 'store'])->name('poli-add')->middleware('auth');
    Route::post('/poli-edit', [App\Http\Controllers\PoliController::class, 'update'])->name('poli-edit')->middleware('auth');
    Route::get('/poli-delete/{id_poli}', [App\Http\Controllers\PoliController::class, 'delete'])->name('poli-delete')->middleware('auth');

    Route::get('/registrasi-pasien', [App\Http\Controllers\RegistrasiController::class, 'index'])->name('registrasi')->middleware('auth');
    Route::get('/registrasi-pasiensee', [App\Http\Controllers\RegistrasiController::class, 'see'])->name('registrasisee')->middleware('auth');
    Route::post('/registrasi-pasienadd', [App\Http\Controllers\RegistrasiController::class, 'store'])->name('registrasi-add')->middleware('auth');
    Route::post('/registrasi-edit', [App\Http\Controllers\RegistrasiController::class, 'update'])->name('registrasi-edit')->middleware('auth');
    Route::get('/registrasi-delete/{no_rm}', [App\Http\Controllers\RegistrasiController::class, 'delete'])->name('registrasi-delete')->middleware('auth');


    Route::get('/dokter', [App\Http\Controllers\DokterController::class, 'index'])->name('dokter')->middleware('auth');
    Route::post('/dokter-add', [App\Http\Controllers\DokterController::class, 'store'])->name('dokter-add')->middleware('auth');
    Route::post('/dokter-addAkun', [App\Http\Controllers\DokterController::class, 'storeakun'])->name('dokter-addAkun')->middleware('auth');
    Route::post('/dokter-edit', [App\Http\Controllers\DokterController::class, 'update'])->name('dokter-edit')->middleware('auth');
    Route::get('/dokter-delete/{kd_dokter}', [App\Http\Controllers\DokterController::class, 'delete'])->name('dokter-delete')->middleware('auth');
});
