@extends('layouts.app-backend')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Detail Pesan</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('contact-messages.index') }}">Pesan Masuk</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Isi Pesan</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label text-muted">Pengirim:</label>
                    <p class="fs-16 fw-bold mb-0">{{ $message->name }} <span class="fw-normal text-muted">({{
                            $message->email }})</span></p>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Subjek:</label>
                    <p class="fs-16 fw-bold mb-0">{{ $message->subject }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label text-muted">Waktu:</label>
                    <p class="mb-0">{{ $message->created_at->format('d M Y, H:i') }}</p>
                </div>
                <hr>
                <div class="mb-3">
                    <label class="form-label text-muted">Pesan:</label>
                    <p class="fs-15">{{ $message->message }}</p>
                </div>

                <div class="mt-4">
                    <a href="mailto:{{ $message->email }}" class="btn btn-primary"><i
                            class="ri-mail-send-line align-middle me-1"></i> Balas Email</a>
                    <a href="{{ route('contact-messages.index') }}" class="btn btn-light"><i
                            class="ri-arrow-left-line align-middle me-1"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection