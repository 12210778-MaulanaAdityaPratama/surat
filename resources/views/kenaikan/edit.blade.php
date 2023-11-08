@extends('layout')

@section('title', 'Edit Data Kenaikan')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Data Kenaikan</h6>
                <form action="{{ route('kenaikan.update', $kenaikan->id) }}" method="POST" enctype="multipart/form-kenaikan">
                    @csrf
                    @method('PUT') <!-- Menggunakan metode PUT untuk update kenaikan -->

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $kenaikan->nama }}">
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">Nip</label>
                        <input type="number" class="form-control" inputmode="none" id="nip" name="nip" value="{{ $kenaikan->nip }}">
                    </div>
                    <div class="mb-3">
                        <label for="pangkat" class="form-label">Pangkat</label>
                        <select class="form-select" name="pangkat" id="pangkat" name="pangkat">
                            <option value="Ia" {{ $kenaikan->pangkat == 'Ia' ? 'selected' : '' }}>Ia</option>
                            <option value="Ib" {{ $kenaikan->pangkat == 'Ib' ? 'selected' : '' }}>Ib</option>
                            <option value="Ic" {{ $kenaikan->pangkat == 'Ic' ? 'selected' : '' }}>Ic</option>
                            <option value="Id" {{ $kenaikan->pangkat == 'Id' ? 'selected' : '' }}>Id</option>
                            <option value="IIa" {{ $kenaikan->pangkat == 'IIa' ? 'selected' : '' }}>IIa</option>
                            <option value="IIb" {{ $kenaikan->pangkat == 'IIb' ? 'selected' : '' }}>IIb</option>
                            <option value="IIc" {{ $kenaikan->pangkat == 'IIc' ? 'selected' : '' }}>IIc</option>
                            <option value="IId" {{ $kenaikan->pangkat == 'IId' ? 'selected' : '' }}>IId</option>
                            <option value="IIIa" {{ $kenaikan->pangkat == 'IIIa' ? 'selected' : '' }}>IIIa</option>
                            <option value="IIIb" {{ $kenaikan->pangkat == 'IIIb' ? 'selected' : '' }}>IIIb</option>
                            <option value="IIIc" {{ $kenaikan->pangkat == 'IIIc' ? 'selected' : '' }}>IIIc</option>
                            <option value="IIId" {{ $kenaikan->pangkat == 'IIId' ? 'selected' : '' }}>IIId</option>
                            <option value="IVa" {{ $kenaikan->pangkat == 'IVa' ? 'selected' : '' }}>IVa</option>
                            <option value="IVb" {{ $kenaikan->pangkat == 'IVb' ? 'selected' : '' }}>IVb</option>
                            <option value="IVc" {{ $kenaikan->pangkat == 'IVc' ? 'selected' : '' }}>IVc</option>
                            <option value="IVd" {{ $kenaikan->pangkat == 'IVd' ? 'selected' : '' }}>IVd</option>
                            <option value="IVe" {{ $kenaikan->pangkat == 'IVe' ? 'selected' : '' }}>IVe</option>
                           
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                        <input type="number" class="form-control" inputmode="none" id="gaji_pokok" name="gaji_pokok" value="{{ $kenaikan->gaji_pokok }}">
                    </div>
                    <div class="mb-3">
                        <label for="tmt_golongan" class="form-label">TMT Golongan</label>
                        <input type="date" class="form-control" id="tmt_golongan" name="tmt_golongan" value="{{ $kenaikan->tmt_golongan }}">
                    </div>
                    <div class="mb-3">
                        <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                        <input type="number" class="form-control" inputmode="none" id="gaji_pokok" name="gaji_pokok" value="{{ $kenaikan->gaji_pokok }}">
                    </div>
                    <div class="mb-3">
                        <label for="pangkat_sekarang" class="form-label">Pangkat Sekarang</label>
                        <input type="date" class="form-control" id="pangkat_sekarang" name="pangkat_sekarang" value="{{ $kenaikan->pangkat_sekarang }}">
                    </div>
                    <div class="mb-3">
                        <label for="pangkat_datang" class="form-label">Pangkat Akan Datang</label>
                        <input type="date" class="form-control" id="pangkat_datang" name="pangkat_datang" value="{{ $kenaikan->pangkat_datang }}">
                    </div>
                    <div class="mb-3">
                        <label for="gaji_sekarang" class="form-label">Gaji Sekarang</label>
                        <input type="number" class="form-control" inputmode="none" id="gaji_sekarang" name="gaji_sekarang" value="{{ $kenaikan->gaji_sekarang }}">
                    </div>
                    <div class="mb-3">
                        <label for="gaji_datang" class="form-label">Gaji Akan Datang</label>
                        <input type="number" class="form-control" inputmode="none" id="gaji_datang" name="gaji_datang" value="{{ $kenaikan->gaji_datang }}">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $kenaikan->keterangan }}">
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
