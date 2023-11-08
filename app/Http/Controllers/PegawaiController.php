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

    public function edit($id) {
        // Mengambil data yang ingin diubah berdasarkan ID
        $pegawai = PegawaiModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$pegawai) {
            return redirect('/pegawai')->with('error', 'Data tidak ditemukan.');
        }
    
        return view('pegawai.edit', ['pegawai' => $pegawai]);
    }
    
    public function update(Request $request, $id) {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'divisi' => 'required',
            'jabatan' => 'required',
            'foto' => 'required'
        ]);
    
        // Mengambil data yang ingin diubah berdasarkan ID
        $pegawai = PegawaiModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$pegawai) {
            return redirect('/pegawai')->with('error', 'Data tidak ditemukan.');
        }
    
        // Memperbarui data dalam database menggunakan data yang telah divalidasi
        $pegawai->update($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/pegawai')->with('success', 'Data berhasil diperbarui.');
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
            'jabatan' => 'required',
            'foto' => 'required'
        ]);
    
        // Simpan data ke dalam database menggunakan Eloquent Model
        PegawaiModel::create($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/pegawai')->with('success', 'Data berhasil disimpan.');
    }
    public function destroy($id) {
        // Cari data yang ingin dihapus berdasarkan ID
        $pegawai = PegawaiModel::find($id);
    
        if (!$pegawai) {
            return redirect('/pegawai')->with('error', 'Data tidak ditemukan.');
        }
    
        // Hapus data
        $pegawai->delete();
    
        return redirect('/pegawai')->with('success', 'Data berhasil dihapus.');
    }
}
