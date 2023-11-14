<?php

namespace App\Http\Controllers;

use App\Models\PegawaiModel;
use Illuminate\Http\Request;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;

class PegawaiController extends Controller
{
    public function index() {
        $pegawai = PegawaiModel::all();
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        return view('pegawai/pegawai', ['pegawai' => $pegawai], compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }
    public function tambah() {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        return view('pegawai.tambah', compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }

    public function edit($id) {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        // Mengambil data yang ingin diubah berdasarkan ID
        $pegawai = PegawaiModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$pegawai) {
            return redirect('/pegawai')->with('error', 'Data tidak ditemukan.');
        }
    
        return view('pegawai.edit', ['pegawai' => $pegawai], compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
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
