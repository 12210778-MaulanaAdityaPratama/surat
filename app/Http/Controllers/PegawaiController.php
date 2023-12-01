<?php

namespace App\Http\Controllers;

use App\Models\PegawaiModel;
use Illuminate\Http\Request;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;

class PegawaiController extends Controller
{
    public function index(Request $request) {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        $query = $request->input('search');
        $pegawai = PegawaiModel::when($query, function ($q) use ($query) {
            return $q->where('nama', 'LIKE', '%' . $query . '%')
                     ->orWhere('nip', 'LIKE', '%' . $query . '%');
            // Tambahkan kolom lain yang ingin Anda cari di sini
        })->paginate(5);
        // Melewatkan data ke AdminController
    // Mengambil data nama
        return view('pegawai/pegawai', ['pegawai' => $pegawai], compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }
    public function search(Request $request)
    {
        // Validasi data yang dikirimkan dari formulir
        $request->validate([
            'keyword' => 'required|string|max:255',
        ]);
    
        // Lakukan pencarian berdasarkan kata kunci
        $keyword = $request->input('keyword');
        $pegawai = PegawaiModel::where('nama', 'like', '%' . $keyword . '%')
            ->orWhere('nip', 'like', '%' . $keyword . '%')
            ->get();
    
        // Kembalikan hasil pencarian dalam bentuk tampilan parsial
        return view('pegawai.search', compact('pegawai'));
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
            'nip' => 'nullable',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'divisi' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Mengambil data yang ingin diubah berdasarkan ID
        $pegawai = PegawaiModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$pegawai) {
            return redirect('/pegawai')->with('error', 'Data tidak ditemukan.');
        }
        // Mengunggah dan Menyimpan Foto Baru
       if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $namaFoto = time() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('uploads'), $namaFoto);
        $validatedData['foto'] = $namaFoto;

        // Hapus foto lama jika ada
        if ($pegawai->foto) {
            unlink(public_path('uploads/' . $pegawai->foto));
        }
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
            'nip' => 'nullable',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'divisi' => 'required',
            'jabatan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
         // Mengunggah dan Menyimpan Foto
    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $namaFoto = time() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('uploads'), $namaFoto);
        $validatedData['foto'] = $namaFoto;
    }
    
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
