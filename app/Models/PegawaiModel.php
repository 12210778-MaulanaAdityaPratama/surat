<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    // field apa saja yang bisa di isi
    public $fillable = ['nama', 'nip', 'jenis_kelamin', 'alamat', 'divisi', 'jabatan','foto'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
    // aktif
    public $timestamps = true;
}
