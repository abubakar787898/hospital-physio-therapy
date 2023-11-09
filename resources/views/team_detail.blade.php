@extends('layouts.frontend.app')

@section('title', 'team-detail')
@push('meta')
    <meta name="title" content="{{ $team?->meta_title }}">
    <meta name="description" content="{{ $team?->meta_description }}">
    {{-- <meta name="description" content="Your dynamic meta description here"> --}}
    <!-- You can add other meta tags as needed -->
@endpush
{{-- @push('meta')
    <meta name="description" content="{{ $metaDescription }}">
    <!-- You can add other meta tags as needed -->
@endpush --}}
@push('css')
   
    <link href="{{ asset('assets/frontend/css/team/team-detail.css') }}" rel="stylesheet">
@endpush

@section('content')
{{-- <div class="hero_section">

    <div class="hero_title">
        <h1>Services We Offer You</h1>
    </div>

</div> --}}
<div class="blog_menu">

    <div  class="blog_head">
        <h1 style="color: rgb(56 121 145 / 90%); text-align:center; margin-top:10px;"  ><strong>Team Detail</strong></h1>

        {{-- <div class="crumbs">
            <li><a style="color: white" href="{{route('home')}}">Home</a></li>
            <li style="color: white">Team Detail</li>
        </div> --}}
    </div>

      

    <section>
        <div class="team_card-info">

          <div class="card_img">
            <img src="/image/{{ $team->image }}" alt="card_image" width="100%" height="100%">
          </div>

          <div class="card_content">

            <div class="title">
              <h2>{{ $team->title }}</h2>
            </div>

            <div class="detail">
              <h5>Discription :</h5>
              <p>{!! $team->description!!}</p>
            </div>

            {{-- <div class="benefits">
              <h5>Benefits :</h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit debitis, nostrum odio tenetur quisquam tempora quia earum veniam error aliquid voluptatem in delectus perferendis ad!</p>
            </div> --}}
            <div class="links">
                @if (!empty($team->fb_link))
                    <a href="{{ $team->fb_link }}"  target="_blank"  class="card__btn"><i class="fa fa-brand fa-facebook"></i></a>
                @endif
                @if (!empty($team->youtube_link))
                    <a href="{{ $team->youtube_link }}"  target="_blank" class="card__btn"><i class="fa fa-brand fa-youtube"></i></a>
                @endif
                @if (!empty($team->linkedin_link))
                    <a href="{{ $team->linkedin_link }}"  target="_blank" class="card__btn"><i class="fa fa-brand fa-linkedin"></i></a>
                @endif
                @if (!empty($team->insta_link))
                    <a href="{{ $team->insta_link }}" target="_blank"  class="card__btn"><i class="fa fa-brand fa-instagram"></i></a>
                @endif
                @if (!empty($team->twitter_link))
                    <a href="{{ $team->twitter_link }}"  target="_blank" class="card__btn"><i class="fa fa-brand fa-twitter"></i></a>
                @endif
            </div>
            {{-- <div class="links">
              <a href="#" class="fa fa-brand fa-facebook"></a>
              <a href="#" class="fa fa-brand fa-twitter"></a>
              <a href="#" class="fa fa-brand fa-linkedin"></a>
              <a href="#" class="fa fa-brand fa-instagram"></a>
              <a href="#" class="fa fa-brands fa-behance"></a>
            </div> --}}

            <div class="card_btn">
              <a href="#">Book Now</a>
            </div>

            

          </div>

        </div>
      </section>
    
</div>


    @endsection

    @push('js')
    @endpush
