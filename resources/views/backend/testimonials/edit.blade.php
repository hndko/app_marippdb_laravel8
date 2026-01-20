@extends('layouts.app-backend')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit Testimoni</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('testimonials.index') }}">Testimoni</a></li>
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
                <h4 class="card-title mb-0">Form Edit Testimoni</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $testimonial->name) }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Peran / Status <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('role') is-invalid @enderror" id="role"
                            name="role" value="{{ old('role', $testimonial->role) }}" required>
                        @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating (Bintang 1-5) <span
                                class="text-danger">*</span></label>
                        <select class="form-select @error('rating') is-invalid @enderror" id="rating" name="rating">
                            <option value="5" {{ $testimonial->rating == 5 ? 'selected' : '' }}>5 Bintang</option>
                            <option value="4" {{ $testimonial->rating == 4 ? 'selected' : '' }}>4 Bintang</option>
                            <option value="3" {{ $testimonial->rating == 3 ? 'selected' : '' }}>3 Bintang</option>
                            <option value="2" {{ $testimonial->rating == 2 ? 'selected' : '' }}>2 Bintang</option>
                            <option value="1" {{ $testimonial->rating == 1 ? 'selected' : '' }}>1 Bintang</option>
                        </select>
                        @error('rating')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Isi Testimoni <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content"
                            name="content" rows="4" required>{{ old('content', $testimonial->content) }}</textarea>
                        @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto Profil (Opsional)</label>
                        @if($testimonial->photo)
                        <div class="mb-2">
                            <img src="{{ Storage::url($testimonial->photo) }}" alt="Current Photo" class="img-thumbnail"
                                width="100">
                        </div>
                        @endif
                        <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo"
                            name="photo">
                        <div class="form-text">Biarkan kosong jika tidak ingin mengubah foto.</div>
                        @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="is_active" class="form-label text-muted">Status Aktif</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="is_active"
                                name="is_active" {{ $testimonial->is_active ? 'checked' : '' }}>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('testimonials.index') }}" class="btn btn-light"><i
                                class="ri-arrow-left-line align-middle me-1"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary"><i class="ri-save-line align-middle me-1"></i>
                            Update Testimoni</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection