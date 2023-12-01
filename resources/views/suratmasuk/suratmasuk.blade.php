@extends('layout')

@section('title', 'SuratMasuk')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Surat Masuk Table</h6>
        <form action="{{ url('/suratmasuk') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="searchInput" name="search" placeholder="Cari berdasarkan no surat atau asal surat">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                <a href="/suratmasuk" class="btn btn-danger" role="button">X</a>
            </div>
        </form>
        
        
        <a href="{{ route('suratmasuk.tambah_data') }}" class="btn btn-primary">Tambah Data</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Tanggal Terima</th>
                        <th scope="col">Asal Surat</th>
                        <th scope="col">Tanggal Surat</th>
                        <th scope="col">No Surat</th>
                        <th scope="col">Perihal</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($suratmasuk as $data)
                    <tr>
                        <td>{{ $suratmasuk->firstItem() + $loop->index }}</td>
                        <td>{{ $data->tanggal_terima }}</td>
                        <td>{{ $data->asal_surat }}</td>
                        <td>{{ $data->tanggal_surat }}</td>
                        <td>{{ $data->no_surat }}</td>
                        <td>{{ $data->perihal }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>
                            <a href="{{ route('suratmasuk.edit', $data->id) }}" class="btn btn-primary">
                                <i class="fa fa-home me-2">Edit</i>
                            </a>
                        </td>            
                        <td>
                            <form action="{{ route('suratmasuk.delete', $data->id) }}" method="POST">
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
            @if ($suratmasuk->lastPage() > 1)
                <ul class="pagination">
                    <li class="{{ ($suratmasuk->currentPage() == 1) ? ' disabled' : '' }}">
                        <a href="{{ $suratmasuk->url(1) }}">First</a>
                    </li>
                    @for ($i = 1; $i <= $suratmasuk->lastPage(); $i++)
                        <li class="{{ ($suratmasuk->currentPage() == $i) ? ' active' : '' }}">
                            <a href="{{ $suratmasuk->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="{{ ($suratmasuk->currentPage() == $suratmasuk->lastPage()) ? ' disabled' : '' }}">
                        <a href="{{ $suratmasuk->url($suratmasuk->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>

@endsection
