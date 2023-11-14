<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SuratMasukModel;
use App\Models\SuratKeluarModel;
use App\Models\PegawaiModel;
use App\Models\NotifikasiModel;

class LayoutController extends Controller
{
    public function index() {
        $jumlahSuratMasuk = SuratMasukModel::count();
        $jumlahSuratKeluar = SuratKeluarModel::count();
        $jumlahPegawai = PegawaiModel::count();

        return view('layout', compact('jumlahSuratMasuk', 'jumlahSuratKeluar', 'jumlahPegawai'));
    }
    public function checkNotifications()
    {
        $newNotifications = NotifikasiModel::where('read', false)->count();

        return response()->json(['newNotifications' => $newNotifications]);
    }
}
