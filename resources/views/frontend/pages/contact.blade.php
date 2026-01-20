@extends('layouts.app-frontend')

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

    <div class="row mt-5">
        <div class="col-lg-6">
            <div class="card border shadow-none">
                <div class="card-header">
                    <h4 class="card-title mb-0">Kirim Pesan</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" required
                                placeholder="Masukkan nama Anda">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                placeholder="email@contoh.com">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subjek</label>
                            <input type="text" class="form-control" id="subject" name="subject" required
                                placeholder="Judul pesan">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Pesan</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required
                                placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary"><i
                                    class="ri-send-plane-fill align-middle me-1"></i> Kirim Pesan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border shadow-none h-100">
                <div class="card-body p-0">
                    @if(isset($settings['google_maps_embed']) && !empty($settings['google_maps_embed']))
                    <div class="ratio ratio-16x9 h-100">
                        <iframe src="{{ $settings['google_maps_embed'] }}" style="border:0;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    @else
                    <div class="d-flex align-items-center justify-content-center h-100 bg-light rounded">
                        <p class="text-muted">Peta belum dikonfigurasi.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection