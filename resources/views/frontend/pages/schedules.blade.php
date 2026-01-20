@extends('layouts.app-frontend')

@section('title', 'Jadwal - ' . (config('app.name')))

@section('content')
<section class="section" id="plans">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h1 class="mb-3 ff-secondary fw-semibold lh-base">Jadwal Penerimaan</h1>
                    <p class="text-muted">Catat tanggal-tanggal penting berikut ini.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="timeline-box">
                    <div class="timeline-row">
                        <div class="timeline-content">
                            <div class="timeline-date">01-15 Juni 2024</div>
                            <h3 class="h5">Pendaftaran Online</h3>
                            <p class="text-muted">Calon siswa melakukan pendaftaran dan upload berkas secara online.</p>
                        </div>
                    </div>
                    <!-- More timeline items can be added static for now or dynamic later -->
                    <div class="alert alert-info text-center">
                        <strong>Info:</strong> Jadwal lengkap akan diumumkan melalui Pengumuman.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection