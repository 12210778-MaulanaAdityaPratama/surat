<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; // Pastikan trait Notifiable di-import

class SuratMasukModel extends Model
{
    use HasFactory;
    use Notifiable; // Pastikan trait Notifiable digunakan
    protected $table = 'surat_masuk';
    // field apa saja yang bisa di isi
    public $fillable = ['tanggal_terima', 'asal_surat', 'tanggal_surat', 'no_surat', 'perihal', 'keterangan'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
    // aktif
    public $timestamps = true;
}
