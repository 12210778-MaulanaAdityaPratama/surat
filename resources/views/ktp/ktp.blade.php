@extends('layout')

@section('title', 'KTP')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <a href="{{ route('ktp.tambah_data') }}" class="btn btn-primary">Tambah Data</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">No KTP</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal lahir</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Agama</th>
                        <th scope="col">Status Perkawinan</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Kewarganegaraan</th>
                        <th scope="col">Tanggal Pendaftaran</th>
                        <th scope="col">Status Pengambilan</th>
                        <th scope="col">Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @php $nomor = 1 @endphp
                    @foreach($ktp as $data)
                    <tr>
                        <th scope="row">{{ $nomor++ }}</th>
                        <td>{{ $data->no_ktp }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->tempat_lahir }}</td>
                        <td>{{ $data->tanggal_lahir }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->agama }}</td>
                        <td>{{ $data->status_perkawinan }}</td>
                        <td>{{ $data->pekerjaan }}</td>
                        <td>{{ $data->kewarganegaraan }}</td>
                        <td>{{ $data->tgl_pendaftaran }}</td>
                        <td>{{ $data->status_pengambilan }}</td>
                        <td>{{ $data->catatan }}</td>
                        <td>
                            <a href="{{ route('ktp.edit', $data->id) }}" class="btn btn-primary">
                                <i class="fa fa-home me-2">Edit</i>
                            </a>
                        </td>                        
                        <td>
                            <form action="{{ route('ktp.delete', $data->id) }}" method="POST">
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
