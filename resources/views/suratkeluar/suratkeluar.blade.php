@extends('layout')

@section('title', 'Surat Keluar')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <a href="{{ route('suratkeluar.tambah_data') }}" class="btn btn-primary">Tambah Data</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Pengelola</th>
                        <th scope="col">Perihal</th>
                        <th scope="col">Tanggal Surat</th>
                        <th scope="col">No Surat</th>
                        <th scope="col">Alamat Yang Dituju</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @php $nomor = 1 @endphp
                    @foreach($suratkeluar as $data)
                    <tr>
                        <th scope="row">{{ $nomor++ }}</th>
                        <td>{{ $data->pengelola }}</td>
                        <td>{{ $data->perihal }}</td>
                        <td>{{ $data->tanggal_surat }}</td>
                        <td>{{ $data->no_surat }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->keterangan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection