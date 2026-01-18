@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Pendaftaran Siswa Baru</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Formulir Pendaftaran</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Isi Biodata Diri</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('registration.store') }}" method="POST">
                    @csrf

                    <div class="row gy-4">
                        <div class="col-lg-12">
                            <h5 class="fw-bold text-primary">Data Pribadi</h5>
                            <hr>
                        </div>

                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="full_name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="full_name" value="{{ Auth::user()->name }}"
                                    disabled>
                                <small class="text-muted">Nama sesuai akun.</small>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn"
                                    value="{{ old('nisn', $student->nisn ?? '') }}" required>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik"
                                    value="{{ old('nik', $student->nik ?? '') }}" required>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="phone" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ old('phone', $student->phone ?? '') }}">
                            </div>
                        </div>

                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="L" {{ (old('gender', $student->gender ?? '') == 'L') ? 'selected' :
                                        '' }}>Laki-laki</option>
                                    <option value="P" {{ (old('gender', $student->gender ?? '') == 'P') ? 'selected' :
                                        '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="birth_place" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="birth_place" name="birth_place"
                                    value="{{ old('birth_place', $student->birth_place ?? '') }}" required>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="birth_date" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date"
                                    value="{{ old('birth_date', $student->birth_date ?? '') }}" required>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="religion" class="form-label">Agama</label>
                                <select class="form-control" id="religion" name="religion" required>
                                    <option value="Islam" {{ (old('religion', $student->religion ?? '') == 'Islam') ?
                                        'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ (old('religion', $student->religion ?? '') == 'Kristen')
                                        ? 'selected' : '' }}>Kristen</option>
                                    <option value="Katolik" {{ (old('religion', $student->religion ?? '') == 'Katolik')
                                        ? 'selected' : '' }}>Katolik</option>
                                    <option value="Hindu" {{ (old('religion', $student->religion ?? '') == 'Hindu') ?
                                        'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ (old('religion', $student->religion ?? '') == 'Buddha') ?
                                        'selected' : '' }}>Buddha</option>
                                    <option value="Konghucu" {{ (old('religion', $student->religion ?? '') ==
                                        'Konghucu') ? 'selected' : '' }}>Konghucu</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="school_origin" class="form-label">Sekolah Asal</label>
                                <input type="text" class="form-control" id="school_origin" name="school_origin"
                                    value="{{ old('school_origin', $student->school_origin ?? '') }}" required>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="graduation_year" class="form-label">Tahun Lulus</label>
                                <input type="number" class="form-control" id="graduation_year" name="graduation_year"
                                    value="{{ old('graduation_year', $student->graduation_year ?? '') }}" required>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="jalur_pendaftaran" class="form-label">Jalur Pendaftaran</label>
                                <select class="form-control" id="jalur_pendaftaran" name="jalur_pendaftaran" required>
                                    <option value="Zonasi" {{ (old('jalur_pendaftaran', $student->jalur_pendaftaran ??
                                        '') == 'Zonasi') ? 'selected' : '' }}>Zonasi</option>
                                    <option value="Prestasi" {{ (old('jalur_pendaftaran', $student->jalur_pendaftaran ??
                                        '') == 'Prestasi') ? 'selected' : '' }}>Prestasi</option>
                                    <option value="Afirmasi" {{ (old('jalur_pendaftaran', $student->jalur_pendaftaran ??
                                        '') == 'Afirmasi') ? 'selected' : '' }}>Afirmasi</option>
                                    <option value="Perpindahan Orang Tua" {{ (old('jalur_pendaftaran', $student->
                                        jalur_pendaftaran ?? '') == 'Perpindahan Orang Tua') ? 'selected' : ''
                                        }}>Perpindahan Orang Tua</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div>
                                <label for="address" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" id="address" name="address" rows="3"
                                    required>{{ old('address', $student->address ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Data Orang Tua -->
                        <div class="col-lg-12 mt-4">
                            <h5 class="fw-bold text-primary">Data Orang Tua</h5>
                            <hr>
                        </div>

                        <div class="col-xxl-4 col-md-6">
                            <div>
                                <label for="father_name" class="form-label">Nama Ayah</label>
                                <input type="text" class="form-control" id="father_name" name="father_name"
                                    value="{{ old('father_name', $student->parents->father_name ?? '') }}" required>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <div>
                                <label for="mother_name" class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control" id="mother_name" name="mother_name"
                                    value="{{ old('mother_name', $student->parents->mother_name ?? '') }}" required>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <div>
                                <label for="guardian_name" class="form-label">Nama Wali (Opsional)</label>
                                <input type="text" class="form-control" id="guardian_name" name="guardian_name"
                                    value="{{ old('guardian_name', $student->parents->guardian_name ?? '') }}">
                            </div>
                        </div>

                        <div class="col-lg-12 mt-4">
                            @if($student && $student->is_finalized)
                            <div class="alert alert-warning">
                                Data Anda sudah difinalisasi dan tidak dapat diubah. Hubungi panitia jika ada kesalahan.
                            </div>
                            @else
                            <button type="submit" class="btn btn-success btn-lg w-100">Simpan Pendaftaran</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection