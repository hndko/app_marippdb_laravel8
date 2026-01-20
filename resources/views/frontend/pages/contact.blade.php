@extends('layouts.landing')

@section('title', 'Kontak - ' . (config('app.name')))

@section('content')
<section class="section" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h1 class="mb-3 ff-secondary fw-semibold lh-base">Hubungi Kami</h1>
                    <p class="text-muted">Jika Anda memiliki pertanyaan, silakan hubungi kami melalui saluran berikut.
                    </p>
                </div>
            </div>
        </div>

        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="card text-center border shadow-none h-100">
                    <div class="card-body py-5">
                        <div class="mb-4">
                            <div class="avatar-lg mx-auto">
                                <div class="avatar-title bg-soft-primary text-primary rounded-circle display-6">
                                    <i class="ri-phone-line"></i>
                                </div>
                            </div>
                        </div>
                        <h5>Telepon</h5>
                        <p class="text-muted">{{ $settings['school_phone'] ?? '-' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-center border shadow-none h-100">
                    <div class="card-body py-5">
                        <div class="mb-4">
                            <div class="avatar-lg mx-auto">
                                <div class="avatar-title bg-soft-primary text-primary rounded-circle display-6">
                                    <i class="ri-map-pin-line"></i>
                                </div>
                            </div>
                        </div>
                        <h5>Alamat</h5>
                        <p class="text-muted">{{ $settings['school_address'] ?? '-' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-center border shadow-none h-100">
                    <div class="card-body py-5">
                        <div class="mb-4">
                            <div class="avatar-lg mx-auto">
                                <div class="avatar-title bg-soft-primary text-primary rounded-circle display-6">
                                    <i class="ri-mail-line"></i>
                                </div>
                            </div>
                        </div>
                        <h5>Email</h5>
                        <p class="text-muted">{{ $settings['school_email'] ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection