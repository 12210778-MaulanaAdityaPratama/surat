@extends('layout')

@section('title', 'Ktp')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah Data Kartu Tanda Penduduk</h6>
                <form>
                    <div class="mb-3">
                        <label for="no_ktp" class="form-label">No KTP</label>
                        <input type="number" inputmode="none" class="form-control" id="no_ktp">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <select class="form-select" name="agama" id="agama">
                            <option value="islam">Islam</option>
                            <option value="katholik">Katholik</option>                            
                            <option value="protestan">Protestan</option>                            
                            <option value="hindu">Hindu</option>                            
                            <option value="buddha">Buddha</option>                            
                            <option value="konghucu">Konghucu</option>                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                        <select class="form-select" name="status_perkawinan" id="status_perkawinan">
                            <option value="kawin">Kawin</option>
                            <option value="belum kawin">Belum Kawin</option>                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan">
                    </div>
                    <div class="mb-3">
                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                        <select class="form-select" name="kewarganegaraan" id="kewarganegaraan">
                            <option value="indonesia">Indonesia</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pendaftaran" class="form-label">Tanggal Pendaftaran</label>
                        <input type="date" class="form-control" id="tgl_pendaftaran">
                    </div>
                    <div class="mb-3">
                        <label for="status_pengambilan" class="form-label">Status Pengambilan</label>
                        <select class="form-select" name="status_pengambilan" id="status_pengambilan">
                            <option value="diambil">Diambil</option>
                            <option value="belum diambil">Belum Diambil</option>
                            <option value="proses">Proses</option>
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <input type="text" class="form-control" id="catatan">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>    </div>
</div>


@endsection