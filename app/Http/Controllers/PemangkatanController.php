<?php

namespace App\Http\Controllers;

use App\Models\PemangkatanModel;
use Illuminate\Http\Request;

class PemangkatanController extends Controller
{
    public function index() {
        $pemangkatan = PemangkatanModel::all();
        return view('pemangkatan/pemangkatan', ['pemangkatan' => $pemangkatan]);
    }
    public function tambah() {
        return view('pemangkatan.tambah');
    }
}
