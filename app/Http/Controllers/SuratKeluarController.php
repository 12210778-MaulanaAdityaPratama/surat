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

    public function edit($id) {
        // Mengambil data yang ingin diubah berdasarkan ID
        $suratkeluar = SuratKeluarModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$suratkeluar) {
            return redirect('/suratkeluar')->with('error', 'Data tidak ditemukan.');
        }
    
        return view('suratkeluar.edit', ['suratkeluar' => $suratkeluar]);
    }
    
    public function update(Request $request, $id) {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'pengelola' => 'required',
            'perihal' => 'required',
            'tanggal_surat' => 'required|date',
            'no_surat' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required'
        ]);
    
        // Mengambil data yang ingin diubah berdasarkan ID
        $suratkeluar = SuratKeluarModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$suratkeluar) {
            return redirect('/suratkeluar')->with('error', 'Data tidak ditemukan.');
        }
    
        // Memperbarui data dalam database menggunakan data yang telah divalidasi
        $suratkeluar->update($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/suratkeluar')->with('success', 'Data berhasil diperbarui.');
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
    public function destroy($id) {
        // Cari data yang ingin dihapus berdasarkan ID
        $suratkeluar = SuratKeluarModel::find($id);
    
        if (!$suratkeluar) {
            return redirect('/suratkeluar')->with('error', 'Data tidak ditemukan.');
        }
    
        // Hapus data
        $suratkeluar->delete();
    
        return redirect('/suratkeluar')->with('success', 'Data berhasil dihapus.');
    }
}
