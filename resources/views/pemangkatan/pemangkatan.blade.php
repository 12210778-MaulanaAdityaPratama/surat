@extends('layout')

@section('title', 'Surat Keluar')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Pemangkatan Table</h6>
        <form action="{{ url('/pemangkatan') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="searchInput" name="search" placeholder="Cari berdasarkan nama atau nip">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                <a href="/pemangkatan" class="btn btn-danger" role="button">X</a>
            </div>
        </form>
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
                    @php $nomor = 1 @endphp
                    @foreach($pemangkatan as $data)
                    <tr>
                        <td>{{ $pemangkatan->firstItem() + $loop->index }}</td>
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
                        <td>
                            <a href="{{ route('pemangkatan.edit', $data->id) }}" class="btn btn-primary">
                                <i class="fa fa-home me-2">Edit</i>
                            </a>
                        </td>         
                        <td>
                            <form action="{{ route('pemangkatan.delete', $data->id) }}" method="POST">
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
            @if ($pemangkatan->lastPage() > 1)
                <ul class="pagination">
                    <li class="{{ ($pemangkatan->currentPage() == 1) ? ' disabled' : '' }}">
                        <a href="{{ $pemangkatan->url(1) }}">First</a>
                    </li>
                    @for ($i = 1; $i <= $pemangkatan->lastPage(); $i++)
                        <li class="{{ ($pemangkatan->currentPage() == $i) ? ' active' : '' }}">
                            <a href="{{ $pemangkatan->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="{{ ($pemangkatan->currentPage() == $pemangkatan->lastPage()) ? ' disabled' : '' }}">
                        <a href="{{ $pemangkatan->url($pemangkatan->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>

@endsection