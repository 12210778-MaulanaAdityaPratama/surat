<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KtpModel extends Model
{
    use HasFactory;
    protected $table = 'ktp';
    // field apa saja yang bisa di isi
    public $fillable = ['no_ktp', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat','agama','status_perkawinan','pekerjaan','kewarganegaraan','tgl_pendaftaran','status_pengambilan','catatan'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
    // aktif
}
