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
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
            'masa_kerja' => 'required',
            'latihan_jabatan' => 'required',
            'pendidikan' => 'required',
            'tanggal_lahir' => 'required|date',
            'catatan' => 'required',
            'keterangan' => 'required',
        ]);
    
        // Simpan data ke dalam database menggunakan Eloquent Model
        PemangkatanModel::create($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/pemangkatan')->with('success', 'Data berhasil disimpan.');
    }
}
