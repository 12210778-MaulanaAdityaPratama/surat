@extends('layout')

@section('title', 'KTP')

@section('content')
<br>
<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Responsive Table</h6>
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
                    <tr>
                        <th scope="row">1</th>
                        <td>John</td>
                        <td>Doe</td>
                        <td>jhon@email.com</td>
                        <td>USA</td>
                        <td>123</td>
                        <td>Member</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>mark@email.com</td>
                        <td>UK</td>
                        <td>456</td>
                        <td>Member</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>jacob@email.com</td>
                        <td>AU</td>
                        <td>789</td>
                        <td>Member</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection