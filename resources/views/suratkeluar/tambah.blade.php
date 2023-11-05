@extends('layout')

@section('title', 'Surat Keluar')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah Data Surat Keluar</h6>
                <form>
                    <div class="mb-3">
                        <label for="pengelola" class="form-label">Pengelola</label>
                        <input type="text" class="form-control" id="pengelola">
                    </div>
                    <div class="mb-3">
                        <label for="perihal" class="form-label">Perihal</label>
                        <input type="text" class="form-control" id="perihal">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                        <input type="date" class="form-control" id="tanggal_surat">
                    </div>
                    <div class="mb-3">
                        <label for="no_surat" class="form-label">No Surat</label>
                        <input type="text" class="form-control" id="no_surat">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data Surat Keluar</button>
                </form>
            </div>
        </div>    </div>
</div>


@endsection