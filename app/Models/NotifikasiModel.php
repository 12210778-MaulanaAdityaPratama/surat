<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifikasiModel extends Model
{
    use HasFactory;
    protected $table = 'notifikasi';
    // field apa saja yang bisa di isi
    protected $fillable = [
        'surat_masuk_id',
        'judul',
        'pesan',
        'tanggal',
    ];
    public function suratMasuk()
    {
        return $this->belongsTo(SuratMasukModel::class, 'surat_masuk_id');
    }

}
