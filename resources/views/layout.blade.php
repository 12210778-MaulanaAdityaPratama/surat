<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/number.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" integrity="sha512-MMEK6jLlO9jDAxQ+1z9/ZvCXU+suo+ekFQyheuAdCr5npvym9DwY6l2Uk6RSvm+gDCOHT+nHHL2jcKVJXIYRGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .text-primary {
          overflow: hidden;
        }
        .text-primary i, h3 {
          display: inline-block;
          transform: translateX(100%);
          animation: slideText 5s linear infinite;
        }
        
      
        @keyframes slideText {
          0% {
            transform: translateX(100%);
          }
          100% {
            transform: translateX(-100%);
          }
        }
      </style>
      <style>
        .clock {
        position: absolute;
        color: #030303; /* Warna jam */
        font-size: 15px;
        font-family: 'Orbitron', sans-serif; /* Gunakan jenis font 'Orbitron' jika tersedia, atau ganti dengan font futuristik lainnya */
        letter-spacing: 7px;
        text-shadow: 2px 2px 5px rgba(187, 19, 19, 0.5); /* Efek bayangan teks */
        transition: color 0.5s ease-in-out; /* Animasi perubahan warna */
    }
    @media (max-width: 50%) {
        .clock {
            font-size: 3px; /* Sesuaikan ukuran jam untuk layar kecil */
            letter-spacing: 4px;
        }
    }
      </style>
   <style>
    .pagination-container {
    display: flex;
    justify-content: left;
    margin-top: 20px;
}

.pagination {
    display: flex;
    list-style: none;
    padding: 0;
}

.pagination li {
    margin: 0 5px;
}

.pagination a {
    color: #007bff;
    text-decoration: none;
    padding: 5px 10px;
    border: 1px solid #007bff;
    border-radius: 3px;
}

.pagination .active a {
    background-color: #007bff;
    color: #fff;
}

   </style>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="/admin" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Kecamatan Rasau Jaya Satu</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ asset('uploads/' . Auth::user()->foto) }}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        @if(Auth::check())
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        @endif
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="/admin" class="nav-item nav-link {{ Request::is('admin') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ Request::is('suratmasuk', 'suratkeluar') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="fa fa-envelope me-2"></i>Kasi Kesra</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/suratmasuk" class="dropdown-item">Surat Masuk</a>
                            <a href="/suratkeluar" class="dropdown-item">Surat Keluar</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ Request::is('pemangkatan', 'kenaikan') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="fa fa-book me-2"></i>Kesekertariatan</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/pemangkatan" class="dropdown-item">Pemangkatan</a>
                            <a href="/kenaikan" class="dropdown-item">Kenaikan Pangkat</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ Request::is('ktp', 'kk') ? 'active' : '' }}" data-bs-toggle="dropdown"><i class="fa fa-user-secret me-2"></i>Dukcapil</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/ktp" class="dropdown-item">Data KTP</a>
                            <a href="/kk" class="dropdown-item">Data KK</a>
                        </div>
                    </div>
                    <a href="/pegawai" class="nav-item nav-link {{ Request::is('pegawai') ? 'active' : '' }}"><i class="fa fa-user me-2"></i>Pegawai</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="/admin" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
                </div>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span id="notification-indicator" class="d-none d-lg-inline-flex">Notification</span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            @foreach($notifications as $notification)
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">{{ $notification->judul }}</h6>
                                    <small>{{ $notification->pesan }}</small>
                                </a>
                                <hr class="dropdown-divider">
                            @endforeach
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                        
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{ asset('uploads/' . Auth::user()->foto) }}" alt="" style="width: 40px; height: 40px;">
                            @if(Auth::check())
                            <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
        @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="/profile" class="dropdown-item">My Profile</a>
                            @if(Auth::check())
                            <a href="{{ route('logout') }}" class="dropdown-item">Log Out</a>
                            @endif

                        </div>
                    </div>
                    
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-envelope fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Surat Masuk</p>
                                <h6 class="mb-0">{{ $jumlahSuratMasuk }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-inbox fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Surat Keluar</p>
                                <h6 class="mb-0">{{ $jumlahSuratKeluar }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-user fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Pegawai</p>
                                <h6 class="mb-0">{{ $jumlahPegawai }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->
            <main>
                <div class="container">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    @yield('content')
                </div>
            </main>
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Kecamatan Rasau Jaya</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
           
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            // Fungsi untuk memeriksa notifikasi baru
            function checkNewNotifications() {
                $.ajax({
                    url: '/check-notifications', // Ganti dengan URL yang sesuai di server Anda
                    type: 'GET',
                    success: function(response) {
                        // Jika ada notifikasi baru, tampilkan indikator
                        if (response.newNotifications) {
                            $('#notification-indicator').show();
                        } else {
                            $('#notification-indicator').hide();
                        }
                    },
                    error: function(error) {
                        console.error('Error checking notifications:', error);
                    }
                });
            }
    
            // Panggil fungsi saat dropdown notifikasi dibuka
            $('.dropdown-toggle').on('click', function() {
                checkNewNotifications();
            });
        });
    </script>
    <script>
       function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();
        </script>
        
    
    
    <script src="{{ asset('js/search.js') }}"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js" integrity="sha512-X5okQH8BZzIYh5yvzvwwUs62Q/YjdbnqM0l1KJ6+JtKu7h4aDSvihIEqpx6vR1PiZtdMWM8UNcDz3syc3V5b3A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
</body>

</html>