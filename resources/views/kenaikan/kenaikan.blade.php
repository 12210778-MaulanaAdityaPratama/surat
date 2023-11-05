@extends('layout')

@section('title', 'Data Pegawai')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <a href="{{ route('kenaikan.tambah_data') }}" class="btn btn-primary">Tambah Data</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nip</th>
                        <th scope="col">Pangkat/Gol. Ruang</th>
                        <th scope="col">TMT Golongan</th>
                        <th scope="col">Gaji Pokok(Rp)</th>
                        <th scope="col">Pangkat Sekarang</th>
                        <th scope="col">Pangkat Akan Datang</th>
                        <th scope="col">Gaji Sekarang</th>
                        <th scope="col">Gaji Datang</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kenaikan as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->pangkat }}</td>
                        <td>{{ $data->tmt_golongan }}</td>
                        <td>{{ $data->gaji_pokok }}</td>
                        <td>{{ $data->pangkat_sekarang }}</td>
                        <td>{{ $data->pangkat_datang }}</td>
                        <td>{{ $data->gaji_sekarang }}</td>
                        <td>{{ $data->gaji_datang }}</td>
                        <td>{{ $data->keterangan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
