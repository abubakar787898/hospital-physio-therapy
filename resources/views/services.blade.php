@extends('layouts.frontend.app')

@section('title', 'Serivces')
@push('meta')
    <meta name="title" content="{{ $meta_title }}">
    <meta name="description" content="{{ $meta_description }}">
    {{-- <meta name="description" content="Your dynamic meta description here"> --}}
    <!-- You can add other meta tags as needed -->
@endpush
{{-- @push('meta')
    <meta name="description" content="{{ $metaDescription }}">
    <!-- You can add other meta tags as needed -->
@endpush --}}
@push('css')
    <link href="{{ asset('assets/frontend/css/services/services.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section>

        <div class="hero_section">

            <div class="hero_title">
                <h1>Services We Offer You</h1>
            </div>

        </div>

    </section>


    <div class="services_menu">

        <div class="service_head">
            <h6>We offer a full range of physiotherapy services catered to match your personal goals</h6>
        </div>

        <div class="service_cards">

            <div class="card_group">

                @foreach ($services as $service)
                <div class="single__card ">
                    <img src="/image/{{ $service->image }}" alt="">
    
                    <div class="card__detail">
    
                        <span class="card__title">
                          {{ $service->name }}
                        </span>
    
                        <p class="paragarph">
                          @if (strlen(strip_tags($service->description)) > 70)
                          {{ substr(strip_tags($service->description), 0, 70) . '...' }}
                        @else
                          {{ strip_tags($service->description) }}
                        @endif
                           
                        </p>
    
                        <a href="{{ route('booking') }}" class="btn btn-2">
                            Book Now
                        </a>
    
                        <a href="{{ route('service.slug', ['slug' => $service->slug]) }}" class="btn">
                            Learn More
                        </a>
    
                    </div>
    
                </div>
                @endforeach

        </div>
    </div>
    <section>


    @endsection

    @push('js')
    @endpush
