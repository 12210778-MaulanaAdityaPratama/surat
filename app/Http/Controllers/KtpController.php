<?php

namespace App\Http\Controllers;

use App\Models\KtpModel;
use Illuminate\Http\Request;

class KtpController extends Controller
{
    public function index() {
        $ktp = KtpModel::all();
        return view('ktp/ktp', ['ktp' => $ktp]);
    }
    public function tambah (){
        return view('ktp.tambah');
    }
}
