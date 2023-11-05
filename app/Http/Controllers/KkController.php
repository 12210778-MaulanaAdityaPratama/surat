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
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'no_kk' => 'required',
            'kepala_keluarga' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'jumlah_anggota' => 'required',
            'status_kk' => 'required',
            'catatan' => 'required',
        ]);
        // Simpan data ke dalam database menggunakan Eloquent Model
        KkModel::create($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/kk')->with('success', 'Data berhasil disimpan.');
    }
}
