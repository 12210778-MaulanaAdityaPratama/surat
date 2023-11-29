<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PegawaiModel;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;
use App\Models\User;

class ProfileController extends Controller
{
    public function index() {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        return view('profile/profile', compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }
        public function edit($id) {
            $user = User::find($id);
        
            if (!$user) {
                return redirect('/profile')->with('error', 'Data tidak ditemukan.');
            }
        
            $jumlahSuratMasuk = SuratMasukModel::count();
            $jumlahSuratKeluar = SuratKeluarModel::count();
            $jumlahPegawai = PegawaiModel::count();
        
            return view('profile.edit', ['user' => $user], compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
        }
        public function update(Request $request, $id) {
            // Validasi data yang dikirimkan dari formulir
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'nip' => 'required',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
        
            // Mengambil data yang ingin diubah berdasarkan ID
            $user = User::find($id);
        
            // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
            if (!$user) {
                return redirect('/profile')->with('error', 'Data tidak ditemukan.');
            }

            
        
            // Jika ada input password, update password
            if ($request->filled('password')) {
                $validatedData['password'] = bcrypt($request->password);
            }
        
            // Mengunggah dan Menyimpan Foto Baru
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $namaFoto = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('uploads'), $namaFoto);
                $validatedData['foto'] = $namaFoto;
        
                // Hapus foto lama jika ada
                if ($user->foto) {
                    unlink(public_path('uploads/' . $user->foto));
                }
            }
        
            // Memperbarui data dalam database menggunakan data yang telah divalidasi
            $user->update($validatedData);
        
            // Redirect pengguna ke halaman yang sesuai
            return redirect('/profile')->with('success', 'Data berhasil diperbarui.');
        }
        
        
}
