<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="sm-hover"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>@yield('title', config('app.name') . ' - Penerimaan Peserta Didik Baru')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Aplikasi PPDB SD/SMP/SMA/SMK" name="description" />
    <meta content="Mari Partnet" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!--Swiper slider css-->
    <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

    @yield('styles')
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example">

    <!-- Begin page -->
    <div class="layout-wrapper landing">
        <nav class="navbar navbar-expand-lg navbar-landing fixed-top" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="card-logo card-logo-dark fw-bold fs-22 text-dark">{{ $settings['school_name'] ??
                        config('app.name') }}</span>
                    <span class="card-logo card-logo-light fw-bold fs-22 text-white">{{ $settings['school_name'] ??
                        config('app.name') }}</span>
                </a>
                <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                        <li class="nav-item">
                            <a class="nav-link fs-15 {{ request()->is('/') ? 'active' : '' }}"
                                href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-15 {{ request()->is('layanan') ? 'active' : '' }}"
                                href="{{ url('/layanan') }}">Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-15 {{ request()->is('fitur') ? 'active' : '' }}"
                                href="{{ url('/fitur') }}">Fitur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-15 {{ request()->is('jadwal') ? 'active' : '' }}"
                                href="{{ url('/jadwal') }}">Jadwal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-15 {{ request()->is('testimoni') ? 'active' : '' }}"
                                href="{{ url('/testimoni') }}">Testimoni</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-15 {{ request()->is('tim') ? 'active' : '' }}"
                                href="{{ url('/tim') }}">Tim</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-15 {{ request()->is('kontak') ? 'active' : '' }}"
                                href="{{ url('/kontak') }}">Kontak</a>
                        </li>
                    </ul>

                    <div class="">
                        @if (Route::has('login'))
                        @auth
                        <a href="{{ url('/home') }}" class="btn btn-primary">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}"
                            class="btn btn-link fw-medium text-decoration-none text-body">Masuk</a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Daftar Sekarang</a>
                        @endif
                        @endauth
                        @endif
                    </div>
                </div>

            </div>
        </nav>
        <!-- end navbar -->
        <div class="vertical-overlay" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent.show"></div>

        @yield('content')

        <!-- Start footer -->
        <footer class="custom-footer bg-dark py-5 position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mt-4">
                        <div>
                            <div>
                                <span class="fw-bold fs-22 text-white">{{ $settings['school_name'] ?? config('app.name')
                                    }}</span>
                            </div>
                            <div class="mt-4 fs-13">
                                <p>Sistem Informasi Penerimaan Peserta Didik Baru (PPDB) Online.</p>
                                <p class="ff-secondary">Daftarkan diri Anda sekarang juga dan bergabunglah bersama kami.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 ms-lg-auto">
                        <div class="row">
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">Menu</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list">
                                        <li><a href="{{ url('/') }}">Beranda</a></li>
                                        <li><a href="{{ url('/layanan') }}">Layanan</a></li>
                                        <li><a href="{{ url('/fitur') }}">Fitur</a></li>
                                        <li><a href="{{ url('/kontak') }}">Kontak</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">Kontak Kami</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list">
                                        <li><i class="ri-map-pin-line me-2"></i> {{ $settings['school_address'] ??
                                            'Alamat Sekolah' }}</li>
                                        <li><i class="ri-mail-line me-2"></i> {{ $settings['school_email'] ??
                                            'email@sekolah.com' }}</li>
                                        <li><i class="ri-phone-line me-2"></i> {{ $settings['school_phone'] ??
                                            '08123456789' }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">Ikuti Kami</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-inline">
                                        @if(isset($settings['facebook_url']))
                                        <li class="list-inline-item">
                                            <a href="{{ $settings['facebook_url'] }}" class="avatar-xs d-block">
                                                <div class="avatar-title rounded-circle">
                                                    <i class="ri-facebook-fill"></i>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                        @if(isset($settings['instagram_url']))
                                        <li class="list-inline-item">
                                            <a href="{{ $settings['instagram_url'] }}" class="avatar-xs d-block">
                                                <div class="avatar-title rounded-circle">
                                                    <i class="ri-instagram-fill"></i>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                        @if(isset($settings['twitter_url']))
                                        <li class="list-inline-item">
                                            <a href="{{ $settings['twitter_url'] }}" class="avatar-xs d-block">
                                                <div class="avatar-title rounded-circle">
                                                    <i class="ri-twitter-fill"></i>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                        @if(isset($settings['youtube_url']))
                                        <li class="list-inline-item">
                                            <a href="{{ $settings['youtube_url'] }}" class="avatar-xs d-block">
                                                <div class="avatar-title rounded-circle">
                                                    <i class="ri-youtube-fill"></i>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row text-center text-white-50 mt-5">
                    <div class="col-lg-12">
                        <p class="mb-0">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Mari PPDB. Design & Develop by
                            Mari Partnet
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->

    </div>
    <!-- end layout wrapper -->


    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <!-- plugins.js removed -->

    <!--Swiper slider js-->
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- landing init -->
    <script src="{{ asset('assets/js/pages/landing.init.js') }}"></script>

    @yield('scripts')
</body>

</html>