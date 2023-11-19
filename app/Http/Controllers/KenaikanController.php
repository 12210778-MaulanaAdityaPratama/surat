<?php

namespace App\Http\Controllers;

use App\Models\KenaikanModel;
use Illuminate\Http\Request;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;
use App\Models\PegawaiModel;

class KenaikanController extends Controller
{
    public function index( Request $request) {
        $kenaikan = KenaikanModel::all();
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        $query = $request->input('search');
        $kenaikan = KenaikanModel::when($query, function ($q) use ($query) {
            return $q->where('nama', 'LIKE', '%' . $query . '%')
                     ->orWhere('nip', 'LIKE', '%' . $query . '%');
            // Tambahkan kolom lain yang ingin Anda cari di sini
        })->get();
        return view('kenaikan/kenaikan', ['kenaikan' => $kenaikan], compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }
    public function search(Request $request)
{
    // Validasi data yang dikirimkan dari formulir
    $request->validate([
        'keyword' => 'required|string|max:255',
    ]);

    // Lakukan pencarian berdasarkan kata kunci
    $keyword = $request->input('keyword');
    $suratkeluar = SuratKeluarModel::where('nama', 'like', '%' . $keyword . '%')
        ->orWhere('nip', 'like', '%' . $keyword . '%')
        ->get();

    // Kembalikan hasil pencarian dalam bentuk tampilan parsial
    return view('kenaikan.search', compact('kenaikan'));
}
    public function tambah() {
        $kenaikan = KenaikanModel::all();
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        return view('kenaikan.tambah', compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }
    public function edit($id) {
        $kenaikan = KenaikanModel::all();
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        // Mengambil data yang ingin diubah berdasarkan ID
        $kenaikan = KenaikanModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$kenaikan) {
            return redirect('/kenaikan')->with('error', 'Data tidak ditemukan.');
        }
    
        return view('kenaikan.edit', ['kenaikan' => $kenaikan], compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }
    
    public function update(Request $request, $id) {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'pangkat' => 'required',
            'tmt_golongan' => 'required|date',
            'gaji_pokok' => 'required',
            'pangkat_sekarang' => 'required|date',
            'pangkat_datang' => 'required|date',
            'gaji_sekarang' => 'required',
            'gaji_datang' => 'required',
            'keterangan' => 'required',
        ]);
    
        // Mengambil data yang ingin diubah berdasarkan ID
        $kenaikan = KenaikanModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$kenaikan) {
            return redirect('/kenaikan')->with('error', 'Data tidak ditemukan.');
        }
    
        // Memperbarui data dalam database menggunakan data yang telah divalidasi
        $kenaikan->update($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/kenaikan')->with('success', 'Data berhasil diperbarui.');
    }

    
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'pangkat' => 'required',
            'tmt_golongan' => 'required|date',
            'gaji_pokok' => 'required',
            'pangkat_sekarang' => 'required|date',
            'pangkat_datang' => 'required|date',
            'gaji_sekarang' => 'required',
            'gaji_datang' => 'required',
            'keterangan' => 'required',
        ]);
    
        // Simpan data ke dalam database menggunakan Eloquent Model
        KenaikanModel::create($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/kenaikan')->with('success', 'Data berhasil disimpan.');
    }
    public function destroy($id) {
        // Cari data yang ingin dihapus berdasarkan ID
        $kenaikan = KenaikanModel::find($id);
    
        if (!$kenaikan) {
            return redirect('/kenaikan')->with('error', 'Data tidak ditemukan.');
        }
    
        // Hapus data
        $kenaikan->delete();
    
        return redirect('/kenaikan')->with('success', 'Data berhasil dihapus.');
    }
}
