@extends('layout')

@section('title', 'Edit Pemangkatan')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Data</h6>
                <form action="{{ route('pemangkatan.update', $pemangkatan->id) }}" method="POST" enctype="multipart/form-pemangkatan">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$pemangkatan->nama}}">
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">Nip</label>
                        <input type="number" inputmode="none" class="form-control" id="nip" name="nip" value="{{$pemangkatan->nip}}">
                    </div>
                    <div class="mb-3">
                        <label for="pangkat" class="form-label">Pangkat</label>
                        <select class="form-select" name="pangkat" id="pangkat" name="pangkat">
                            <option value="Ia" {{ $pemangkatan->pangkat == 'Ia' ? 'selected' : '' }}>Ia</option>
                            <option value="Ib" {{ $pemangkatan->pangkat == 'Ib' ? 'selected' : '' }}>Ib</option>
                            <option value="Ic" {{ $pemangkatan->pangkat == 'Ic' ? 'selected' : '' }}>Ic</option>
                            <option value="Id" {{ $pemangkatan->pangkat == 'Id' ? 'selected' : '' }}>Id</option>
                            <option value="IIa" {{ $pemangkatan->pangkat == 'IIa' ? 'selected' : '' }}>IIa</option>
                            <option value="IIb" {{ $pemangkatan->pangkat == 'IIb' ? 'selected' : '' }}>IIb</option>
                            <option value="IIc" {{ $pemangkatan->pangkat == 'IIc' ? 'selected' : '' }}>IIc</option>
                            <option value="IId" {{ $pemangkatan->pangkat == 'IId' ? 'selected' : '' }}>IId</option>
                            <option value="IIIa" {{ $pemangkatan->pangkat == 'IIIa' ? 'selected' : '' }}>IIIa</option>
                            <option value="IIIb" {{ $pemangkatan->pangkat == 'IIIb' ? 'selected' : '' }}>IIIb</option>
                            <option value="IIIc" {{ $pemangkatan->pangkat == 'IIIc' ? 'selected' : '' }}>IIIc</option>
                            <option value="IIId" {{ $pemangkatan->pangkat == 'IIId' ? 'selected' : '' }}>IIId</option>
                            <option value="IVa" {{ $pemangkatan->pangkat == 'IVa' ? 'selected' : '' }}>IVa</option>
                            <option value="IVb" {{ $pemangkatan->pangkat == 'IVb' ? 'selected' : '' }}>IVb</option>
                            <option value="IVc" {{ $pemangkatan->pangkat == 'IVc' ? 'selected' : '' }}>IVc</option>
                            <option value="IVd" {{ $pemangkatan->pangkat == 'IVd' ? 'selected' : '' }}>IVd</option>
                            <option value="IVe" {{ $pemangkatan->pangkat == 'IVe' ? 'selected' : '' }}>IVe</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{$pemangkatan->jabatan}}">
                    </div>
                    <div class="mb-3">
                        <label for="masa_kerja" class="form-label">Masa Kerja</label>
                        <input type="number" inputmode="none" class="form-control" id="masa_kerja" name="masa_kerja" value="{{$pemangkatan->masa_kerja}}">
                    </div>
                    <div class="mb-3">
                        <label for="latihan_jabatan" class="form-label">Latihan Jabatan</label>
                        <input type="text" class="form-control" id="latihan_jabatan" name="latihan_jabatan" value="{{$pemangkatan->latihan_jabatan}}">
                    </div>
                    <div class="mb-3">
                        <label for="pendidikan" class="form-label">Pendidikan</label>
                        <select class="form-select" name="pendidikan" id="pendidikan" name="pendidikan">
                            <option value="SD" {{ $pemangkatan->pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                            <option value="SMP" {{ $pemangkatan->pendidikan == 'SMP' ? 'selected' : '' }}>SMP</option>
                            <option value="SMA/SLTA" {{ $pemangkatan->pendidikan == 'SMA/SLTA' ? 'selected' : '' }}>SMA/SLTA</option>
                            <option value="D#" {{ $pemangkatan->pendidikan == 'D3' ? 'selected' : '' }}>D#</option>
                            <option value="S1" {{ $pemangkatan->pendidikan == 'S1' ? 'selected' : '' }}>S1</option>
                            <option value="S2" {{ $pemangkatan->pendidikan == 'S2' ? 'selected' : '' }}>S2</option>
                            <option value="S3" {{ $pemangkatan->pendidikan == 'S3' ? 'selected' : '' }}>S3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{$pemangkatan->tanggal_lahir}}">
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan Mutasi Kepegawaian</label>
                        <input type="date" class="form-control" id="catatan" name="catatan" value="{{$pemangkatan->catatan}}">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{$pemangkatan->keterangan}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>    </div>
</div>


@endsection