<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;
use App\Models\PegawaiModel;
use App\Models\NotifikasiModel;
use App\Models\SuratKeluarNotifikasi;

class LayoutController extends Controller
{
    public function index() {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();
        $notifications = NotifikasiModel::latest()->take(5)->get(); // Ganti variabel ini menjadi notifications

        return view('layout', compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai','notifications'));
    }
    public function checkNotifications()
    {
        // $newNotifications = NotifikasiModel::where('read', false)->count();

        // return response()->json(['newNotifications' => $newNotifications]);
        // Menghitung notifikasi baru untuk SuratMasukModel
        $newSuratMasukNotifications = NotifikasiModel::where('dibaca', false)
            ->where('notifiable_type', SuratMasukModel::class)
            ->count();

        // Menghitung notifikasi baru untuk SuratKeluarNotifikasi
        $newSuratKeluarNotifications = NotifikasiModel::where('dibaca', false)
            ->where('notifiable_type', SuratKeluarNotifikasi::class)
            ->count();
            // Menjumlahkan total notifikasi baru dari kedua model
        $totalNewNotifications = $newSuratMasukNotifications + $newSuratKeluarNotifications;

        return response()->json(['newNotifications' => $totalNewNotifications]);
    }
}
