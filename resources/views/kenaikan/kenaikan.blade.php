@extends('layout')

@section('title', 'Data Pegawai')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Kenaikan Table</h6>
        <form action="{{ url('/kenaikan') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="searchInput" name="search" placeholder="Cari berdasarkan nama atau nip">
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
                    @foreach($kenaikan as $data)
                    <tr>
                        <td>{{ $kenaikan->firstItem() + $loop->index }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->pangkat }}</td>
                        <td>{{ $data->tmt_golongan }}</td>
                        <td>Rp.{{ $data->gaji_pokok }}</td>
                        <td>{{ $data->pangkat_sekarang }}</td>
                        <td>{{ $data->pangkat_datang }}</td>
                        <td>Rp.{{ $data->gaji_sekarang }}</td>
                        <td>Rp.{{ $data->gaji_datang }}</td>
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
        <div class="pagination-container">
            @if ($kenaikan->lastPage() > 1)
                <ul class="pagination">
                    <li class="{{ ($kenaikan->currentPage() == 1) ? ' disabled' : '' }}">
                        <a href="{{ $kenaikan->url(1) }}">First</a>
                    </li>
                    @for ($i = 1; $i <= $kenaikan->lastPage(); $i++)
                        <li class="{{ ($kenaikan->currentPage() == $i) ? ' active' : '' }}">
                            <a href="{{ $kenaikan->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="{{ ($kenaikan->currentPage() == $kenaikan->lastPage()) ? ' disabled' : '' }}">
                        <a href="{{ $kenaikan->url($kenaikan->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>

@endsection
