@extends('layout')

@section('title', 'Kenaikan')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah Data</h6>
                <form action="{{ route('kenaikan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">Nip</label>
                        <input type="number" class="form-control" inputmode="none" id="nip" name="nip">
                    </div>
                    <div class="mb-3">
                        <label for="pangkat" class="form-label">Pangkat</label>
                        <select class="form-select" name="pangkat" id="pangkat" name="pangkat">
                            <option value="Ia">Ia</option>
                            <option value="Ib">Ib</option>
                            <option value="Ic">Ic</option>
                            <option value="Id">Id</option>
                            <option value="IIa">IIa</option>
                            <option value="IIb">IIb</option>
                            <option value="IIc">IIc</option>
                            <option value="IId">IId</option>
                            <option value="IIIa">IIIa</option>
                            <option value="IIIb">IIIb</option>
                            <option value="IIIc">IIIc</option>
                            <option value="IIId">IIId</option>
                            <option value="IVa">IVa</option>
                            <option value="IVb">IVb</option>
                            <option value="IVc">IVc</option>
                            <option value="IVd">IVd</option>
                            <option value="IVde">IVe</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                        <input type="number" class="form-control" inputmode="none" id="gaji_pokok" name="gaji_pokok">
                    </div>
                    <div class="mb-3">
                        <label for="tmt_golongan" class="form-label">TMT Golongan</label>
                        <input type="date" class="form-control" id="tmt_golongan" name="tmt_golongan">
                    </div>
                    <div class="mb-3">
                        <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                        <input type="number" class="form-control" inputmode="none" id="gaji_pokok" name="gaji_pokok">
                    </div>
                    <div class="mb-3">
                        <label for="pangkat_sekarang" class="form-label">Pangkat Sekarang</label>
                        <input type="date" class="form-control" id="pangkat_sekarang" name="pangkat_sekarang">
                    </div>
                    <div class="mb-3">
                        <label for="pangkat_datang" class="form-label">Pangkat Akan Datang</label>
                        <input type="date" class="form-control" id="pangkat_datang" name="pangkat_datang">
                    </div>
                    <div class="mb-3">
                        <label for="gaji_sekarang" class="form-label">Gaji Sekarang</label>
                        <input type="number" class="form-control" inputmode="none" id="gaji_sekarang" name="gaji_sekarang">
                    </div>
                    <div class="mb-3">
                        <label for="gaji_datang" class="form-label">Gaji Akan Datang</label>
                        <input type="number" class="form-control" inputmode="none" id="gaji_datang" name="gaji_datang">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data </button>
                </form>
            </div>
        </div>    </div>
</div>


@endsection