<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="sm-hover"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>{{ config('app.name') }} - Penerimaan Peserta Didik Baru</title>
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
                            <a class="nav-link fs-15 active" href="#hero">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-15" href="#services">Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-15" href="#features">Fitur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-15" href="#plans">Jadwal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-15" href="#reviews">Testimoni</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-15" href="#team">Tim</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-15" href="#contact">Kontak</a>
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

        <!-- start hero section -->
        <section class="section pb-0 hero-section" id="hero">
            <div class="bg-overlay bg-overlay-pattern"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-sm-10">
                        <div class="text-center mt-lg-5 pt-5">
                            <h1 class="display-6 fw-semibold mb-3 lh-base">Penerimaan Peserta Didik Baru <span
                                    class="text-success">Online </span></h1>
                            <p class="lead text-muted lh-base">Bergabunglah bersama kami untuk masa depan yang lebih
                                cerah. Sistem pendaftaran yang mudah, transparan, dan cepat.</p>

                            <div class="d-flex gap-2 justify-content-center mt-4">
                                <a href="{{ route('register') }}" class="btn btn-primary">Daftar Sekarang <i
                                        class="ri-arrow-right-line align-middle ms-1"></i></a>
                                <a href="#plans" class="btn btn-danger">Lihat Jadwal <i
                                        class="ri-calendar-line align-middle ms-1"></i></a>
                            </div>
                        </div>

                        <div class="mt-4 mt-sm-5 pt-sm-5 mb-sm-n5 demo-carousel">
                            <div class="demo-img-patten-top d-none d-sm-block">
                                <img src="{{ asset('assets/images/landing/img-pattern.png') }}"
                                    class="d-block img-fluid" alt="...">
                            </div>
                            <div class="demo-img-patten-bottom d-none d-sm-block">
                                <img src="{{ asset('assets/images/landing/img-pattern.png') }}"
                                    class="d-block img-fluid" alt="...">
                            </div>
                            <div class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner shadow-lg p-2 bg-white rounded">
                                    <div class="carousel-item active" data-bs-interval="2000">
                                        <img src="{{ asset('assets/images/demos/default.png') }}" class="d-block w-100"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <img src="{{ asset('assets/images/demos/saas.png') }}" class="d-block w-100"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <img src="{{ asset('assets/images/demos/material.png') }}" class="d-block w-100"
                                            alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <h3 class="fw-semibold lh-base">Pengumuman Terbaru</h3>
                            <p class="text-muted">Informasi terkini seputar PPDB</p>
                        </div>
                    </div>
                    @foreach($announcements as $news)
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow-none border">
                            @if($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}" class="card-img-top"
                                alt="{{ $news->title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $news->title }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($news->content, 100) }}</p>
                                <p class="card-text"><small class="text-muted">{{ $news->created_at->format('d M Y')
                                        }}</small></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- end container -->
            <div class="position-absolute start-0 end-0 bottom-0 hero-shape-svg">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <g mask="url(&quot;#SvgjsMask1003&quot;)" fill="none">
                        <path d="M 0,118 C 288,98.6 1152,40.4 1440,21L1440 140L0 140z">
                        </path>
                    </g>
                </svg>
            </div>
            <!-- end shape -->
        </section>
        <!-- end hero section -->

        <!-- start client section -->
        <div class="pt-5 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="text-center mt-5">
                            <h5 class="fs-20">Didukung oleh <span
                                    class="text-primary text-decoration-underline">mitra</span> terbaik</h5>

                            <!-- Swiper -->
                            <div class="swiper trusted-client-slider mt-sm-5 mt-4 mb-sm-5 mb-4" dir="ltr">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="client-images">
                                            <img src="{{ asset('assets/images/clients/amazon.svg') }}" alt="client-img"
                                                class="mx-auto img-fluid d-block">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="client-images">
                                            <img src="{{ asset('assets/images/clients/walmart.svg') }}" alt="client-img"
                                                class="mx-auto img-fluid d-block">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="client-images">
                                            <img src="{{ asset('assets/images/clients/lenovo.svg') }}" alt="client-img"
                                                class="mx-auto img-fluid d-block">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="client-images">
                                            <img src="{{ asset('assets/images/clients/paypal.svg') }}" alt="client-img"
                                                class="mx-auto img-fluid d-block">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="client-images">
                                            <img src="{{ asset('assets/images/clients/shopify.svg') }}" alt="client-img"
                                                class="mx-auto img-fluid d-block">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="client-images">
                                            <img src="{{ asset('assets/images/clients/verizon.svg') }}" alt="client-img"
                                                class="mx-auto img-fluid d-block">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end client section -->

        <!-- start services -->
        <section class="section" id="services">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-5">
                            <h1 class="mb-3 ff-secondary fw-semibold lh-base">Layanan Digital Modern & Terpercaya</h1>
                            <p class="text-muted">Kami menyediakan berbagai layanan untuk menunjang proses pendidikan
                                yang lebih baik.</p>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row g-3">
                    <div class="col-lg-4">
                        <div class="d-flex p-3">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm icon-effect">
                                    <div class="avatar-title bg-transparent text-success rounded-circle">
                                        <i class="ri-pencil-ruler-2-line fs-36"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fs-18">Pendaftaran Mudah</h5>
                                <p class="text-muted my-3 ff-secondary">Proses pendaftaran yang simpel dan bisa
                                    dilakukan di mana saja.</p>
                                <div>
                                    <a href="#" class="fs-13 fw-medium">Pelajari Lebih Lanjut <i
                                            class="ri-arrow-right-s-line align-bottom"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4">
                        <div class="d-flex p-3">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm icon-effect">
                                    <div class="avatar-title bg-transparent text-success rounded-circle">
                                        <i class="ri-palette-line fs-36"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fs-18">Antarmuka Modern</h5>
                                <p class="text-muted my-3 ff-secondary">Tampilan aplikasi yang user-friendly dan
                                    menarik.</p>
                                <div>
                                    <a href="#" class="fs-13 fw-medium">Pelajari Lebih Lanjut <i
                                            class="ri-arrow-right-s-line align-bottom"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4">
                        <div class="d-flex p-3">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar-sm icon-effect">
                                    <div class="avatar-title bg-transparent text-success rounded-circle">
                                        <i class="ri-lightbulb-flash-line fs-36"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fs-18">Informasi Transparan</h5>
                                <p class="text-muted my-3 ff-secondary">Dapatkan informasi terkini mengenai status
                                    pendaftaran Anda.</p>
                                <div>
                                    <a href="#" class="fs-13 fw-medium">Pelajari Lebih Lanjut <i
                                            class="ri-arrow-right-s-line align-bottom"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end services -->

        <!-- start footer -->
        <footer class="custom-footer bg-dark py-5 position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mt-4">
                        <div>
                            <div>
                                <h3 class="fw-bold text-white">Mari PPDB</h3>
                            </div>
                            <div class="mt-4 fs-13">
                                <p>{{ $settings['school_name'] ?? 'Sistem PPDB Online' }}</p>
                                <p class="ff-secondary">{{ $settings['school_address'] ?? 'Alamat Sekolah Belum Diatur'
                                    }}</p>
                                <p class="ff-secondary">Email: {{ $settings['school_email'] ?? '-' }} | Telp: {{
                                    $settings['school_phone'] ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 ms-lg-auto">
                        <div class="row">
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">Perusahaan</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list">
                                        <li><a href="#">Tentang Kami</a></li>
                                        <li><a href="#">Karir</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Kontak</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">Bantuan</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list">
                                        <li><a href="#">Cara Daftar</a></li>
                                        <li><a href="#">Syarat & Ketentuan</a></li>
                                        <li><a href="#">Kebijakan Privasi</a></li>
                                        <li><a href="#">FAQ</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">Hubungi Kami</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list">
                                        <li><a href="#">Support</a></li>
                                        <li><a href="#">Sales</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row text-center text-sm-start align-items-center mt-5">
                    <div class="col-sm-6">

                        <div>
                            <p class="copy-rights mb-0">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Mari PPDB - Mari Partnet
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end mt-3 mt-sm-0">
                            <ul class="list-inline mb-0 footer-social-link">
                                @if(!empty($settings['social_facebook']))
                                <li class="list-inline-item">
                                    <a href="{{ $settings['social_facebook'] }}" class="avatar-xs d-block"
                                        target="_blank">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-facebook-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                @endif
                                @if(!empty($settings['social_instagram']))
                                <li class="list-inline-item">
                                    <a href="{{ $settings['social_instagram'] }}" class="avatar-xs d-block"
                                        target="_blank">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-instagram-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                @endif
                                @if(!empty($settings['social_twitter']))
                                <li class="list-inline-item">
                                    <a href="{{ $settings['social_twitter'] }}" class="avatar-xs d-block"
                                        target="_blank">
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
        </footer>
        <!-- end footer -->

        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

    </div>
    <!-- end layout wrapper -->


    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- landing init -->
    <script src="{{ asset('assets/js/pages/landing.init.js') }}"></script>
</body>

</html>