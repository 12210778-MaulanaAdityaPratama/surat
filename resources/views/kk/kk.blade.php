@extends('layout')

@section('title', 'KK')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <a href="{{ route('kk.tambah_data') }}" class="btn btn-primary">Tambah Data</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">No KK</th>
                        <th scope="col">Nama Kepala Keluarga</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">RT</th>
                        <th scope="col">RW</th>
                        <th scope="col">Desa/Kelurahan</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Kabupaten/Kota</th>
                        <th scope="col">Provinsi</th>
                        <th scope="col">Kode Pos</th>
                        <th scope="col">Jumlah Anggota Keluarga</th>
                        <th scope="col">Status KK</th>
                        <th scope="col">Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kk as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->no_kk }}</td>
                        <td>{{ $data->kepala_keluarga }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->rt }}</td>
                        <td>{{ $data->rw }}</td>
                        <td>{{ $data->desa }}</td>
                        <td>{{ $data->kecamatan }}</td>
                        <td>{{ $data->kabupaten }}</td>
                        <td>{{ $data->provinsi }}</td>
                        <td>{{ $data->kode_pos }}</td>
                        <td>{{ $data->jumlah_anggota }}</td>
                        <td>{{ $data->status_kk }}</td>
                        <td>{{ $data->catatan }}</td>
                    </tr>
                    @endforeach
                   
                   
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
