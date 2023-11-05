<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KkModel extends Model
{
    use HasFactory;
    protected $table = 'kk';
    // field apa saja yang bisa di isi
    public $fillable = ['no_kk', 'kepala_keluarga', 'alamat', 'rt', 'rw', 'desa','kecamatan','kabupaten','provinsi','kode_pos','jumlah_anggota','status_kk','catatan'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
    // aktif
}
