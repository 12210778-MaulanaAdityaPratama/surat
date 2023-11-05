<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemangkatanModel extends Model
{
    use HasFactory;
    protected $table = 'pemangkatan';
    // field apa saja yang bisa di isi
    public $fillable = ['nama', 'nip', 'pangkat', 'jabatan', 'masa_kerja', 'latihan_jabatan','pendidikan','tanggal_lahir','catatan','keterangan'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
    // aktif
    public $timestamps = true;
}
