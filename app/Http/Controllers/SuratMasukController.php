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

    public function edit($id) {
        // Mengambil data yang ingin diubah berdasarkan ID
        $suratmasuk = SuratMasukModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$suratmasuk) {
            return redirect('/suratmasuk')->with('error', 'Data tidak ditemukan.');
        }
    
        return view('suratmasuk.edit', ['suratmasuk' => $suratmasuk]);
    }
    
    public function update(Request $request, $id) {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'tanggal_terima' => 'required|date',
            'asal_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'no_surat' => 'required',
            'perihal' => 'required',
            'keterangan' => 'required',
        ]);
    
        // Mengambil data yang ingin diubah berdasarkan ID
        $suratmasuk = SuratMasukModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$suratmasuk) {
            return redirect('/suratmasuk')->with('error', 'Data tidak ditemukan.');
        }
    
        // Memperbarui data dalam database menggunakan data yang telah divalidasi
        $suratmasuk->update($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/suratmasuk')->with('success', 'Data berhasil diperbarui.');
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
public function destroy($id) {
    // Cari data yang ingin dihapus berdasarkan ID
    $suratmasuk = SuratMasukModel::find($id);

    if (!$suratmasuk) {
        return redirect('/suratmasuk')->with('error', 'Data tidak ditemukan.');
    }

    // Hapus data
    $suratmasuk->delete();

    return redirect('/suratmasuk')->with('success', 'Data berhasil dihapus.');
}
}