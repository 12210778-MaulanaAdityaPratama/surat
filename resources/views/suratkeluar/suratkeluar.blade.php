@extends('layout')

@section('title', 'Surat Keluar')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <form action="{{ url('/suratkeluar') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="searchInput" name="search" placeholder="Cari...">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                <a href="/suratkeluar" class="btn btn-danger" role="button">X</a>
            </div>
        </form>
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
                        <td>
                            <a href="{{ route('suratkeluar.edit', $data->id) }}" class="btn btn-primary">
                                <i class="fa fa-home me-2">Edit</i>
                            </a>
                        </td>                      
                        <td>
                            <form action="{{ route('suratkeluar.delete', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger delete-button" data-id="{{ $data->id }}">Hapus</button>

                            </form>
                        </td>                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection