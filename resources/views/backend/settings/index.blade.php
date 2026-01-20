@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Pengaturan Aplikasi</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pengaturan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Konfigurasi Sistem</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-custom nav-custom-light mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#general" role="tab">
                                Umum
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#contact" role="tab">
                                Kontak
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#ppdb" role="tab">
                                PPDB
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#social" role="tab">
                                Sosial Media
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content text-muted">
                        <!-- GENERAL TAB -->
                        <div class="tab-pane active" id="general" role="tabpanel">
                            <div class="mb-3">
                                <label for="app_name" class="form-label">Nama Aplikasi</label>
                                <input type="text" class="form-control" id="app_name" name="app_name"
                                    value="{{ $settings['app_name'] ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="app_shortname" class="form-label">Singkatan Aplikasi (Shortname)</label>
                                <input type="text" class="form-control" id="app_shortname" name="app_shortname"
                                    value="{{ $settings['app_shortname'] ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="app_description" class="form-label">Deskripsi Aplikasi</label>
                                <textarea class="form-control" id="app_description" name="app_description"
                                    rows="3">{{ $settings['app_description'] ?? '' }}</textarea>
                            </div>
                        </div>

                        <!-- CONTACT TAB -->
                        <div class="tab-pane" id="contact" role="tabpanel">
                            <div class="mb-3">
                                <label for="school_phone" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="school_phone" name="school_phone"
                                    value="{{ $settings['school_phone'] ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="school_email" class="form-label">Email Sekolah</label>
                                <input type="email" class="form-control" id="school_email" name="school_email"
                                    value="{{ $settings['school_email'] ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="school_address" class="form-label">Alamat Sekolah</label>
                                <textarea class="form-control" id="school_address" name="school_address"
                                    rows="3">{{ $settings['school_address'] ?? '' }}</textarea>
                            </div>
                        </div>

                        <!-- PPDB TAB -->
                        <div class="tab-pane" id="ppdb" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="registration_start_date" class="form-label">Tanggal Mulai
                                        Pendaftaran</label>
                                    <input type="date" class="form-control" id="registration_start_date"
                                        name="registration_start_date"
                                        value="{{ $settings['registration_start_date'] ?? '' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="registration_end_date" class="form-label">Tanggal Akhir
                                        Pendaftaran</label>
                                    <input type="date" class="form-control" id="registration_end_date"
                                        name="registration_end_date"
                                        value="{{ $settings['registration_end_date'] ?? '' }}">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="announcement_date" class="form-label">Tanggal Pengumuman</label>
                                    <input type="date" class="form-control" id="announcement_date"
                                        name="announcement_date" value="{{ $settings['announcement_date'] ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <!-- SOCIAL TAB -->
                        <div class="tab-pane" id="social" role="tabpanel">
                            <div class="mb-3">
                                <label for="social_facebook" class="form-label">Facebook URL</label>
                                <input type="url" class="form-control" id="social_facebook" name="social_facebook"
                                    value="{{ $settings['social_facebook'] ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="social_instagram" class="form-label">Instagram URL</label>
                                <input type="url" class="form-control" id="social_instagram" name="social_instagram"
                                    value="{{ $settings['social_instagram'] ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="social_twitter" class="form-label">Twitter/X URL</label>
                                <input type="url" class="form-control" id="social_twitter" name="social_twitter"
                                    value="{{ $settings['social_twitter'] ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="ri-save-line align-middle me-1"></i> Simpan Pengaturan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection