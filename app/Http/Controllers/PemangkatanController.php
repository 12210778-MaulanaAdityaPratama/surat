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

    public function edit($id) {
        // Mengambil data yang ingin diubah berdasarkan ID
        $pemangkatan = PemangkatanModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$pemangkatan) {
            return redirect('/pemangkatan')->with('error', 'Data tidak ditemukan.');
        }
    
        return view('pemangkatan.edit', ['pemangkatan' => $pemangkatan]);
    }
    
    public function update(Request $request, $id) {
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
    
        // Mengambil data yang ingin diubah berdasarkan ID
        $pemangkatan = PemangkatanModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$pemangkatan) {
            return redirect('/pemangkatan')->with('error', 'Data tidak ditemukan.');
        }
    
        // Memperbarui data dalam database menggunakan data yang telah divalidasi
        $pemangkatan->update($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/pemangkatan')->with('success', 'Data berhasil diperbarui.');
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
    public function destroy($id) {
        // Cari data yang ingin dihapus berdasarkan ID
        $pemangkatan = PemangkatanModel::find($id);
    
        if (!$pemangkatan) {
            return redirect('/pemangkatan')->with('error', 'Data tidak ditemukan.');
        }
    
        // Hapus data
        $pemangkatan->delete();
    
        return redirect('/pemangkatan')->with('success', 'Data berhasil dihapus.');
    }
}
