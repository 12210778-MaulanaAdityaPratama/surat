<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluarModel;
use Illuminate\Http\Request;
use App\Models\SuratMasukModel;
use App\Models\PegawaiModel;

class SuratKeluarController extends Controller
{
    public function index() {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        $suratkeluar = SuratKeluarModel::all();
        return view('suratkeluar/suratkeluar', ['suratkeluar' => $suratkeluar],  compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }
    public function tambah() {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        return view('suratkeluar.tambah', compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }

    public function edit($id) {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        // Mengambil data yang ingin diubah berdasarkan ID
        $suratkeluar = SuratKeluarModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$suratkeluar) {
            return redirect('/suratkeluar')->with('error', 'Data tidak ditemukan.');
        }
    
        return view('suratkeluar.edit', ['suratkeluar' => $suratkeluar], compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
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
