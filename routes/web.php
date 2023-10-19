<?php

use Illuminate\Support\Facades\Route;

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
Route::get('admin', function(){
    return view('index');
});
route::get('suratmasuk', function () {
   return view('suratmasuk'); 
});
route::get('suratkeluar', function () {
    return view('suratkeluar'); 
 });
 route::get('kenaikan', function () {
    return view('kenaikan'); 
 });
 route::get('pemangkatan', function () {
    return view('pemangkatan'); 
 });
 route::get('kk', function () {
   return view('kk'); 
});
route::get('ktp', function () {
   return view('ktp'); 
});
route::get('pegawai', function () {
   return view('pegawai'); 
});
