@extends('layout')

@section('title', 'Home')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Calender</h6>
                    <a href="">Show All</a>
                </div>
                <div id="calender"></div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Daftar Pegawai</h6>
                <div class="owl-carousel testimonial-carousel">
                    @foreach($namapegawai as $index => $nama)
                        <div class="testimonial-item text-center">
                            @if(isset($foto[$index]))
                                <img class="img-fluid rounded-circle mx-auto mb-4" src="{{ asset('uploads/' . $foto[$index]) }}" style="width: 100px; height: 100px;">
                            @else
                                <!-- Handle jika foto tidak ada -->
                                <img class="img-fluid rounded-circle mx-auto mb-4" src="{{ asset('placeholder.jpg') }}" style="width: 100px; height: 100px;">
                            @endif
                            <h5 class="mb-1">{{ $nama }}</h5>
                            <p>{{ $nippegawai[$index] }}</p>
                            <p>{{ $divisi[$index] }}</p>
                            <p class="mb-0">{{ $jabatan[$index] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
