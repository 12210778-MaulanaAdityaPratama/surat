<?php

namespace App\Http\Controllers;

use App\Models\NotifikasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;
use App\Models\PegawaiModel;
use App\Events\SuratMasukEvent;

class SuratMasukController extends Controller
{
    public function index() {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        $suratmasuk = SuratMasukModel::all();
        return view('suratmasuk/suratmasuk', ['suratmasuk' => $suratmasuk], compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }
    public function tambah() {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        return view('suratmasuk.tambah', compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }

    public function edit($id) {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        // Mengambil data yang ingin diubah berdasarkan ID
        $suratmasuk = SuratMasukModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$suratmasuk) {
            return redirect('/suratmasuk')->with('error', 'Data tidak ditemukan.');
        }
    
        return view('suratmasuk.edit', ['suratmasuk' => $suratmasuk], compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }
    
    public function update(Request $request, $id) {
        // Validasi data yang dikirimkan dari formulir
        $validatedData = $request->validate([
            'tanggal_terima' => 'required|date',
            'asal_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'no_surat' => 'required',
            'perihal' => 'required',
            'keterangan' => 'required',
        ]);
    
        // Mengambil data yang ingin diubah berdasarkan ID
        $suratmasuk = SuratMasukModel::find($id);
    
        // Jika data tidak ditemukan, Anda bisa menangani kasus ini sesuai kebutuhan
        if (!$suratmasuk) {
            return redirect('/suratmasuk')->with('error', 'Data tidak ditemukan.');
        }
    
        // Memperbarui data dalam database menggunakan data yang telah divalidasi
        $suratmasuk->update($validatedData);
    
        // Redirect pengguna ke halaman yang sesuai
        return redirect('/suratmasuk')->with('success', 'Data berhasil diperbarui.');
    }
    public function store(Request $request)
{
    // Validasi data yang dikirimkan dari formulir
    $validatedData = $request->validate([
        'tanggal_terima' => 'required|date',
        'asal_surat' => 'required',
        'tanggal_surat' => 'required|date',
        'no_surat' => 'required',
        'perihal' => 'required',
        'keterangan' => 'required',
    ]);

    // Simpan data ke dalam database menggunakan Eloquent Model
    $suratmasuk = SuratMasukModel::create($validatedData);
    // Buat notifikasi terkait
    $notifikasi = new NotifikasiModel([
        'surat_masuk_id' => $suratmasuk->id,
        'judul' => 'Surat Masuk Baru',
        'pesan' => 'Anda menerima surat baru dengan nomor ' . $suratmasuk->no_surat,
        'tanggal' => now(),
    ]);

    $notifikasi->save();
    event(new SuratMasukEvent($suratmasuk));

    // Redirect pengguna ke halaman yang sesuai
    return redirect('/suratmasuk')->with('success', 'Data berhasil disimpan.');
}
public function destroy($id) {
    // Cari data yang ingin dihapus berdasarkan ID
    $suratmasuk = SuratMasukModel::find($id);

    if (!$suratmasuk) {
        return redirect('/suratmasuk')->with('error', 'Data tidak ditemukan.');
    }

    // Hapus data
    $suratmasuk->delete();

    return redirect('/suratmasuk')->with('success', 'Data berhasil dihapus.');
}
}