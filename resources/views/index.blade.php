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
        <div class="col-sm-12 col-xl-30">
            <div class="mb-4"></div>
            <div class="bg-light rounded h-100 p-4">
                <iframe class="position-relative rounded w-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255345.90222422613!2d109.18176435547423!3d-0.2520254073263721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d47b164503aa9%3A0x2d0217a23017a2b9!2sKec.%20Rasau%20Jaya%2C%20Kabupaten%20Kubu%20Raya%2C%20Kalimantan%20Barat!5e0!3m2!1sid!2sid!4v1701021291694!5m2!1sid!2sid"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"
                    width="100%" height="300"></iframe>
            </div>
        </div>
        
        <div class="mb-4"></div>

        
    </div>
    
</div>

@endsection
