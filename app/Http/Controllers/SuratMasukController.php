<?php

namespace App\Http\Controllers;

use App\Models\NotifikasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;
use App\Models\PegawaiModel;
use App\Events\SuratMasukEvent;
use Carbon\Carbon;

class SuratMasukController extends Controller
{
    public function index(Request $request) {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        $query = $request->input('search');
        $suratmasuk = SuratMasukModel::when($query, function ($q) use ($query) {
            return $q->where('no_surat', 'LIKE', '%' . $query . '%')
                     ->orWhere('asal_surat', 'LIKE', '%' . $query . '%');
            // Tambahkan kolom lain yang ingin Anda cari di sini
        })->paginate(5);
        return view('suratmasuk/suratmasuk', ['suratmasuk' => $suratmasuk], compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }
    public function search(Request $request)
{
    // Validasi data yang dikirimkan dari formulir
    $request->validate([
        'keyword' => 'required|string|max:255',
    ]);

    // Lakukan pencarian berdasarkan kata kunci
    $keyword = $request->input('keyword');
    $suratmasuk = SuratMasukModel::where('asal_surat', 'like', '%' . $keyword . '%')
        ->orWhere('no_surat', 'like', '%' . $keyword . '%')
        ->get();

    // Kembalikan hasil pencarian dalam bentuk tampilan parsial
    return view('suratmasuk.search', compact('suratmasuk'));
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

         // Simpan nomor surat sebelum diubah
        $nomorSuratSebelum = $suratmasuk->no_surat;
        $tanggalSebelum = $suratmasuk->tanggal_surat;

    
        // Memperbarui data dalam database menggunakan data yang telah divalidasi
        $suratmasuk->update($validatedData);
        // Simpan nomor surat setelah diubah
        $nomorSuratSesudah = $suratmasuk->no_surat;
        $tanggalSuratSesudah = $suratmasuk->tanggal_surat;
         // Jika nomor surat berubah, update juga notifikasi yang terkait
    if ($nomorSuratSebelum !== $nomorSuratSesudah) {
        $tanggal = Carbon::parse($suratmasuk->tanggal_surat)->format('d-m-Y');

        // Cari notifikasi terkait berdasarkan surat masuk ID
        $notifikasi = NotifikasiModel::where('surat_masuk_id', $id)->first();

        if ($notifikasi) {
            // Perbarui pesan notifikasi
            $notifikasi->update([
                'pesan' => 'Anda menerima surat baru dengan nomor ' . $suratmasuk->no_surat . ' ' . 'pada tanggal surat ' . $tanggal,
            ]);
        }
    }
    if ($tanggalSebelum !== $tanggalSuratSesudah) {
        $tanggal = Carbon::parse($suratmasuk->tanggal_surat)->format('d-m-Y');

        // Cari notifikasi terkait berdasarkan surat masuk ID
        $notifikasi = NotifikasiModel::where('surat_masuk_id', $id)->first();

        if ($notifikasi) {
            // Perbarui pesan notifikasi
            $notifikasi->update([
                'pesan' => 'Anda menerima surat baru dengan nomor ' . $suratmasuk->no_surat . ' ' . 'pada tanggal surat ' . $tanggal,
            ]);
        }
    }

    
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
    $tanggal = Carbon::parse($suratmasuk->tanggal_surat)->format('d-m-Y');
    // Buat notifikasi terkait
    $notifikasi = new NotifikasiModel([
        'surat_masuk_id' => $suratmasuk->id,
        'judul' => 'Surat Masuk Baru',
        'pesan' => 'Anda menerima surat baru dengan nomor ' . $suratmasuk->no_surat . ' '  .'pada tanggal surat '. $tanggal,
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