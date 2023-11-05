<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluarModel extends Model
{
    use HasFactory;
    protected $table = 'surat_keluar';
    // field apa saja yang bisa di isi
    public $fillable = ['pengelola', 'perihal', 'tanggal_surat', 'no_surat', 'alamat', 'keterangan'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
    // aktif
    public $timestamps = true;
}
