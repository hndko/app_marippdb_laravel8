@extends('layouts.app-backend')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Tambah Pengumuman</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('announcements.index') }}">Pengumuman</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('announcements.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Pengumuman</label>
                        <div class="form-icon right">
                            <input type="text" class="form-control form-control-icon" id="title" name="title"
                                placeholder="Masukkan judul pengumuman" required>
                            <i class="ri-file-text-line"></i>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Isi Pengumuman</label>
                        <textarea class="form-control" id="content" name="content" rows="5"
                            placeholder="Tulis isi pengumuman di sini..." required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar (Opsional)</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" checked>
                        <label class="form-check-label" for="is_active">
                            Publikasikan Langsung
                        </label>
                    </div>

                    <div class="text-end">
                        <a href="{{ route('announcements.index') }}" class="btn btn-light">
                            <i class="ri-arrow-left-line align-bottom me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="ri-save-line align-bottom me-1"></i> Simpan Pengumuman
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection