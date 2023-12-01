@extends('layout')

@section('title', 'KTP')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Kartu Tanda Penduduk Table</h6>
        <form action="{{ url('/ktp') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="searchInput" name="search" placeholder="Cari berdasarkan nama">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                <a href="/ktp" class="btn btn-danger" role="button">X</a>
            </div>
        </form>
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
                    @foreach($ktp as $data)
                    <tr>
                        <td>{{ $ktp->firstItem() + $loop->index }}</td>
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
        <div class="pagination-container">
            @if ($ktp->lastPage() > 1)
                <ul class="pagination">
                    <li class="{{ ($ktp->currentPage() == 1) ? ' disabled' : '' }}">
                        <a href="{{ $ktp->url(1) }}">First</a>
                    </li>
                    @for ($i = 1; $i <= $ktp->lastPage(); $i++)
                        <li class="{{ ($ktp->currentPage() == $i) ? ' active' : '' }}">
                            <a href="{{ $ktp->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="{{ ($ktp->currentPage() == $ktp->lastPage()) ? ' disabled' : '' }}">
                        <a href="{{ $ktp->url($ktp->lastPage()) }}">Last</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
