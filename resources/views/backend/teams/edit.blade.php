@extends('layouts.app-backend')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit Anggota Tim</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('teams.index') }}">Tim Kami</a></li>
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
                <h4 class="card-title mb-0">Form Edit Anggota</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $team->name) }}" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="position" class="form-label">Jabatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('position') is-invalid @enderror" id="position"
                            name="position" value="{{ old('position', $team->position) }}" required>
                        @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio Singkat</label>
                        <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio"
                            rows="3">{{ old('bio', $team->bio) }}</textarea>
                        @error('bio')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto Profil (Opsional)</label>
                        @if($team->photo)
                        <div class="mb-2">
                            <img src="{{ Storage::url($team->photo) }}" alt="Current Photo" class="img-thumbnail"
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

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="twitter_link" class="form-label">Twitter / X Link</label>
                            <input type="url" class="form-control @error('twitter_link') is-invalid @enderror"
                                id="twitter_link" name="twitter_link"
                                value="{{ old('twitter_link', $team->twitter_link) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="facebook_link" class="form-label">Facebook Link</label>
                            <input type="url" class="form-control @error('facebook_link') is-invalid @enderror"
                                id="facebook_link" name="facebook_link"
                                value="{{ old('facebook_link', $team->facebook_link) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="instagram_link" class="form-label">Instagram Link</label>
                            <input type="url" class="form-control @error('instagram_link') is-invalid @enderror"
                                id="instagram_link" name="instagram_link"
                                value="{{ old('instagram_link', $team->instagram_link) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="linkedin_link" class="form-label">LinkedIn Link</label>
                            <input type="url" class="form-control @error('linkedin_link') is-invalid @enderror"
                                id="linkedin_link" name="linkedin_link"
                                value="{{ old('linkedin_link', $team->linkedin_link) }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label for="is_active" class="form-label text-muted">Status Aktif</label>
                            <input class="form-check-input code-switcher" type="checkbox" id="is_active"
                                name="is_active" {{ $team->is_active ? 'checked' : '' }}>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('teams.index') }}" class="btn btn-light"><i
                                class="ri-arrow-left-line align-middle me-1"></i> Kembali</a>
                        <button type="submit" class="btn btn-primary"><i class="ri-save-line align-middle me-1"></i>
                            Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection