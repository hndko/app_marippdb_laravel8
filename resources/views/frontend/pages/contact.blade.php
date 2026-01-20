@extends('layouts.app-frontend')

@section('title', 'Kontak - ' . (config('app.name')))

@section('content')
<section class="section bg-light" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h2 class="mb-3 fw-bold lh-base">Hubungi Kami</h2>
                    <p class="text-muted">Kami siap membantu Anda. Jangan ragu untuk menghubungi kami melalui saluran di
                        bawah ini atau kirimkan pesan langsung.</p>
                </div>
            </div>
        </div>

        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="card card-animate text-center border-0 shadow-lg h-100">
                    <div class="card-body py-5">
                        <div class="mb-4">
                            <div class="avatar-lg mx-auto">
                                <div class="avatar-title bg-soft-primary text-primary rounded-circle display-6 shadow">
                                    <i class="ri-phone-line"></i>
                                </div>
                            </div>
                        </div>
                        <h5 class="fw-semibold">Telepon</h5>
                        <p class="text-muted mb-0">{{ $settings['school_phone'] ?? '-' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-animate text-center border-0 shadow-lg h-100">
                    <div class="card-body py-5">
                        <div class="mb-4">
                            <div class="avatar-lg mx-auto">
                                <div class="avatar-title bg-soft-success text-success rounded-circle display-6 shadow">
                                    <i class="ri-map-pin-line"></i>
                                </div>
                            </div>
                        </div>
                        <h5 class="fw-semibold">Alamat</h5>
                        <p class="text-muted mb-0">{{ $settings['school_address'] ?? '-' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-animate text-center border-0 shadow-lg h-100">
                    <div class="card-body py-5">
                        <div class="mb-4">
                            <div class="avatar-lg mx-auto">
                                <div class="avatar-title bg-soft-warning text-warning rounded-circle display-6 shadow">
                                    <i class="ri-mail-line"></i>
                                </div>
                            </div>
                        </div>
                        <h5 class="fw-semibold">Email</h5>
                        <p class="text-muted mb-0">{{ $settings['school_email'] ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 gy-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-header bg-transparent border-bottom-0 pt-4">
                        <h4 class="card-title mb-0 fw-bold">Kirim Pesan</h4>
                    </div>
                    <div class="card-body p-4">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap"
                                    required>
                                <label for="name">Nama Lengkap</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="name@example.com" required>
                                <label for="email">Email Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Subjek Pesan" required>
                                <label for="subject">Subjek</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Tulis pesan di sini" id="message"
                                    name="message" style="height: 150px" required></textarea>
                                <label for="message">Pesan</label>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm">
                                    <i class="ri-send-plane-fill align-middle me-1"></i> Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-lg h-100 overflow-hidden">
                    <div class="card-body p-0 h-100">
                        @if(isset($settings['google_maps_embed']) && !empty($settings['google_maps_embed']))
                        <div class="ratio h-100" style="min-height: 400px;">
                            <iframe src="{{ $settings['google_maps_embed'] }}" style="border:0;" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        @else
                        <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                            <div class="text-center p-5">
                                <i class="ri-map-pin-line display-1 text-muted mb-3"></i>
                                <p class="text-muted fs-16">Peta lokasi sekolah belum dikonfigurasi oleh admin.</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection