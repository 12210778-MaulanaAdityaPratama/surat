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
    public function edit($id) {
        // Mengambil data yang ingin diubah berdasarkan ID
        $kk = KkModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$kk) {
            return redirect('/kk')->with('error', 'Data tidak ditemukan.');
        }
    
        return view('kk.edit', ['kk' => $kk]);
    }
    
    public function update(Request $request, $id) {
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
    
        // Mengambil data yang ingin diubah berdasarkan ID
        $kk = KkModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$kk) {
            return redirect('/kk')->with('error', 'Data tidak ditemukan.');
        }
    
        // Memperbarui data dalam database menggunakan data yang telah divalidasi
        $kk->update($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/kk')->with('success', 'Data berhasil diperbarui.');
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
    public function destroy($id) {
        // Cari data yang ingin dihapus berdasarkan ID
        $kk = KkModel::find($id);
    
        if (!$kk) {
            return redirect('/kk')->with('error', 'Data tidak ditemukan.');
        }
    
        // Hapus data
        $kk->delete();
    
        return redirect('/kk')->with('success', 'Data berhasil dihapus.');
    }
}
