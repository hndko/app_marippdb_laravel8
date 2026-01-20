<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="sm-hover"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>@yield('title', ($settings['app_name'] ?? config('app.name')) . ' - ' . ($settings['app_description'] ??
        'Penerimaan Peserta Didik Baru'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ $settings['meta_description'] ?? ($settings['app_description'] ?? 'Aplikasi PPDB') }}"
        name="description" />
    <meta content="{{ $settings['meta_keywords'] ?? 'ppdb, sekolah, pendaftaran' }}" name="keywords" />
    <meta content="{{ $settings['meta_author'] ?? 'Mari Partner' }}" name="author" />

    <!-- Open Graph Tags -->
    <meta property="og:title" content="@yield('title', $settings['app_name'] ?? config('app.name'))" />
    <meta property="og:description"
        content="{{ $settings['meta_description'] ?? ($settings['app_description'] ?? '') }}" />
    <meta property="og:image"
        content="{{ isset($settings['og_image']) ? Storage::url($settings['og_image']) : asset('assets/images/logo-sm.png') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="website" />

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
                    @if(isset($settings['app_logo']) && $settings['app_logo'])
                    <img src="{{ Storage::url($settings['app_logo']) }}" class="card-logo card-logo-dark"
                        alt="logo dark" height="40">
                    <img src="{{ Storage::url($settings['app_logo']) }}" class="card-logo card-logo-light"
                        alt="logo light" height="40">
                    @else
                    <span class="card-logo card-logo-dark fw-bold fs-22 text-dark">{{ $settings['app_name'] ??
                        config('app.name') }}</span>
                    <span class="card-logo card-logo-light fw-bold fs-22 text-white">{{ $settings['app_name'] ??
                        config('app.name') }}</span>
                    @endif
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
                            <a class="nav-link fs-15 {{ request()->routeIs('contact') ? 'active' : '' }}"
                                href="{{ route('contact') }}">Kontak</a>
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
                                @if(isset($settings['app_logo']) && $settings['app_logo'])
                                <img src="{{ Storage::url($settings['app_logo']) }}" alt="logo light" height="40">
                                @else
                                <span class="fw-bold fs-22 text-white">{{ $settings['app_name'] ?? config('app.name')
                                    }}</span>
                                @endif
                            </div>
                            <div class="mt-4 fs-13">
                                <p>{{ $settings['footer_description'] ?? 'Sistem Informasi Penerimaan Peserta Didik Baru
                                    (PPDB) Online.' }}</p>
                                <p class="ff-secondary">{{ $settings['app_description'] ?? '' }}</p>
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
                                        <li><a href="{{ route('contact') }}">Kontak</a></li>
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
                                        @if(isset($settings['social_facebook']) && $settings['social_facebook'])
                                        <li class="list-inline-item">
                                            <a href="{{ $settings['social_facebook'] }}" class="avatar-xs d-block">
                                                <div class="avatar-title rounded-circle">
                                                    <i class="ri-facebook-fill"></i>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                        @if(isset($settings['social_instagram']) && $settings['social_instagram'])
                                        <li class="list-inline-item">
                                            <a href="{{ $settings['social_instagram'] }}" class="avatar-xs d-block">
                                                <div class="avatar-title rounded-circle">
                                                    <i class="ri-instagram-fill"></i>
                                                </div>
                                            </a>
                                        </li>
                                        @endif
                                        @if(isset($settings['social_twitter']) && $settings['social_twitter'])
                                        <li class="list-inline-item">
                                            <a href="{{ $settings['social_twitter'] }}" class="avatar-xs d-block">
                                                <div class="avatar-title rounded-circle">
                                                    <i class="ri-twitter-x-fill"></i>
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
                            </script> © {{ $settings['app_name'] ?? 'Mari PPDB' }}. Design & Develop by
                            Mari Partner
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