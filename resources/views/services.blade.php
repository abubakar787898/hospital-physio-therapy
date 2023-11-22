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
<div class="banner__section">

    <h1 class="title">
        Our services
    </h1>

    <div class="url">

        <a href="{{route('home')}}"> <span class="text">
            Home
        </span></a>
        /
        <span>
            Our services
        </span>

    </div>

</div>


{{-- start --}}
<div class="services__section">

    <div class="services__content">

        <span class="text">
            Our services
        </span>

        <h1 class="title">
            Services We Provide
        </h1>

    </div>

    <div class="services__card">
        @foreach ($services as $service)
        <div class="card">

            <div class="services__img">
                <img src="/image/{{ $service->image }}" alt="{{ $service->name}}">
            </div>

            <div class="card__content">

                <a href="servicesSingle.html" class="services__heading">
                    {{ $service->name}}
                </a>

                <a href="servicesSingle.html" class="text">
                    @if (strlen(strip_tags($service->description)) > 72)
                    {{ substr(strip_tags($service->description), 0, 72)   }}
                  @else
                    {{ strip_tags($service->description) }}
                  @endif
                </a>
                <a href="{{ route('service.slug', ['slug' => $service->slug]) }}" class="text">
                    Read More
                </a>
            

            </div>

        </div>
@endforeach


    </div>

</div>
{{-- end --}}






  


    @endsection

    @push('js')
    @endpush
