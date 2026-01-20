@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Verifikasi Data Siswa</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Verifikasi</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @forelse($students as $student)
    <div class="col-md-6 col-lg-4">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Pendaftar Baru</p>
                    </div>
                    <div class="flex-shrink-0">
                        <span class="badge bg-warning-subtle text-warning fs-11">PENDING</span>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">{{ $student->full_name }}</h4>
                        <p class="text-muted mb-0">NISN: {{ $student->nisn }}</p>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-light rounded fs-3">
                            <i class="ri-user-search-line text-primary"></i>
                        </span>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-soft-primary w-100">
                        <i class="ri-eye-line align-middle me-1"></i> Periksa Data
                    </a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info text-center">
            <h5><i class="ri-check-double-line me-1"></i> Tidak ada data yang perlu diverifikasi saat ini.</h5>
        </div>
    </div>
    @endforelse
</div>

<div class="row">
    <div class="col-12">
        {{ $students->links() }}
    </div>
</div>

@endsection