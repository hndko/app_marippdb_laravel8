@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Kelola Fitur Landing Page</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Fitur</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Daftar Fitur</h4>
                <div class="flex-shrink-0">
                    <a href="{{ route('features.create') }}" class="btn btn-success"><i
                            class="ri-add-line align-bottom me-1"></i> Tambah Fitur</a>
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Icon</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($features as $feature)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><i class="{{ $feature->icon }} fs-24 text-success"></i> <span
                                        class="text-muted fs-10 ml-2">({{ $feature->icon }})</span></td>
                                <td>{{ $feature->title }}</td>
                                <td>{{ Str::limit($feature->description, 50) }}</td>
                                <td>
                                    @if($feature->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                    @else
                                    <span class="badge bg-danger">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('features.edit', $feature->id) }}"
                                        class="btn btn-sm btn-warning"><i class="ri-pencil-line"></i></a>
                                    <form action="{{ route('features.destroy', $feature->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus fitur ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                class="ri-delete-bin-line"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection