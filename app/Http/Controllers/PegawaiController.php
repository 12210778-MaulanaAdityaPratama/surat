<?php

namespace App\Http\Controllers;

use App\Models\PegawaiModel;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index() {
        $pegawai = PegawaiModel::all();
        return view('pegawai/pegawai', ['pegawai' => $pegawai]);
    }
    public function tambah() {
        return view('pegawai.tambah');
    }
}
