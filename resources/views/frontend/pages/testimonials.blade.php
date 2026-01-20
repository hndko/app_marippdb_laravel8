@extends('layouts.app-frontend')

@section('title', 'Testimoni - ' . (config('app.name')))

@section('content')
<section class="section" id="reviews">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h1 class="mb-3 ff-secondary fw-semibold lh-base">Apa Kata Mereka?</h1>
                    <p class="text-muted">Testimoni dari siswa dan orang tua alumni.</p>
                </div>
            </div>
        </div>
        <div class="row g-4">
            @forelse($testimonials as $testimonial)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-shrink-0 me-3">
                                @if($testimonial->photo)
                                <img src="{{ Storage::url($testimonial->photo) }}" alt=""
                                    class="avatar-sm rounded-circle object-cover">
                                @else
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-light text-primary rounded-circle fs-20">
                                        {{ substr($testimonial->name, 0, 1) }}
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fs-16 mb-1">{{ $testimonial->name }}</h5>
                                <p class="text-muted mb-0 fs-13">{{ $testimonial->role }}</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            @for($i = 1; $i <= 5; $i++) @if($i <=$testimonial->rating)
                                <i class="ri-star-fill text-warning"></i>
                                @else
                                <i class="ri-star-line text-muted"></i>
                                @endif
                                @endfor
                        </div>
                        <p class="text-muted mb-0 fst-italic">"{{ $testimonial->content }}"</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="alert alert-warning" role="alert">
                    Belum ada testimoni yang ditampilkan.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection