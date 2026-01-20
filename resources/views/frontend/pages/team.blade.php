@extends('layouts.app-frontend')

@section('title', 'Tim - ' . (config('app.name')))

@section('content')
<section class="section bg-light" id="team">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h1 class="mb-3 ff-secondary fw-semibold lh-base">Tim Kami</h1>
                    <p class="text-muted">Orang-orang di balik kesuksesan PPDB ini.</p>
                </div>
            </div>
        </div>
        <div class="row g-4">
            @forelse($teams as $team)
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 shadow-sm border-0 text-center">
                    <div class="card-body p-4">
                        @if($team->photo)
                        <img src="{{ Storage::url($team->photo) }}" alt=""
                            class="avatar-xl rounded-circle object-cover mb-3">
                        @else
                        <div class="avatar-xl mx-auto mb-3">
                            <div class="avatar-title bg-light text-primary rounded-circle fs-24">
                                {{ substr($team->name, 0, 1) }}
                            </div>
                        </div>
                        @endif
                        <h5 class="fs-16 mb-1">{{ $team->name }}</h5>
                        <p class="text-muted mb-3">{{ $team->position }}</p>
                        <p class="text-muted fst-italic fs-13 mb-4">{{ $team->bio }}</p>

                        <div class="d-flex justify-content-center gap-2">
                            @if($team->twitter_link)
                            <a href="{{ $team->twitter_link }}" class="btn btn-sm btn-soft-info btn-icon"><i
                                    class="ri-twitter-line"></i></a>
                            @endif
                            @if($team->facebook_link)
                            <a href="{{ $team->facebook_link }}" class="btn btn-sm btn-soft-primary btn-icon"><i
                                    class="ri-facebook-fill"></i></a>
                            @endif
                            @if($team->instagram_link)
                            <a href="{{ $team->instagram_link }}" class="btn btn-sm btn-soft-danger btn-icon"><i
                                    class="ri-instagram-line"></i></a>
                            @endif
                            @if($team->linkedin_link)
                            <a href="{{ $team->linkedin_link }}" class="btn btn-sm btn-soft-blue btn-icon"><i
                                    class="ri-linkedin-fill"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="alert alert-warning" role="alert">
                    Belum ada anggota tim yang ditampilkan.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection