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

                <form action="{{ route('settings.update') }}" method="POST">
                    @csrf

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-custom nav-custom-light mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#general" role="tab">
                                <i class="ri-settings-3-line align-middle me-1"></i> Umum
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#contact" role="tab">
                                <i class="ri-phone-line align-middle me-1"></i> Kontak
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#ppdb" role="tab">
                                <i class="ri-school-line align-middle me-1"></i> PPDB
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#social" role="tab">
                                <i class="ri-share-line align-middle me-1"></i> Sosial Media
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content text-muted">
                        <!-- GENERAL TAB -->
                        <div class="tab-pane active" id="general" role="tabpanel">
                            <div class="mb-3">
                                <label for="app_name" class="form-label">Nama Aplikasi</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="app_name"
                                        name="app_name" value="{{ $settings['app_name'] ?? '' }}"
                                        placeholder="Masukkan nama aplikasi">
                                    <i class="ri-apps-2-line"></i>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="app_shortname" class="form-label">Singkatan Aplikasi (Shortname)</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="app_shortname"
                                        name="app_shortname" value="{{ $settings['app_shortname'] ?? '' }}"
                                        placeholder="Singkatan, misal: MP">
                                    <i class="ri-text"></i>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="app_description" class="form-label">Deskripsi Aplikasi</label>
                                <textarea class="form-control" id="app_description" name="app_description" rows="3"
                                    placeholder="Deskripsi singkat aplikasi...">{{ $settings['app_description'] ?? '' }}</textarea>
                            </div>
                        </div>

                        <!-- CONTACT TAB -->
                        <div class="tab-pane" id="contact" role="tabpanel">
                            <div class="mb-3">
                                <label for="school_phone" class="form-label">Nomor Telepon</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="school_phone"
                                        name="school_phone" value="{{ $settings['school_phone'] ?? '' }}"
                                        placeholder="Contoh: 021-1234567">
                                    <i class="ri-phone-line"></i>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="school_email" class="form-label">Email Sekolah</label>
                                <div class="form-icon right">
                                    <input type="email" class="form-control form-control-icon" id="school_email"
                                        name="school_email" value="{{ $settings['school_email'] ?? '' }}"
                                        placeholder="email@sekolah.sch.id">
                                    <i class="ri-mail-line"></i>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="school_address" class="form-label">Alamat Sekolah</label>
                                <textarea class="form-control" id="school_address" name="school_address" rows="3"
                                    placeholder="Alamat lengkap sekolah...">{{ $settings['school_address'] ?? '' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="google_maps_embed" class="form-label">Google Maps Embed URL (SRC)</label>
                                <textarea class="form-control" id="google_maps_embed" name="google_maps_embed" rows="3"
                                    placeholder="Paste link dari src='...' iframe Google Maps di sini">{{ $settings['google_maps_embed'] ?? '' }}</textarea>
                                <div class="form-text">Buka Google Maps -> Share -> Embed a map -> Copy HTML. Ambil
                                    hanya bagian <code>src="..."</code> nya saja.</div>
                            </div>
                        </div>

                        <!-- PPDB TAB -->
                        <div class="tab-pane" id="ppdb" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="registration_start_date" class="form-label">Tanggal Mulai
                                        Pendaftaran</label>
                                    <div class="form-icon right">
                                        <input type="date" class="form-control form-control-icon"
                                            id="registration_start_date" name="registration_start_date"
                                            value="{{ $settings['registration_start_date'] ?? '' }}">
                                        <i class="ri-calendar-line"></i>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="registration_end_date" class="form-label">Tanggal Akhir
                                        Pendaftaran</label>
                                    <div class="form-icon right">
                                        <input type="date" class="form-control form-control-icon"
                                            id="registration_end_date" name="registration_end_date"
                                            value="{{ $settings['registration_end_date'] ?? '' }}">
                                        <i class="ri-calendar-line"></i>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="announcement_date" class="form-label">Tanggal Pengumuman</label>
                                    <div class="form-icon right">
                                        <input type="date" class="form-control form-control-icon" id="announcement_date"
                                            name="announcement_date" value="{{ $settings['announcement_date'] ?? '' }}">
                                        <i class="ri-calendar-check-line"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SOCIAL TAB -->
                        <div class="tab-pane" id="social" role="tabpanel">
                            <div class="mb-3">
                                <label for="social_facebook" class="form-label">Facebook URL</label>
                                <div class="form-icon right">
                                    <input type="url" class="form-control form-control-icon" id="social_facebook"
                                        name="social_facebook" value="{{ $settings['social_facebook'] ?? '' }}"
                                        placeholder="https://facebook.com/...">
                                    <i class="ri-facebook-fill"></i>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="social_instagram" class="form-label">Instagram URL</label>
                                <div class="form-icon right">
                                    <input type="url" class="form-control form-control-icon" id="social_instagram"
                                        name="social_instagram" value="{{ $settings['social_instagram'] ?? '' }}"
                                        placeholder="https://instagram.com/...">
                                    <i class="ri-instagram-fill"></i>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="social_twitter" class="form-label">Twitter/X URL</label>
                                <div class="form-icon right">
                                    <input type="url" class="form-control form-control-icon" id="social_twitter"
                                        name="social_twitter" value="{{ $settings['social_twitter'] ?? '' }}"
                                        placeholder="https://twitter.com/...">
                                    <i class="ri-twitter-x-fill"></i>
                                </div>
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