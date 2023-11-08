@extends('layout')

@section('title', 'Edit Surat Masuk')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Edit Data Surat</h6>
                <form action="{{ route('suratmasuk.update', $suratmasuk->id) }}" method="POST" enctype="multipart/form-suratmasuk">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="tanggal_terima" class="form-label">Tanggal Terima</label>
                        <input type="date" class="form-control" id="tanggal_terima" name="tanggal_terima" value="{{$suratmasuk->tanggal_terima}}">
                    </div>
                    <div class="mb-3">
                        <label for="asal_surat" class="form-label">Asal Surat</label>
                        <input type="text" class="form-control" id="asal_surat" name="asal_surat" value="{{$suratmasuk->asal_surat}}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                        <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" value="{{$suratmasuk->tanggal_surat}}">
                    </div>
                    <div class="mb-3">
                        <label for="no_surat" class="form-label">Nomor Surat</label>
                        <input type="text" class="form-control" id="no_surat" name="no_surat" value="{{$suratmasuk->no_surat}}">
                    </div>
                    <div class="mb-3">
                        <label for="perihal" class="form-label">Perihal</label>
                        <input type="text" class="form-control" id="perihal" name="perihal" value="{{$suratmasuk->perihal}}">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{$suratmasuk->keterangan}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data Surat</button>
                </form>
            </div>
        </div>    </div>
</div>


@endsection