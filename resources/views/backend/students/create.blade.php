@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Tambah Siswa Baru</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Data Siswa</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Formulir Data Siswa</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="full_name" class="form-label">Nama Lengkap</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="full_name"
                                        name="full_name" placeholder="Masukkan nama lengkap" required>
                                    <i class="ri-user-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="nisn" class="form-label">NISN</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="nisn" name="nisn"
                                        placeholder="Nomor NISN" required>
                                    <i class="ri-id-card-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="nik" class="form-label">NIK</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="nik" name="nik"
                                        placeholder="Nomor NIK" required>
                                    <i class="ri-id-card-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="phone" class="form-label">No. Telepon</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="phone" name="phone"
                                        placeholder="Contoh: 08123456789">
                                    <i class="ri-phone-line"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="birth_place" class="form-label">Tempat Lahir</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="birth_place"
                                        name="birth_place" placeholder="Kota Lahir" required>
                                    <i class="ri-map-pin-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="birth_date" class="form-label">Tanggal Lahir</label>
                                <div class="form-icon right">
                                    <input type="date" class="form-control form-control-icon" id="birth_date"
                                        name="birth_date" required>
                                    <i class="ri-calendar-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="religion" class="form-label">Agama</label>
                                <select class="form-select" id="religion" name="religion" required>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="school_origin" class="form-label">Sekolah Asal</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="school_origin"
                                        name="school_origin" placeholder="Nama Sekolah Asal" required>
                                    <i class="ri-building-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="graduation_year" class="form-label">Tahun Lulus</label>
                                <div class="form-icon right">
                                    <input type="number" class="form-control form-control-icon" id="graduation_year"
                                        name="graduation_year" placeholder="Contoh: 2024" required>
                                    <i class="ri-calendar-event-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="jalur_pendaftaran" class="form-label">Jalur Pendaftaran</label>
                                <select class="form-select" id="jalur_pendaftaran" name="jalur_pendaftaran" required>
                                    <option value="Zonasi">Zonasi</option>
                                    <option value="Prestasi">Prestasi</option>
                                    <option value="Afirmasi">Afirmasi</option>
                                    <option value="Perpindahan Orang Tua">Perpindahan Orang Tua</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div>
                                <label for="address" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" id="address" name="address" rows="3"
                                    placeholder="Alamat lengkap calon siswa..." required></textarea>
                            </div>
                        </div>

                        <!-- Data Orang Tua (Optional/Simplified for now) -->
                        <div class="col-lg-12 mt-4">
                            <h5 class="fw-semibold">Data Orang Tua</h5>
                            <hr>
                        </div>

                        <!-- Ayah -->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="father_name" class="form-label">Nama Ayah</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="father_name"
                                        name="father_name" placeholder="Nama Ayah" required>
                                    <i class="ri-user-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="father_nik" class="form-label">NIK Ayah</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="father_nik"
                                        name="father_nik" placeholder="NIK Ayah" required>
                                    <i class="ri-id-card-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="father_job" class="form-label">Pekerjaan Ayah</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="father_job"
                                        name="father_job" placeholder="Pekerjaan Ayah" required>
                                    <i class="ri-briefcase-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="father_phone" class="form-label">No. HP Ayah</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="father_phone"
                                        name="father_phone" placeholder="Nomor Handphone">
                                    <i class="ri-phone-line"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Ibu -->
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="mother_name" class="form-label">Nama Ibu</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="mother_name"
                                        name="mother_name" placeholder="Nama Ibu" required>
                                    <i class="ri-user-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="mother_nik" class="form-label">NIK Ibu</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="mother_nik"
                                        name="mother_nik" placeholder="NIK Ibu" required>
                                    <i class="ri-id-card-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="mother_job" class="form-label">Pekerjaan Ibu</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="mother_job"
                                        name="mother_job" placeholder="Pekerjaan Ibu" required>
                                    <i class="ri-briefcase-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="mother_phone" class="form-label">No. HP Ibu</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="mother_phone"
                                        name="mother_phone" placeholder="Nomor Handphone">
                                    <i class="ri-phone-line"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-3 col-md-6">
                            <div>
                                <label for="guardian_name" class="form-label">Nama Wali (Opsional)</label>
                                <div class="form-icon right">
                                    <input type="text" class="form-control form-control-icon" id="guardian_name"
                                        name="guardian_name" placeholder="Nama Wali">
                                    <i class="ri-user-star-line"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Upload Berkas -->
                        <div class="col-lg-12 mt-4">
                            <h5 class="fw-bold text-primary">Upload Berkas Dokumen</h5>
                            <p class="text-muted">Format: JPG, PNG, PDF. Maks: 2MB.</p>
                            <hr>
                        </div>

                        <div class="col-md-6">
                            <label for="foto" class="form-label">Pas Foto (Format: JPG/PNG)</label>
                            <input class="form-control" type="file" id="foto" name="foto">
                        </div>
                        <div class="col-md-6">
                            <label for="kk" class="form-label">Kartu Keluarga (KK)</label>
                            <input class="form-control" type="file" id="kk" name="kk">
                        </div>
                        <div class="col-md-6">
                            <label for="akta" class="form-label">Akta Kelahiran</label>
                            <input class="form-control" type="file" id="akta" name="akta">
                        </div>
                        <div class="col-md-6">
                            <label for="ijazah" class="form-label">Ijazah / SKL</label>
                            <input class="form-control" type="file" id="ijazah" name="ijazah">
                        </div>


                        <div class="col-lg-12 mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="ri-save-line align-bottom me-1"></i> Simpan Data
                            </button>
                            <a href="{{ route('students.index') }}" class="btn btn-light">
                                <i class="ri-arrow-left-line align-bottom me-1"></i> Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection