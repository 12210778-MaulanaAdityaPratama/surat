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
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'pangkat' => 'required',
            'tmt_golongan' => 'required|date',
            'gaji_pokok' => 'required',
            'pangkat_sekarang' => 'required|date',
            'pangkat_datang' => 'required|date',
            'gaji_sekarang' => 'required',
            'gaji_datang' => 'required',
            'keterangan' => 'required',
        ]);
    
        // Simpan data ke dalam database menggunakan Eloquent Model
        KenaikanModel::create($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/kenaikan')->with('success', 'Data berhasil disimpan.');
    }
}
