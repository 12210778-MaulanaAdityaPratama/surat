@extends('layout')

@section('title', 'SuratMasuk')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
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
                    @php $nomor = 1 @endphp
                    @foreach($suratmasuk as $data)
                    <tr>
                        <th scope="row">{{ $nomor++ }}</th>
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
    </div>
</div>

@endsection
