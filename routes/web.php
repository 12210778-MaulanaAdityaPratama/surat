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
Route::get('/suratmasuk/{id}/edit', 'App\Http\Controllers\SuratMasukController@edit')->name('suratmasuk.edit');
Route::put('/suratmasuk/{id}/update', 'App\Http\Controllers\SuratMasukController@update')->name('suratmasuk.update');
Route::delete('/suratmasuk/{id}/delete', 'App\Http\Controllers\SuratMasukController@destroy')->name('suratmasuk.delete');


Route::get('/suratkeluar', 'App\Http\Controllers\SuratKeluarController@index');
Route::get('/suratkeluar/tambah', 'App\Http\Controllers\SuratKeluarController@tambah')->name('suratkeluar.tambah_data');
Route::post('/suratkeluar/store', 'App\Http\Controllers\SuratKeluarController@store')->name('suratkeluar.store');
Route::get('/suratkeluar/{id}/edit', 'App\Http\Controllers\SuratKeluarController@edit')->name('suratkeluar.edit');
Route::put('/suratkeluar/{id}/update', 'App\Http\Controllers\SuratKeluarController@update')->name('suratkeluar.update');
Route::delete('/suratkeluar/{id}/delete', 'App\Http\Controllers\SuratKeluarController@destroy')->name('suratkeluar.delete');



Route::get('/kenaikan', 'App\Http\Controllers\KenaikanController@index');
Route::get('/kenaikan/tambah', 'App\Http\Controllers\KenaikanController@tambah')->name('kenaikan.tambah_data');
Route::post('/kenaikan/store', 'App\Http\Controllers\KenaikanController@store')->name('kenaikan.store');
Route::get('/kenaikan/{id}/edit', 'App\Http\Controllers\KenaikanController@edit')->name('kenaikan.edit');
Route::put('/kenaikan/{id}/update', 'App\Http\Controllers\KenaikanController@update')->name('kenaikan.update');
Route::delete('/kenaikan/{id}/delete', 'App\Http\Controllers\KenaikanController@destroy')->name('kenaikan.delete');


Route::get('/pemangkatan', 'App\Http\Controllers\PemangkatanController@index');
Route::get('/pemangkatan/tambah', 'App\Http\Controllers\PemangkatanController@tambah')->name('pemangkatan.tambah_data');
Route::post('/pemangkatan/store', 'App\Http\Controllers\PemangkatanController@store')->name('pemangkatan.store');
Route::get('/pemangkatan/{id}/edit', 'App\Http\Controllers\PemangkatanController@edit')->name('pemangkatan.edit');
Route::put('/pemangkatan/{id}/update', 'App\Http\Controllers\PemangkatanController@update')->name('pemangkatan.update');
Route::delete('/pemangkatan/{id}/delete', 'App\Http\Controllers\PemangkatanController@destroy')->name('pemangkatan.delete');



Route::get('/kk', 'App\Http\Controllers\KkController@index');
Route::get('/kk/tambah', 'App\Http\Controllers\KkController@tambah')->name('kk.tambah_data');
Route::post('/kk/store', 'App\Http\Controllers\KkController@store')->name('kk.store');
Route::get('/kk/{id}/edit', 'App\Http\Controllers\KkController@edit')->name('kk.edit');
Route::put('/kk/{id}/update', 'App\Http\Controllers\KkController@update')->name('kk.update');
Route::delete('/kk/{id}/delete', 'App\Http\Controllers\KkController@destroy')->name('kk.delete');



Route::get('/ktp', 'App\Http\Controllers\KtpController@index');
Route::get('/ktp/tambah', 'App\Http\Controllers\KtpController@tambah')->name('ktp.tambah_data');
Route::post('/ktp/store', 'App\Http\Controllers\KtpController@store')->name('ktp.store');
Route::get('/ktp/{id}/edit', 'App\Http\Controllers\KtpController@edit')->name('ktp.edit');
Route::put('/ktp/{id}/update', 'App\Http\Controllers\KtpController@update')->name('ktp.update');
Route::delete('/ktp/{id}/delete', 'App\Http\Controllers\KtpController@destroy')->name('ktp.delete');



Route::get('/pegawai', 'App\Http\Controllers\PegawaiController@index');
Route::get('/pegawai/tambah', 'App\Http\Controllers\PegawaiController@tambah')->name('pegawai.tambah_data');
Route::post('/pegawai/store', 'App\Http\Controllers\PegawaiController@store')->name('pegawai.store');
Route::get('/pegawai/{id}/edit', 'App\Http\Controllers\PegawaiController@edit')->name('pegawai.edit');
Route::put('/pegawai/{id}/update', 'App\Http\Controllers\PegawaiController@update')->name('pegawai.update');
Route::delete('/pegawai/{id}/delete', 'App\Http\Controllers\PegawaiController@destroy')->name('pegawai.delete');




