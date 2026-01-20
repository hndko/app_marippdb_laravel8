@extends('layouts.landing')

@section('title', 'Fitur - ' . (config('app.name')))

@section('content')
<section class="section bg-light" id="features">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h1 class="mb-3 ff-secondary fw-semibold lh-base">Fitur Unggulan</h1>
                    <p class="text-muted">Berbagai fitur yang kami sediakan untuk kemudahan Anda.</p>
                </div>
            </div>
        </div>

        <div class="row g-3">
            @forelse($features as $feature)
            <div class="col-lg-4">
                <div class="d-flex p-3 bg-white rounded shadow-sm h-100">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar-sm icon-effect">
                            <div class="avatar-title bg-transparent text-success rounded-circle">
                                <i class="{{ $feature->icon }} fs-36"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="fs-18">{{ $feature->title }}</h5>
                        <p class="text-muted my-3 ff-secondary">{{ $feature->description }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada fitur yang ditambahkan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection