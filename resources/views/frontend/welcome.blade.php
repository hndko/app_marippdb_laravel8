@extends('layouts.landing')

@section('title', 'Beranda - ' . (config('app.name')))

@section('content')
<!-- start hero section -->
<section class="section pb-0 hero-section" id="hero">
    <div class="bg-overlay bg-overlay-pattern"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-10">
                <div class="text-center mt-lg-5 pt-5">
                    <h1 class="display-6 fw-semibold mb-3 lh-base">Selamat Datang di <span class="text-success">{{
                            $settings['school_name'] ?? config('app.name') }}</span></h1>
                    <p class="lead text-muted lh-base">Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2024/2025
                        telah dibuka. Daftarkan putra-putri Anda sekarang juga.</p>

                    <div class="d-flex gap-2 justify-content-center mt-4">
                        <a href="{{ route('register') }}" class="btn btn-primary">Daftar Sekarang <i
                                class="ri-arrow-right-line align-middle ms-1"></i></a>
                        <a href="{{ url('/layanan') }}" class="btn btn-danger">Lihat Layanan <i
                                class="ri-eye-line align-middle ms-1"></i></a>
                    </div>
                </div>

                <div class="mt-4 mt-sm-5 pt-sm-5 mb-sm-n5 demo-carousel">
                    <div class="demo-img-patten-top d-none d-sm-block">
                        <img src="{{ asset('assets/images/landing/img-pattern.png') }}" class="d-block img-fluid"
                            alt="...">
                    </div>
                    <div class="demo-img-patten-bottom d-none d-sm-block">
                        <img src="{{ asset('assets/images/landing/img-pattern.png') }}" class="d-block img-fluid"
                            alt="...">
                    </div>
                    <div class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner shadow-lg p-2 bg-white rounded">
                            <div class="carousel-item active">
                                <img src="{{ asset('assets/images/demos/default.png') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/images/demos/saas.png') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/images/demos/material.png') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
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
                    <h5 class="fs-15 fw-semibold text-muted mb-3 d-none">Trusted by developers from over 50 countries
                    </h5>
                    <!-- Swiper logos can be here -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end client section -->

<!-- Announcements Section (Quick View) -->
@if(isset($announcements) && count($announcements) > 0)
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h2 class="mb-3 fw-semibold lh-base">Pengumuman Terbaru</h2>
                    <p class="text-muted">Informasi terbaru seputar PPDB dan kegiatan sekolah.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($announcements as $announcement)
            <div class="col-lg-4">
                <div class="card shadow-none border">
                    @if($announcement->image)
                    <img src="{{ Storage::url($announcement->image) }}" class="card-img-top"
                        alt="{{ $announcement->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $announcement->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit(strip_tags($announcement->content), 100) }}</p>
                        <a href="#" class="btn btn-sm btn-soft-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection