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
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'divisi' => 'required',
            'jabatan' => 'required'
        ]);
    
        // Simpan data ke dalam database menggunakan Eloquent Model
        PegawaiModel::create($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/pegawai')->with('success', 'Data berhasil disimpan.');
    }
}
