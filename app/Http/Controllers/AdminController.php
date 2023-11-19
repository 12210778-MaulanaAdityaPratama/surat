<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;
use App\Models\PegawaiModel;

class AdminController extends Controller
{
    public function index(Request $request){
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        $namapegawai = PegawaiModel::pluck('nama');
        $nippegawai = PegawaiModel::pluck('nip');
        $divisi = PegawaiModel::pluck('divisi');
        $jabatan = PegawaiModel::pluck('jabatan');
        $foto = PegawaiModel::pluck('foto');
    
        return view('index', compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai','namapegawai','nippegawai','divisi','jabatan','foto'));
    }
}
