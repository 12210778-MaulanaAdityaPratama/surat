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

    public function edit($id) {
        // Mengambil data yang ingin diubah berdasarkan ID
        $ktp = KtpModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$ktp) {
            return redirect('/ktp')->with('error', 'Data tidak ditemukan.');
        }
    
        return view('ktp.edit', ['ktp' => $ktp]);
    }
    
    public function update(Request $request, $id) {
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
            'catatan' => 'required'
        ]);
    
        // Mengambil data yang ingin diubah berdasarkan ID
        $ktp = KtpModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$ktp) {
            return redirect('/ktp')->with('error', 'Data tidak ditemukan.');
        }
    
        // Memperbarui data dalam database menggunakan data yang telah divalidasi
        $ktp->update($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/ktp')->with('success', 'Data berhasil diperbarui.');
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
            'catatan' => 'required'
        ]);
    
        // Simpan data ke dalam database menggunakan Eloquent Model
        KtpModel::create($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/ktp')->with('success', 'Data berhasil disimpan.');
    }
    public function destroy($id) {
        // Cari data yang ingin dihapus berdasarkan ID
        $ktp = KtpModel::find($id);
    
        if (!$ktp) {
            return redirect('/ktp')->with('error', 'Data tidak ditemukan.');
        }
    
        // Hapus data
        $ktp->delete();
    
        return redirect('/ktp')->with('success', 'Data berhasil dihapus.');
    }
}
