@extends('layouts.app-backend')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Pengumuman Kelulusan</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Pengumuman</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        @if($student->status == 'pending')
        <div class="card bg-warning text-white">
            <div class="card-body text-center p-5">
                <i class="ri-time-line display-5 mb-4"></i>
                <h2 class="card-title text-white mb-2">Menunggu Verifikasi</h2>
                <p class="card-text fs-16">Data pendaftaran Anda sedang dalam proses verifikasi oleh panitia PPDB. Mohon
                    cek kembali secara berkala.</p>
            </div>
        </div>

        @elseif($student->status == 'verified')
        <div class="card bg-info text-white">
            <div class="card-body text-center p-5">
                <i class="ri-file-search-line display-5 mb-4"></i>
                <h2 class="card-title text-white mb-2">Terverifikasi (Lolos Seleksi Administrasi)</h2>
                <p class="card-text fs-16">Selamat! Data Anda telah diverifikasi dan lolos seleksi administrasi. Silakan
                    menunggu pengumuman hasil akhir penerimaan.</p>
            </div>
        </div>

        @elseif($student->status == 'accepted')
        <div class="card bg-success text-white">
            <div class="card-body text-center p-5">
                <i class="ri-trophy-line display-5 mb-4"></i>
                <h2 class="card-title text-white mb-2">SELAMAT! ANDA DITERIMA</h2>
                <p class="card-text fs-16">Selamat bergabung menjadi bagian dari sekolah kami. Silakan lakukan daftar
                    ulang sesuai jadwal yang ditentukan.</p>
                <button class="btn btn-light mt-4">Cetak Bukti Diterima</button>
            </div>
        </div>

        @elseif($student->status == 'rejected' || $student->status == 'not_accepted')
        <div class="card bg-danger text-white">
            <div class="card-body text-center p-5">
                <i class="ri-emotion-sad-line display-5 mb-4"></i>
                <h2 class="card-title text-white mb-2">MOHON MAAF</h2>
                <p class="card-text fs-16">Anda belum dinyatakan lolos seleksi penerimaan siswa baru tahun ini. Tetap
                    semangat dan jangan menyerah!</p>
            </div>
        </div>
        @else
        <div class="card">
            <div class="card-body text-center p-5">
                <p>Status tidak diketahui.</p>
            </div>
        </div>
        @endif

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Detail Data Pendaftaran</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="ps-0" scope="row">No. Pendaftaran</th>
                                <td class="text-muted">{{ $student->registration_number }}</td>
                            </tr>
                            <tr>
                                <th class="ps-0" scope="row">Nama Lengkap</th>
                                <td class="text-muted">{{ $student->full_name }}</td>
                            </tr>
                            <tr>
                                <th class="ps-0" scope="row">NISN</th>
                                <td class="text-muted">{{ $student->nisn }}</td>
                            </tr>
                            <tr>
                                <th class="ps-0" scope="row">Jalur Pendaftaran</th>
                                <td class="text-muted">{{ $student->jalur_pendaftaran }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection