<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemangkatanController extends Controller
{
    public function index () {
        return view('pemangkatan');
    }
}
