<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluarNotifikasi extends Model
{
    use HasFactory;
    protected $table = 'surat_keluar_notifikasi';
    // field apa saja yang bisa di isi
    protected $fillable = [
        'surat_keluar_id',
        'judul',
        'pesan',
        'tanggal',
        'dibaca'
    ];
    public function suratKeluar()
    {
        return $this->belongsTo(SuratKeluarModel::class, 'surat_keluar_id');
    }

}
