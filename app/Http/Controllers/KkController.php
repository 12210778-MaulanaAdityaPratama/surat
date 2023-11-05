<?php

namespace App\Http\Controllers;

use App\Models\KkModel;
use Illuminate\Http\Request;

class KkController extends Controller
{
    public function index() {
        $kk = KkModel::all();
        return view('kk/kk', ['kk' => $kk]);
    }
    public function tambah() {
        return view('kk.tambah');
    }
}
