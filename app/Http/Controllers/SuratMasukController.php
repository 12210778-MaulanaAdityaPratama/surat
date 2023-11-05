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
    public function simpanData(Request $request)
{
    // Validasi data yang dikirimkan dari formulir
    $validatedData = $request->validate([
        'tanggal_terima' => 'required|date',
        // Tambahkan validasi untuk input lainnya
    ]);

    // Simpan data ke dalam database
    suratmasuk::create($validatedData);

    // Redirect pengguna ke halaman yang sesuai
    return redirect('/suratmasuk')->with('success', 'Data berhasil disimpan.');
}
}
