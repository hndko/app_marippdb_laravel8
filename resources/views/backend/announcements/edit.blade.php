@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit Pengumuman</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('announcements.index') }}">Pengumuman</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('announcements.update', $announcement->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Pengumuman</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $announcement->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Isi Pengumuman</label>
                        <textarea class="form-control" id="content" name="content" rows="5"
                            required>{{ $announcement->content }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar (Opsional)</label>
                        @if($announcement->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $announcement->image) }}" alt="Current Image"
                                class="img-thumbnail" width="200">
                        </div>
                        @endif
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{
                            $announcement->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Publikasikan
                        </label>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('announcements.index') }}" class="btn btn-light">Kembali</a>
                        <button type="submit" class="btn btn-primary">Update Pengumuman</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection