@extends('layouts.frontend.app')

@section('title', 'service-detail')
@push('meta')
    <meta name="title" content="{{ $service->meta_title }}">
    <meta name="description" content="{{ $service->meta_description }}">
    {{-- <meta name="description" content="Your dynamic meta description here"> --}}
    <!-- You can add other meta tags as needed -->
@endpush
{{-- @push('meta')
    <meta name="description" content="{{ $metaDescription }}">
    <!-- You can add other meta tags as needed -->
@endpush --}}
@push('css')

    <link href="{{ asset('assets/frontend/css/services/service-detail.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="banner__section">

    <h1 class="title">
       {{$service->name}}
    </h1>

    <div class="url">

        <a href="{{route('home')}}"> <span class="text">
            Home
        </span></a>
        /
        <span>
            Our service
        </span>

    </div>

</div>
{{-- start --}}
<div class="single__service">

    <div class="total__services">

        <h1 class="title">
            Our Services
        </h1>

        <div class="service__list">

            @foreach ($services as $item)
    
                    <a  href="{{ route('service.slug', ['slug' => $item->slug]) }}" class="list text">
                        <img src="/image/{{ $item->image }}" alt="{{$item->name}}">
                        {{$item->name}}
                    </a>
                    @endforeach

        </div>

    </div>

    <div class="service__detail">

        <div class="service__img">
            <img src="/image/{{ $service->image }}" alt=" {{$service->name}}">
        </div>

        <div class="paragraph">
          {!!$service->description !!}
        </div>
{{-- 
        <h1 class="title">
            Maintaining Your Quality of Life
        </h1> --}}

        {{-- <div class="service__maintenance">

            <div class="li">
                <i class="ri-check-double-line"></i>
                No Appointments – Walk-Ins Welcome
            </div>

            <div class="li">
                <i class="ri-check-double-line"></i>
                No Insurance Hassles – $0 Copays
            </div>

            <div class="li">
                <i class="ri-check-double-line"></i>
                Open Evenings & Weekends
            </div>

            <div class="li">
                <i class="ri-check-double-line"></i>
                Quality Care by Licensed Professionals
            </div>

            <div class="li">
                <i class="ri-check-double-line"></i>
                No Insurance Hassles – $0 Copays
            </div>

            <div class="li">
                <i class="ri-check-double-line"></i>
                Open Evenings & Weekends
            </div>

            <div class="li">
                <i class="ri-check-double-line"></i>
                Quality Care by Licensed Professionals
            </div>

            <div class="li">
                <i class="ri-check-double-line"></i>
                No Insurance Hassles – $0 Copays
            </div>

        </div> --}}

    </div>

</div>
{{-- end --}}





    @endsection

    @push('js')
    @endpush
