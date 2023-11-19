<?php

namespace App\Http\Controllers;

use App\Models\KtpModel;
use Illuminate\Http\Request;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;
use App\Models\PegawaiModel;

class KtpController extends Controller
{
    public function index(Request $request) {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        $ktp = KtpModel::all();
        $query = $request->input('search');
        $ktp = KtpModel::when($query, function ($q) use ($query) {
            return $q->where('nama', 'LIKE', '%' . $query . '%');
            // Tambahkan kolom lain yang ingin Anda cari di sini
        })->get();
        return view('ktp/ktp', ['ktp' => $ktp], compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }
    public function search(Request $request)
{
    // Validasi data yang dikirimkan dari formulir
    $request->validate([
        'keyword' => 'required|string|max:255',
    ]);

    // Lakukan pencarian berdasarkan kata kunci
    $keyword = $request->input('keyword');
    $ktp = KtpModel::where('nama', 'like', '%' . $keyword . '%')
        ->get();

    // Kembalikan hasil pencarian dalam bentuk tampilan parsial
    return view('ktp.search', compact('ktp'));
}
    public function tambah (){
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        return view('ktp.tambah', compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }

    public function edit($id) {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        // Mengambil data yang ingin diubah berdasarkan ID
        $ktp = KtpModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$ktp) {
            return redirect('/ktp')->with('error', 'Data tidak ditemukan.');
        }
    
        return view('ktp.edit', ['ktp' => $ktp], compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
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
