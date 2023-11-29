@extends('layout')

@section('title', 'Edit Profile')

@section('content')
<br>

<div class="container">
    <div class="row">
        <!-- Kolom untuk formulir edit -->
        <div class="col-lg-9">
            <div class="bg-light rounded h-100 p-4">
                <form method="POST" action="{{ route('profile.update', Auth::user()->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Tambahkan elemen formulir untuk setiap atribut yang ingin diubah -->
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" class="form-control mb-3" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" class="form-control mb-3" required>

                    <label for="nip">NIP</label>
                    <input type="text" id="nip" name="nip" value="{{ Auth::user()->nip }}" class="form-control mb-3" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Kosongkan Jika Tidak Ingin Mengganti Password" class="form-control mb-3">

                    <label for="foto" class="form-label">Foto:</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">

                    <!-- Tambahkan tombol Simpan -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
