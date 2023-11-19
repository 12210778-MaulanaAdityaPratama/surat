@extends('layout')

@section('title', 'Data Pegawai')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
        <form action="{{ url('/kenaikan') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="searchInput" name="search" placeholder="Cari...">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                <a href="/kenaikan" class="btn btn-danger" role="button">X</a>
            </div>
        </form>
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
                    @php $nomor = 1 @endphp
                    @foreach($kenaikan as $data)
                    <tr>
                        <th scope="row">{{ $nomor++ }}</th>
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
                        <td>
                            <a href="{{ route('kenaikan.edit', $data->id) }}" class="btn btn-primary ">
                                <i class="fa fa-home me-2">Edit</i>
                            </a>
                        </td>
                        
                        <td>
                            <form action="{{ route('kenaikan.delete', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                {{-- <button type="submit" class="btn btn-danger m-2">
                                    <i class="fa fa-trash me-2"></i>
                                </button> --}}
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
