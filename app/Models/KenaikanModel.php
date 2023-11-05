<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KenaikanModel extends Model
{
    use HasFactory;
    protected $table = 'kenaikan';
    // field apa saja yang bisa di isi
    public $fillable = ['nama', 'nip', 'pangkat', 'tmt_golongan', 'gaji_pokok', 'pangkat_sekarang','pangkat_datang','gaji_sekarang','gaji_datang','keterangan'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
    // aktif
    public $timestamps = true;
}
