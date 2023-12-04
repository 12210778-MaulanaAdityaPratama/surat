<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Controllers\ForgetController;
use App\Http\Controllers\LoginController;

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
    return view('login');
});

Route::get('/admin', 'App\Http\Controllers\AdminController@index')->middleware('LoginMiddleware');

// Route::get('suratmasuk', function () {
//    $suratmasuk = App\Models\SuratMasukModel::all();
//    return view('suratmasuk/suratmasuk', ['suratmasuk' => $suratmasuk]);
// });

Route::get('/suratmasuk', 'App\Http\Controllers\SuratMasukController@index')->middleware('LoginMiddleware');
Route::get('/suratmasuk/tambah', 'App\Http\Controllers\SuratMasukController@tambah')->name('suratmasuk.tambah_data')->middleware('LoginMiddleware');
Route::post('/suratmasuk/store', 'App\Http\Controllers\SuratMasukController@store')->name('suratmasuk.store')->middleware('LoginMiddleware');
Route::get('/suratmasuk/{id}/edit', 'App\Http\Controllers\SuratMasukController@edit')->name('suratmasuk.edit')->middleware('LoginMiddleware');
Route::put('/suratmasuk/{id}/update', 'App\Http\Controllers\SuratMasukController@update')->name('suratmasuk.update')->middleware('LoginMiddleware');
Route::delete('/suratmasuk/{id}/delete', 'App\Http\Controllers\SuratMasukController@destroy')->name('suratmasuk.delete')->middleware('LoginMiddleware');
// Route::get('/suratmasuk/search', 'App\Http\Controllers\SuratMasukController@search')->name('suratmasuk.search');


Route::get('/suratkeluar', 'App\Http\Controllers\SuratKeluarController@index')->middleware('LoginMiddleware');
Route::get('/suratkeluar/tambah', 'App\Http\Controllers\SuratKeluarController@tambah')->name('suratkeluar.tambah_data')->middleware('LoginMiddleware');
Route::post('/suratkeluar/store', 'App\Http\Controllers\SuratKeluarController@store')->name('suratkeluar.store')->middleware('LoginMiddleware');
Route::get('/suratkeluar/{id}/edit', 'App\Http\Controllers\SuratKeluarController@edit')->name('suratkeluar.edit')->middleware('LoginMiddleware');
Route::put('/suratkeluar/{id}/update', 'App\Http\Controllers\SuratKeluarController@update')->name('suratkeluar.update')->middleware('LoginMiddleware');
Route::delete('/suratkeluar/{id}/delete', 'App\Http\Controllers\SuratKeluarController@destroy')->name('suratkeluar.delete')->middleware('LoginMiddleware');



Route::get('/kenaikan', 'App\Http\Controllers\KenaikanController@index')->middleware('LoginMiddleware');
Route::get('/kenaikan/tambah', 'App\Http\Controllers\KenaikanController@tambah')->name('kenaikan.tambah_data')->middleware('LoginMiddleware');
Route::post('/kenaikan/store', 'App\Http\Controllers\KenaikanController@store')->name('kenaikan.store')->middleware('LoginMiddleware');
Route::get('/kenaikan/{id}/edit', 'App\Http\Controllers\KenaikanController@edit')->name('kenaikan.edit')->middleware('LoginMiddleware');
Route::put('/kenaikan/{id}/update', 'App\Http\Controllers\KenaikanController@update')->name('kenaikan.update')->middleware('LoginMiddleware');
Route::delete('/kenaikan/{id}/delete', 'App\Http\Controllers\KenaikanController@destroy')->name('kenaikan.delete')->middleware('LoginMiddleware');


Route::get('/pemangkatan', 'App\Http\Controllers\PemangkatanController@index')->middleware('LoginMiddleware');
Route::get('/pemangkatan/tambah', 'App\Http\Controllers\PemangkatanController@tambah')->name('pemangkatan.tambah_data')->middleware('LoginMiddleware');
Route::post('/pemangkatan/store', 'App\Http\Controllers\PemangkatanController@store')->name('pemangkatan.store')->middleware('LoginMiddleware');
Route::get('/pemangkatan/{id}/edit', 'App\Http\Controllers\PemangkatanController@edit')->name('pemangkatan.edit')->middleware('LoginMiddleware');
Route::put('/pemangkatan/{id}/update', 'App\Http\Controllers\PemangkatanController@update')->name('pemangkatan.update')->middleware('LoginMiddleware');
Route::delete('/pemangkatan/{id}/delete', 'App\Http\Controllers\PemangkatanController@destroy')->name('pemangkatan.delete')->middleware('LoginMiddleware');



Route::get('/kk', 'App\Http\Controllers\KkController@index')->middleware('LoginMiddleware');
Route::get('/kk/tambah', 'App\Http\Controllers\KkController@tambah')->name('kk.tambah_data')->middleware('LoginMiddleware');
Route::post('/kk/store', 'App\Http\Controllers\KkController@store')->name('kk.store')->middleware('LoginMiddleware');
Route::get('/kk/{id}/edit', 'App\Http\Controllers\KkController@edit')->name('kk.edit')->middleware('LoginMiddleware');
Route::put('/kk/{id}/update', 'App\Http\Controllers\KkController@update')->name('kk.update')->middleware('LoginMiddleware');
Route::delete('/kk/{id}/delete', 'App\Http\Controllers\KkController@destroy')->name('kk.delete')->middleware('LoginMiddleware');



Route::get('/ktp', 'App\Http\Controllers\KtpController@index')->middleware('LoginMiddleware');
Route::get('/ktp/tambah', 'App\Http\Controllers\KtpController@tambah')->name('ktp.tambah_data')->middleware('LoginMiddleware');
Route::post('/ktp/store', 'App\Http\Controllers\KtpController@store')->name('ktp.store')->middleware('LoginMiddleware');
Route::get('/ktp/{id}/edit', 'App\Http\Controllers\KtpController@edit')->name('ktp.edit')->middleware('LoginMiddleware');
Route::put('/ktp/{id}/update', 'App\Http\Controllers\KtpController@update')->name('ktp.update')->middleware('LoginMiddleware');
Route::delete('/ktp/{id}/delete', 'App\Http\Controllers\KtpController@destroy')->name('ktp.delete')->middleware('LoginMiddleware');



Route::get('/pegawai', 'App\Http\Controllers\PegawaiController@index')->middleware('LoginMiddleware');
Route::get('/pegawai/tambah', 'App\Http\Controllers\PegawaiController@tambah')->name('pegawai.tambah_data')->middleware('LoginMiddleware');
Route::post('/pegawai/store', 'App\Http\Controllers\PegawaiController@store')->name('pegawai.store')->middleware('LoginMiddleware');
Route::get('/pegawai/{id}/edit', 'App\Http\Controllers\PegawaiController@edit')->name('pegawai.edit')->middleware('LoginMiddleware');
Route::put('/pegawai/{id}/update', 'App\Http\Controllers\PegawaiController@update')->name('pegawai.update')->middleware('LoginMiddleware');
Route::delete('/pegawai/{id}/delete', 'App\Http\Controllers\PegawaiController@destroy')->name('pegawai.delete')->middleware('LoginMiddleware');

Route::get('/layout', 'App\Http\Controllers\LayoutController@index')->middleware('LoginMiddleware');
// Route::post('/mark-notification-as-read/{notificationId}', 'App\Http\Controllers\LayoutController@markNotificationAsRead');
Route::get('/check-notifications', 'App\Http\Controllers\LayoutController@checkNotifications')->middleware('LoginMiddleware');

Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile')->middleware('LoginMiddleware');
Route::get('/profile/{id}/edit', 'App\Http\Controllers\ProfileController@edit')->name('profile.edit')->middleware('LoginMiddleware');
Route::put('/profile/{id}/update', 'App\Http\Controllers\ProfileController@update')->name('profile.update')->middleware('LoginMiddleware');



