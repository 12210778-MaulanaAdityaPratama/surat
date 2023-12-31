<?php

namespace App\Http\Controllers;

use App\Models\PemangkatanModel;
use Illuminate\Http\Request;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;
use App\Models\PegawaiModel;

class PemangkatanController extends Controller
{
    public function index(Request $request) {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        $query = $request->input('search');
        $pemangkatan = PemangkatanModel::when($query, function ($q) use ($query) {
            return $q->where('nama', 'LIKE', '%' . $query . '%')
                     ->orWhere('nip', 'LIKE', '%' . $query . '%');
            // Tambahkan kolom lain yang ingin Anda cari di sini
        })->paginate(5);
        return view('pemangkatan/pemangkatan', ['pemangkatan' => $pemangkatan], compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }
    public function search(Request $request)
{
    // Validasi data yang dikirimkan dari formulir
    $request->validate([
        'keyword' => 'required|string|max:255',
    ]);

    // Lakukan pencarian berdasarkan kata kunci
    $keyword = $request->input('keyword');
    $pemangkatan = PemangkatanModel::where('nama', 'like', '%' . $keyword . '%')
        ->orWhere('nip', 'like', '%' . $keyword . '%')
        ->get();

    // Kembalikan hasil pencarian dalam bentuk tampilan parsial
    return view('pemangkatan.search', compact('pemangkatan'));
}
    public function tambah() {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        return view('pemangkatan.tambah', compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }

    public function edit($id) {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        // Mengambil data yang ingin diubah berdasarkan ID
        $pemangkatan = PemangkatanModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$pemangkatan) {
            return redirect('/pemangkatan')->with('error', 'Data tidak ditemukan.');
        }
    
        return view('pemangkatan.edit', ['pemangkatan' => $pemangkatan], compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
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
