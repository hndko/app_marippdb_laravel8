@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Detail Siswa</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Data Siswa</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-0">Informasi Pribadi</h5>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary"><i
                                class="ri-edit-line align-bottom me-1"></i> Edit Data</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">Nama Lengkap</h6>
                            <p class="fs-14 mb-0">{{ $student->full_name }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">NISN</h6>
                            <p class="fs-14 mb-0">{{ $student->nisn }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">NIK</h6>
                            <p class="fs-14 mb-0">{{ $student->nik }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">Jenis Kelamin</h6>
                            <p class="fs-14 mb-0">{{ $student->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">Tempat, Tanggal Lahir</h6>
                            <p class="fs-14 mb-0">{{ $student->birth_place }}, {{
                                \Carbon\Carbon::parse($student->birth_date)->format('d F Y') }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">Agama</h6>
                            <p class="fs-14 mb-0">{{ $student->religion }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">No. Telepon</h6>
                            <p class="fs-14 mb-0">{{ $student->phone ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">Sekolah Asal</h6>
                            <p class="fs-14 mb-0">{{ $student->school_origin }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">Status Pendaftaran</h6>
                            <span
                                class="badge {{ $student->status == 'verified' ? 'bg-success' : ($student->status == 'pending' ? 'bg-warning' : 'bg-danger') }}">
                                {{ ucfirst($student->status) }}
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">Alamat</h6>
                            <p class="fs-14 mb-0">{{ $student->address }}</p>
                        </div>
                    </div>
                </div>

                <div class="border-top border-top-dashed my-4"></div>

                <div class="d-flex align-items-center mb-4">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-0">Informasi Orang Tua</h5>
                    </div>
                </div>

                <div class="row">
                    <!-- Ayah -->
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">Nama Ayah</h6>
                            <p class="fs-14 mb-0">{{ optional($student->parents)->father_name ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">NIK Ayah</h6>
                            <p class="fs-14 mb-0">{{ optional($student->parents)->father_nik ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">Pekerjaan Ayah</h6>
                            <p class="fs-14 mb-0">{{ optional($student->parents)->father_job ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">No. HP Ayah</h6>
                            <p class="fs-14 mb-0">{{ optional($student->parents)->father_phone ?? '-' }}</p>
                        </div>
                    </div>

                    <!-- Ibu -->
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">Nama Ibu</h6>
                            <p class="fs-14 mb-0">{{ optional($student->parents)->mother_name ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">NIK Ibu</h6>
                            <p class="fs-14 mb-0">{{ optional($student->parents)->mother_nik ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">Pekerjaan Ibu</h6>
                            <p class="fs-14 mb-0">{{ optional($student->parents)->mother_job ?? '-' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">No. HP Ibu</h6>
                            <p class="fs-14 mb-0">{{ optional($student->parents)->mother_phone ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <h6 class="fs-12 text-muted fw-medium text-uppercase">Nama Wali</h6>
                            <p class="fs-14 mb-0">{{ optional($student->parents)->guardian_name ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <div class="border-top border-top-dashed my-4"></div>

                <div class="d-flex align-items-center mb-4">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-0">Berkas Dokumen</h5>
                    </div>
                </div>

                <div class="row">
                    @forelse($student->files as $file)
                    <div class="col-lg-3 col-md-6">
                        <div class="card shadow-none border">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-1">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-light rounded-circle fs-3 text-primary">
                                            <i class="ri-file-text-line"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="fs-14 mb-1">{{ strtoupper($file->file_type) }}</h6>
                                        <p class="text-muted fs-12 mb-0">{{ $file->original_name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-light text-center">
                                <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank"
                                    class="link-primary">Download / Lihat</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-warning">Belum ada berkas yang diupload.</div>
                    </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</div>
@endsection