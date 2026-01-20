@extends('layouts.app-backend')

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

                <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-custom nav-custom-light mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#general" role="tab">
                                <i class="ri-settings-3-line align-middle me-1"></i> Umum
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#hero" role="tab">
                                <i class="ri-layout-top-line align-middle me-1"></i> Hero Section
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#ppdb" role="tab">
                                <i class="ri-school-line align-middle me-1"></i> PPDB
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#contact" role="tab">
                                <i class="ri-phone-line align-middle me-1"></i> Kontak
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#social" role="tab">
                                <i class="ri-share-line align-middle me-1"></i> Sosial Media
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#seo" role="tab">
                                <i class="ri-search-eye-line align-middle me-1"></i> SEO
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
                                <label for="app_shortname" class="form-label">Singkatan Aplikasi</label>
                                <input type="text" class="form-control" id="app_shortname" name="app_shortname"
                                    value="{{ $settings['app_shortname'] ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="app_description" class="form-label">Deskripsi Aplikasi</label>
                                <textarea class="form-control" id="app_description" name="app_description"
                                    rows="3">{{ $settings['app_description'] ?? '' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="app_logo" class="form-label">Logo Aplikasi</label>
                                <input type="file" class="form-control" id="app_logo" name="app_logo">
                                @if(isset($settings['app_logo']) && $settings['app_logo'])
                                <div class="mt-2">
                                    <img src="{{ Storage::url($settings['app_logo']) }}" alt="App Logo" height="50">
                                </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="footer_description" class="form-label">Deskripsi Footer</label>
                                <textarea class="form-control" id="footer_description" name="footer_description"
                                    rows="3">{{ $settings['footer_description'] ?? '' }}</textarea>
                            </div>
                        </div>

                        <!-- HERO TAB -->
                        <div class="tab-pane" id="hero" role="tabpanel">
                            <div class="mb-3">
                                <label for="hero_title" class="form-label">Judul Hero (Utama)</label>
                                <input type="text" class="form-control" id="hero_title" name="hero_title"
                                    value="{{ $settings['hero_title'] ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="hero_subtitle" class="form-label">Subjudul Hero</label>
                                <textarea class="form-control" id="hero_subtitle" name="hero_subtitle"
                                    rows="3">{{ $settings['hero_subtitle'] ?? '' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="hero_bg_image" class="form-label">Gambar Background Hero</label>
                                <input type="file" class="form-control" id="hero_bg_image" name="hero_bg_image">
                                @if(isset($settings['hero_bg_image']) && $settings['hero_bg_image'])
                                <div class="mt-2">
                                    <img src="{{ Storage::url($settings['hero_bg_image']) }}" alt="Hero Background"
                                        height="100">
                                </div>
                                @endif
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
                            <div class="mb-3">
                                <label for="google_maps_embed" class="form-label">Google Maps Embed URL</label>
                                <textarea class="form-control" id="google_maps_embed" name="google_maps_embed"
                                    rows="3">{{ $settings['google_maps_embed'] ?? '' }}</textarea>
                                <div class="form-text">Paste hanya bagian <code>src="..."</code> dari kode embed Google
                                    Maps.</div>
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

                        <!-- SEO TAB -->
                        <div class="tab-pane" id="seo" role="tabpanel">
                            <div class="mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description"
                                    rows="3">{{ $settings['meta_description'] ?? '' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                    value="{{ $settings['meta_keywords'] ?? '' }}"
                                    placeholder="ppdb, sekolah, pendaftaran">
                            </div>
                            <div class="mb-3">
                                <label for="meta_author" class="form-label">Meta Author</label>
                                <input type="text" class="form-control" id="meta_author" name="meta_author"
                                    value="{{ $settings['meta_author'] ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label for="og_image" class="form-label">OG Image (Thumbnail Share Media Sosial)</label>
                                <input type="file" class="form-control" id="og_image" name="og_image">
                                @if(isset($settings['og_image']) && $settings['og_image'])
                                <div class="mt-2">
                                    <img src="{{ Storage::url($settings['og_image']) }}" alt="OG Image" height="100">
                                </div>
                                @endif
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