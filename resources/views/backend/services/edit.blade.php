@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit Layanan</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Layanan</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Form Edit Layanan</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('services.update', $service->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Layanan <span class="text-danger">*</span></label>
                        <div class="form-icon right">
                            <input type="text"
                                class="form-control form-control-icon @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title', $service->title) }}" required>
                            <i class="ri-text"></i>
                        </div>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon Class (Remix Icon) <span
                                class="text-danger">*</span></label>
                        <div class="form-icon right">
                            <input type="text"
                                class="form-control form-control-icon @error('icon') is-invalid @enderror" id="icon"
                                name="icon" value="{{ old('icon', $service->icon) }}" required>
                            <i class="{{ $service->icon }}"></i>
                        </div>
                        <div class="form-text">Lihat referensi icon di <a href="https://remixicon.com/"
                                target="_blank">Remix Icon</a>. Gunakan nama class-nya saja.</div>
                        @error('icon')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <div class="form-icon right">
                            <textarea class="form-control form-control-icon @error('description') is-invalid @enderror"
                                id="description" name="description" rows="4"
                                required>{{ old('description', $service->description) }}</textarea>
                            <i class="ri-file-text-line"></i>
                        </div>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="is_active" class="form-label text-muted">Status Aktif</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="is_active"
                                name="is_active" {{ $service->is_active ? 'checked' : '' }}>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('services.index') }}" class="btn btn-light"><i
                                class="ri-arrow-left-line align-middle me-1"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary"><i class="ri-save-line align-middle me-1"></i>
                            Update Layanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection