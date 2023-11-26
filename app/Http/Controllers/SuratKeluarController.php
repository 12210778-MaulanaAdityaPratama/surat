<?php

namespace App\Http\Controllers;

use App\Events\SuratKeluarEvent;
use App\Models\SuratKeluarModel;
use Illuminate\Http\Request;
use App\Models\SuratMasukModel;
use App\Models\PegawaiModel;
use App\Models\SuratKeluarNotifikasi;
use Carbon\Carbon;


class SuratKeluarController extends Controller
{
    public function index( Request $request) {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        $suratkeluar = SuratKeluarModel::all();
        $query = $request->input('search');
        $suratkeluar = SuratKeluarModel::when($query, function ($q) use ($query) {
            return $q->where('pengelola', 'LIKE', '%' . $query . '%')
                     ->orWhere('no_surat', 'LIKE', '%' . $query . '%');
            // Tambahkan kolom lain yang ingin Anda cari di sini
        })->get();
        return view('suratkeluar/suratkeluar', ['suratkeluar' => $suratkeluar],  compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }
    public function search(Request $request)
{
    // Validasi data yang dikirimkan dari formulir
    $request->validate([
        'keyword' => 'required|string|max:255',
    ]);

    // Lakukan pencarian berdasarkan kata kunci
    $keyword = $request->input('keyword');
    $suratkeluar = SuratKeluarModel::where('pengelola', 'like', '%' . $keyword . '%')
        ->orWhere('no_surat', 'like', '%' . $keyword . '%')
        ->get();

    // Kembalikan hasil pencarian dalam bentuk tampilan parsial
    return view('suratkeluar.search', compact('suratkeluar'));
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
         // Simpan nomor surat sebelum diubah
         $nomorSuratSebelum = $suratkeluar->no_surat;
         $tanggalSebelum = $suratkeluar->tanggal_surat;

          // Memperbarui data dalam database menggunakan data yang telah divalidasi
        $suratkeluar->update($validatedData);
        // Simpan nomor surat setelah diubah
        $nomorSuratSesudah = $suratkeluar->no_surat;
        $tanggalSuratSesudah = $suratkeluar->tanggal_surat;
         // Jika nomor surat berubah, update juga notifikasi yang terkait
    if ($nomorSuratSebelum !== $nomorSuratSesudah) {
        $tanggal = Carbon::parse($suratkeluar->tanggal_surat)->format('d-m-Y');

        // Cari notifikasi terkait berdasarkan surat masuk ID
        $notifikasi = SuratKeluarNotifikasi::where('surat_keluar_id', $id)->first();

        if ($notifikasi) {
            // Perbarui pesan notifikasi
            $notifikasi->update([
                'pesan' => 'Anda telah mengeluarkan surat dengan nomor ' . $suratkeluar->no_surat . ' ' . 'pada tanggal surat ' . $tanggal,
            ]);
        }
    }
    if ($tanggalSebelum !== $tanggalSuratSesudah) {
        $tanggal = Carbon::parse($suratkeluar->tanggal_surat)->format('d-m-Y');

        // Cari notifikasi terkait berdasarkan surat masuk ID
        $notifikasi = SuratKeluarNotifikasi::where('surat_keluar_id', $id)->first();

        if ($notifikasi) {
            // Perbarui pesan notifikasi
            $notifikasi->update([
                'pesan' => 'Anda telah mengeluarkan surat dengan nomor ' . $suratkeluar->no_surat . ' ' . 'pada tanggal surat ' . $tanggal,
            ]);
        }
    }
        
      
    
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
        $suratkeluar = SuratKeluarModel::create($validatedData);
        $tanggal = Carbon::parse($suratkeluar->tanggal_surat)->format('d-m-Y');
    // Buat notifikasi terkait
    $notifikasi = new SuratKeluarNotifikasi([
        'surat_keluar_id' => $suratkeluar->id,
        'judul' => 'Surat Keluar Baru',
        'pesan' => 'Anda telah mengeluarkan surat dengan nomor ' . $suratkeluar->no_surat . ' '  .'pada tanggal surat '. $tanggal,
        'tanggal' => now(),
    ]);
        $notifikasi->save();
        event(new SuratKeluarEvent($suratkeluar));
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
