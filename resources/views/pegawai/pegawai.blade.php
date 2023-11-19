@extends('layout')

@section('title', 'Pegawai')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <form action="{{ url('/pegawai') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="searchInput" name="search" placeholder="Cari...">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                <a href="/pegawai" class="btn btn-danger" role="button">X</a>
            </div>
        </form>
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
                        <td>
                            <!-- Menampilkan Foto -->
                            <img src="{{ asset('uploads/' . $data->foto) }}" alt="Foto Pegawai" class="img-thumbnail" style="max-width: 100px;">
                        </td>
                        
                        <td>
                            <a href="{{ route('pegawai.edit', $data->id) }}" class="btn btn-primary">
                                <i class="fa fa-home ">Edit</i>
                            </a>
                        </td>                     
                        <td>
                            <form action="{{ route('pegawai.delete', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger delete-button" data-id="{{ $data->id }}">Hapus</button>
                            </form>
                        </td>                   
                     </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection