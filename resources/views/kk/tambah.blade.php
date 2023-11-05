@extends('layout')

@section('title', 'Kk')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah Data Kartu Keluarga</h6>
                <form>
                    <div class="mb-3">
                        <label for="no_kk" class="form-label">No KK</label>
                        <input type="number" inputmode="none" class="form-control" id="no_kk">
                    </div>
                    <div class="mb-3">
                        <label for="kepala_keluarga" class="form-label">Kepala Keluarga</label>
                        <input type="text" class="form-control" id="kepala_keluarga">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="rt" class="form-label">RT</label>
                        <input type="text" class="form-control" id="rt">
                    </div>
                    <div class="mb-3">
                        <label for="rw" class="form-label">RW</label>
                        <input type="text" class="form-control" id="rw">
                    </div>
                    <div class="mb-3">
                        <label for="desa" class="form-label">Desa</label>
                        <input type="text" class="form-control" id="desa">
                    </div>
                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan">
                    </div>
                    <div class="mb-3">
                        <label for="kabupaten" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="kabupaten">
                    </div>
                    <div class="mb-3">
                        <label for="kode_pos" class="form-label">Kode Pos</label>
                        <input type="number" inputmode="none" class="form-control" id="kode_pos">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_anggota" class="form-label">Jumlah Anggota</label>
                        <input type="number" inputmode="none" class="form-control" id="jumlah_anggota">
                    </div>
                    <div class="mb-3">
                        <label for="status_kk" class="form-label">Pangkat</label>
                        <select class="form-select" name="status_kk" id="status_kk">
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