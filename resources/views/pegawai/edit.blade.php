@extends('layout')

@section('title', 'Tambah pegawai')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Data Pegawai</h6>
                <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" enctype="multipart/form-kenaikan">
                @csrf
                @method('PUT')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$pegawai->nama}}">
                     </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">Nip</label>
                        <input type="number" inputmode="none" class="form-control" id="nip" name="nip" value="{{$pegawai->nip}}">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="Laki-Laki" {{ $pegawai->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ $pegawai->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{$pegawai->alamat}}">
                    </div>
                    <div class="mb-3">
                        <label for="divisi" class="form-label">Divisi</label>
                        <input type="text" class="form-control" id="divisi" name="divisi" value="{{$pegawai->divisi}}">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{$pegawai->jabatan}}">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="text" class="form-control" id="foto" name="foto" value="{{$pegawai->foto}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data Pegawai</button>
                </form>
            </div>
        </div>    </div>
</div>


@endsection