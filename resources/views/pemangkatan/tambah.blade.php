@extends('layout')

@section('title', 'Pemangkatan')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah Data</h6>
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">Nip</label>
                        <input type="number" inputmode="none" class="form-control" id="nip">
                    </div>
                    <div class="mb-3">
                        <label for="pangkat" class="form-label">Pangkat</label>
                        <select class="form-select" name="pangkat" id="pangkat">
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
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan">
                    </div>
                    <div class="mb-3">
                        <label for="masa_kerja" class="form-label">Masa Kerja</label>
                        <input type="text" class="form-control" id="masa_kerja">
                    </div>
                    <div class="mb-3">
                        <label for="latihan_jabatan" class="form-label">Latihan Jabatan</label>
                        <input type="text" class="form-control" id="latihan_jabatan">
                    </div>
                    <div class="mb-3">
                        <label for="pendidikan" class="form-label">Pendidikan</label>
                        <select class="form-select" name="pendidikan" id="pendidikan">
                            <option value="sd">Sd</option>
                            <option value="smp">Smp</option>
                            <option value="sma/slta">Sma/Slta</option>
                            <option value="d3">D3</option>
                            <option value="s1">S1</option>
                            <option value="s2">S2</option>
                            <option value="s3">S3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir">
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan Mutasi Kepegawaian</label>
                        <input type="date" class="form-control" id="catatan">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>    </div>
</div>


@endsection