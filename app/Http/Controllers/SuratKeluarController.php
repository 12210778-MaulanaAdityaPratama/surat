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
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'pengelola' => 'required',
            'perihal' => 'required',
            'tanggal_surat' => 'required|date',
            'no_surat' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required'
        ]);
    
        // Simpan data ke dalam database menggunakan Eloquent Model
        SuratKeluarModel::create($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/suratkeluar')->with('success', 'Data berhasil disimpan.');
    }
}
