@extends('layout')

@section('title', 'KK')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Kartu Keluarga Table</h6>
        <form action="{{ url('/kk') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="searchInput" name="search" placeholder="Cari berdasarkan nama kepala keluarga">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                <a href="/kk" class="btn btn-danger" role="button">X</a>
            </div>
        </form>
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
                        <td>{{ $kk->firstItem() + $loop->index }}</td>
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
                        <td>
                            <a href="{{ route('kk.edit', $data->id) }}" class="btn btn-primary">
                                <i class="fa fa-home me-2">Edit</i>
                            </a>
                        </td>  
                        <td>
                            <form action="{{ route('kk.delete', $data->id) }}" method="POST">
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
        <div class="pagination-container">
            @if ($kk->lastPage() > 1)
                <ul class="pagination">
                    <li class="{{ ($kk->currentPage() == 1) ? ' disabled' : '' }}">
                        <a href="{{ $kk->url(1) }}">First</a>
                    </li>
                    @for ($i = 1; $i <= $kk->lastPage(); $i++)
                        <li class="{{ ($kk->currentPage() == $i) ? ' active' : '' }}">
                            <a href="{{ $kk->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="{{ ($kk->currentPage() == $kk->lastPage()) ? ' disabled' : '' }}">
                        <a href="{{ $kk->url($kk->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>

@endsection
