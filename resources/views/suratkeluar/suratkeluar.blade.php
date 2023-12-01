@extends('layout')

@section('title', 'Surat Keluar')

@section('content')
<br>

<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Surat Keluar Table</h6>
        <form action="{{ url('/suratkeluar') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="searchInput" name="search" placeholder="Cari berdasarkan pengelola atau no surat">
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
                    @foreach($suratkeluar as $data)
                    <tr>
                        <td>{{ $suratkeluar->firstItem() + $loop->index }}</td>
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
        <div class="pagination-container">
            @if ($suratkeluar->lastPage() > 1)
                <ul class="pagination">
                    <li class="{{ ($suratkeluar->currentPage() == 1) ? ' disabled' : '' }}">
                        <a href="{{ $suratkeluar->url(1) }}">First</a>
                    </li>
                    @for ($i = 1; $i <= $suratkeluar->lastPage(); $i++)
                        <li class="{{ ($suratkeluar->currentPage() == $i) ? ' active' : '' }}">
                            <a href="{{ $suratkeluar->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="{{ ($suratkeluar->currentPage() == $suratkeluar->lastPage()) ? ' disabled' : '' }}">
                        <a href="{{ $suratkeluar->url($suratkeluar->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>

@endsection