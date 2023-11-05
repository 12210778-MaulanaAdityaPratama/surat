@extends('layout')

@section('title', 'Surat Keluar')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <a href="{{ route('pemangkatan.tambah_data') }}" class="btn btn-primary">Tambah Data</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nip</th>
                        <th scope="col">Pangkat</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Masa Kerja</th>
                        <th scope="col">Latihan Jabatan</th>
                        <th scope="col">Pendidikan</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Catatan Mutasi Kepegawaian</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemangkatan as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->pangkat }}</td>
                        <td>{{ $data->jabatan }}</td>
                        <td>{{ $data->masa_kerja }}</td>
                        <td>{{ $data->latihan_jabatan }}</td>
                        <td>{{ $data->pendidikan }}</td>
                        <td>{{ $data->tanggal_lahir }}</td>
                        <td>{{ $data->catatan }}</td>
                        <td>{{ $data->keterangan }}</td>
                    </tr>
                    @endforeach
                  
                  
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection