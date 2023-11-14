<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;
use App\Models\PegawaiModel;

class AdminController extends Controller
{
    public function index(){
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
     return view('index', compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }
}
