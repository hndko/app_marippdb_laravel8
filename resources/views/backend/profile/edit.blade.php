@extends('layouts.app-backend')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit Profile</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xxl-6">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Informasi Akun</h4>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="name" name="name"
                                        value="{{ old('name', $user->name) }}" placeholder="Masukkan nama lengkap"
                                        required>
                                    <i class="ri-user-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <div class="form-icon right">
                                    <input type="email" class="form-control form-control-icon" id="email" name="email"
                                        value="{{ old('email', $user->email) }}" placeholder="Masukkan alamat email"
                                        required>
                                    <i class="ri-mail-line"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">
                    <h5 class="fs-14 mb-3 text-muted">Ganti Password (Opsional)</h5>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Password Lama</label>
                                <div class="form-icon right">
                                    <input type="password" class="form-control form-control-icon" id="current_password"
                                        name="current_password" placeholder="Masukkan password lama">
                                    <i class="ri-lock-unlock-line"></i>
                                </div>
                                <small class="text-muted">Diperlukan jika mengganti password.</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="new_password" class="form-label">Password Baru</label>
                                <div class="form-icon right">
                                    <input type="password" class="form-control form-control-icon" id="new_password"
                                        name="new_password" placeholder="Masukkan password baru">
                                    <i class="ri-lock-password-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="new_password_confirmation" class="form-label">Konfirmasi Password
                                    Baru</label>
                                <div class="form-icon right">
                                    <input type="password" class="form-control form-control-icon"
                                        id="new_password_confirmation" name="new_password_confirmation"
                                        placeholder="Ulangi password baru">
                                    <i class="ri-lock-password-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="ri-save-line align-middle me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection