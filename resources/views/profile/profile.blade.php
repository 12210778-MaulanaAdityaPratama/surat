@extends('layout')

@section('title', 'Home')

@section('content')
<br>

<div class="container">
    <div class="row">
        <!-- Kolom untuk profil pengguna -->
        <div class="col-lg-3">
            <div class="bg-light rounded h-100 p-4">
                <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                    <img src="{{ asset('uploads/' . Auth::user()->foto) }}"
                        alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                    <a href="{{ route('profile.edit', Auth::user()->id) }}" class="btn btn-primary" style="text-decoration: none; color: inherit;">
                        <button type="button" class="btn btn-primary" data-mdb-ripple-color="dark" style="z-index: 1;">
                            Edit profile
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <!-- Kolom untuk konten profil -->
        <div class="col-lg-9">
            <div class="bg-light rounded h-100 p-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6>Nama</h6>

                    <div class="border rounded p-1 pb-0 mb-4">
                        <figure>
                            <blockquote class="blockquote">
                                @if(Auth::check())
                                <p>{{ Auth::user()->name }}</p>
                            </blockquote>
                            @endif
                        </figure>
                    </div>
                    <h6>Email</h6>
                    <div class="border rounded p-1 pb-0 mb-4">
                        <figure>
                            <blockquote class="blockquote">
                                @if(Auth::check())
                                <p>{{ Auth::user()->email }}</p>
                            </blockquote>
                            @endif
                        </figure>
                    </div>
                    <h6>NIP</h6>
                    <div class="border rounded p-1 pb-0 mb-4">
                        <figure>
                            <blockquote class="blockquote">
                                @if(Auth::check())
                                <p>{{ Auth::user()->nip }}</p>
                            </blockquote>
                            @endif
                        </figure>
                    </div>
                    <h6>Password</h6>
                    <div class="border rounded p-1 pb-0 mb-4">
                        <figure>
                            <blockquote class="blockquote">
                                @if(Auth::check())
                                <p>
                                    @php
                                        $passwordLength = strlen(Auth::user()->password);
                                        $maskedPassword = str_repeat('*', $passwordLength);
                                        echo $maskedPassword;
                                    @endphp
                                </p>
                            @endif
                        </figure>
                    </div>
                </div>
            <!-- Konten profil lainnya -->
            </div>
        </div>
    </div>
</div>

@endsection
