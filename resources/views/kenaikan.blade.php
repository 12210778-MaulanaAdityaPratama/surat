@extends('layout')

@section('title', 'Surat Keluar')

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
                        <th scope="col">Nama</th>
                        <th scope="col">Nip</th>
                        <th scope="col">Pangkat/Gol. Ruang</th>
                        <th scope="col">TMT Golongan</th>
                        <th scope="col">Gaji Pokok(Rp)</th>
                        <th scope="col">Kenaikan Pangkat</th>
                        <th scope="col">Sekarang</th>
                        <th scope="col">Akan Datang</th>
                        <th scope="col">Kenaikan Gaji Berkala</th>
                        <th scope="col">Sekarang</th>
                        <th scope="col">Akan Datang</th>
                        <th scope="col">Keterangan</th>
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