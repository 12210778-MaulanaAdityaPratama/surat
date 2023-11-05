<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', 'App\Http\Controllers\AdminController@index');

// Route::get('suratmasuk', function () {
//    $suratmasuk = App\Models\SuratMasukModel::all();
//    return view('suratmasuk/suratmasuk', ['suratmasuk' => $suratmasuk]);
// });

Route::get('/suratmasuk', 'App\Http\Controllers\SuratMasukController@index');
Route::get('/suratmasuk/tambah', 'App\Http\Controllers\SuratMasukController@tambah')->name('suratmasuk.tambah_data');
Route::post('/suratmasuk/store', 'App\Http\Controllers\SuratMasukController@store')->name('suratmasuk.store');

Route::get('/suratkeluar', 'App\Http\Controllers\SuratKeluarController@index');
Route::get('/suratkeluar/tambah', 'App\Http\Controllers\SuratKeluarController@tambah')->name('suratkeluar.tambah_data');
Route::post('/suratkeluar/store', 'App\Http\Controllers\SuratKeluarController@store')->name('suratkeluar.store');


Route::get('/kenaikan', 'App\Http\Controllers\KenaikanController@index');
Route::get('/kenaikan/tambah', 'App\Http\Controllers\KenaikanController@tambah')->name('kenaikan.tambah_data');
Route::post('/kenaikan/store', 'App\Http\Controllers\KenaikanController@store')->name('kenaikan.store');


Route::get('/pemangkatan', 'App\Http\Controllers\PemangkatanController@index');
Route::get('/pemangkatan/tambah', 'App\Http\Controllers\PemangkatanController@tambah')->name('pemangkatan.tambah_data');
Route::post('/pemangkatan/store', 'App\Http\Controllers\PemangkatanController@store')->name('pemangkatan.store');


Route::get('/kk', 'App\Http\Controllers\KkController@index');
Route::get('/kk/tambah', 'App\Http\Controllers\KkController@tambah')->name('kk.tambah_data');
Route::post('/kk/store', 'App\Http\Controllers\KkController@store')->name('kk.store');


Route::get('/ktp', 'App\Http\Controllers\KtpController@index');
Route::get('/ktp/tambah', 'App\Http\Controllers\KtpController@tambah')->name('ktp.tambah_data');
Route::post('/ktp/store', 'App\Http\Controllers\KtpController@store')->name('ktp.store');


Route::get('/pegawai', 'App\Http\Controllers\PegawaiController@index');
Route::get('/pegawai/tambah', 'App\Http\Controllers\PegawaiController@tambah')->name('pegawai.tambah_data');
Route::post('/pegawai/store', 'App\Http\Controllers\PegawaiController@store')->name('pegawai.store');



