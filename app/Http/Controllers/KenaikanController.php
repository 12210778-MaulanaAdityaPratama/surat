<?php

namespace App\Http\Controllers;

use App\Models\KenaikanModel;
use Illuminate\Http\Request;

class KenaikanController extends Controller
{
    public function index() {
        $kenaikan = KenaikanModel::all();
        return view('kenaikan/kenaikan', ['kenaikan' => $kenaikan]);
    }
    public function tambah() {
        return view('kenaikan.tambah');
    }
}
