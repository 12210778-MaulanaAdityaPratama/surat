<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluarModel;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index() {
        $suratkeluar = SuratKeluarModel::all();
        return view('suratkeluar/suratkeluar', ['suratkeluar' => $suratkeluar]);
    }
    public function tambah() {
        return view('suratkeluar.tambah');
    }
}
