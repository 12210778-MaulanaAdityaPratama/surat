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
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'no_ktp' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            'tgl_pendaftaran' => 'required|date',
            'status_pengambilan' => 'required',
            'catatan' => 'required',
        ]);
    
        // Simpan data ke dalam database menggunakan Eloquent Model
        KtpModel::create($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/ktp')->with('success', 'Data berhasil disimpan.');
    }
}
