@extends('layout')

@section('title', 'Pegawai')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <a href="{{ route('pegawai.tambah_data') }}" class="btn btn-primary">Tambah Data</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nip</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Divisi</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @php $nomor = 1 @endphp
                    @foreach($pegawai as $data)
                    <tr>
                        <th scope="row">{{ $nomor++ }}</th>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->divisi }}</td>
                        <td>{{ $data->jabatan }}</td>
                        <td>{{ $data->foto }}</td>
                    </tr>
                    @endforeach
                   
                  
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection