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
    <link href="{{ asset('assets/frontend/css/services/services.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/services/service-detail.css') }}" rel="stylesheet">
@endpush

@section('content')
{{-- <div class="hero_section">

    <div class="hero_title">
        <h1>Services We Offer You</h1>
    </div>

</div> --}}
<div class="blog_menu">

    <div  class="blog_head">
        <h2 style="color: white" >Service Detail</h2>

        <div class="crumbs">
            <li><a style="color: white" href="{{route('home')}}">Home</a></li>
            <li style="color: white">Service Detail</li>
        </div>
    </div>

        <div class="blog_content">

            <div class="cards">

             
                <div class="card">
                    
                    <div class="card_img">
                        <img src="/image/{{ $service->image }}" >
                       {{-- <img src="{{ asset('assets/frontend/css/blog/image/1.png') }}"  alt="" > --}}
         
                    </div>
                    <h1 style="color: #209ace; text-align:center" >{{$service->name}}</h1>
                    {{-- <p>          


Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum animi facere sit, beatae ipsum repellat tempora commodi veritatis saepe adipisci rerum quidem porro nostrum voluptate amet laboriosam eius! Itaque, ipsum.

                    </p> --}}
                    <p>{{strip_tags($service->description)}}</p>
                </div>

               

            </div>

        </div>

    
</div>


    @endsection

    @push('js')
    @endpush
