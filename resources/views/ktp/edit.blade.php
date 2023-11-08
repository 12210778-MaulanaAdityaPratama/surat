@extends('layout')

@section('title', 'Edit Data KTP')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Data Kartu Tanda Penduduk</h6>
                <form action="{{ route('ktp.update', $ktp->id) }}" method="POST" enctype="multipart/form-kenaikan">
                    @csrf
                    @method('PUT') 
                    <div class="mb-3">
                        <label for="no_ktp" class="form-label">No KTP</label>
                        <input type="number" inputmode="none" class="form-control" id="no_ktp" name="no_ktp" value="{{$ktp->no_ktp}}">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$ktp->nama}}">
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{$ktp->tempat_lahir}}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{$ktp->tanggal_lahir}}">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="Laki-Laki" {{ $ktp->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ $ktp->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{$ktp->alamat}}">
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <select class="form-select" name="agama" id="agama" name="agama">
                            <option value="Islam" {{ $ktp->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Katholik" {{ $ktp->agama == 'Katholik' ? 'selected' : '' }}>Katholik</option>                            
                            <option value="Protestan" {{ $ktp->agama == 'Protestan' ? 'selected' : '' }}>Protestan</option>                            
                            <option value="Hindu" {{ $ktp->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>                            
                            <option value="Buddha" {{ $ktp->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>                            
                            <option value="Konghucu" {{ $ktp->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                        <select class="form-select" name="status_perkawinan" id="status_perkawinan" name="status_perkawinan">
                            <option value="Kawin" {{ $ktp->status_perkawinan == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                            <option value="Belum Kawin" {{ $ktp->status_perkawinan == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{$ktp->pekerjaan}}">
                    </div>
                    <div class="mb-3">
                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                        <select class="form-select" name="kewarganegaraan" id="kewarganegaraan" name="kewarganegaraan" va>
                            <option value="indonesia" {{$ktp->kewarganegaraan == 'indonesia' ? 'selected' : ''}}>Indonesia</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pendaftaran" class="form-label">Tanggal Pendaftaran</label>
                        <input type="date" class="form-control" id="tgl_pendaftaran" name="tgl_pendaftaran" value="{{$ktp->tgl_pendaftaran}}">
                    </div>
                    <div class="mb-3">
                        <label for="status_pengambilan" class="form-label">Status Pengambilan</label>
                        <select class="form-select" name="status_pengambilan" id="status_pengambilan" name="status_pengambilan">
                            <option value="Diambil" {{$ktp->status_pengambilan == 'Diambil' ? 'selected' : ''}}>Diambil</option>
                            <option value="Belum Diambil"  {{$ktp->status_pengambilan == 'Belum Diambil' ? 'selected' : ''}}>Belum Diambil</option>
                            <option value="Proses"  {{$ktp->status_pengambilan == 'Proses' ? 'selected' : ''}}>Proses</option>
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <input type="text" class="form-control" id="catatan" name="catatan" value="{{$ktp->catatan}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>    </div>
</div>


@endsection