<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SuratMasukModel;

class SuratMasukController extends Controller
{
    public function index() {
        $suratmasuk = SuratMasukModel::all();
        return view('suratmasuk/suratmasuk', ['suratmasuk' => $suratmasuk]);
    }
    public function tambah() {
        return view('suratmasuk.tambah');
    }
    public function store(Request $request)
{
    // Validasi data yang dikirimkan dari formulir
    $validatedData = $request->validate([
        'tanggal_terima' => 'required|date',
        'asal_surat' => 'required',
        'tanggal_surat' => 'required|date',
        'no_surat' => 'required',
        'perihal' => 'required',
        'keterangan' => 'required',
    ]);

    // Simpan data ke dalam database menggunakan Eloquent Model
    SuratMasukModel::create($validatedData);

    // Redirect pengguna ke halaman yang sesuai
    return redirect('/suratmasuk')->with('success', 'Data berhasil disimpan.');
}
}