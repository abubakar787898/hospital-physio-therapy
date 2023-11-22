@extends('layouts.frontend.app')

@section('title', 'teams')

{{-- @push('meta')
    <meta name="description" content="{{ $metaDescription }}">
    <!-- You can add other meta tags as needed -->
@endpush --}}
@push('css')
   
    <link href="{{ asset('assets/frontend/css/team/team.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="banner__section">

  <h1 class="title">
      Our Team
  </h1>

  <div class="url">

     <a href="{{route('home')}}"> <span class="text">
          Home
      </span></a>
      /
      <span>
          Our Team
      </span>

  </div>

</div>


<div class="team__section">

  <div class="team__content">

      <span class="text">
          Our Team
      </span>

      <h1 class="title">
          Meet the Team
      </h1>

  </div>

  <div class="team__card">
    @foreach ($teams as $key => $team)
      <div class="card">

          <div class="team__img">
              <img src="/image/{{ $team->image }}" alt="">

              <div class="social__icon">
                  <i class="ri-share-fill"></i>

                  <div class="icon">
                    @if (!empty($team->fb_link))
                    <a href="{{ $team->fb_link }}"  target="_blank"  >
                      <i class="ri-facebook-fill"></i>
                    </a>
                      @endif
                    @if (!empty($team->linkedin_link))
                    <a href="{{ $team->linkedin_link }}"  target="_blank"  >
                      <i class="ri-linkedin-fill"></i>
                    </a>
                      @endif
                    @if (!empty($team->insta_link))
                    <a href="{{ $team->insta_link }}"  target="_blank"  >
                      <i class="ri-instagram-fill"></i>
                    </a>
                      @endif
                    @if (!empty($team->twitter_link))
                    <a href="{{ $team->twitter_link }}"  target="_blank"  >
                      <i class="ri-twitter-fill"></i>
                    </a>
                      @endif
                    @if (!empty($team->youtube_link))
                    <a href="{{ $team->youtube_link }}"  target="_blank"  >
                      <i class="ri-youtube-fill"></i>
                    </a>
                      @endif
                      {{-- <i class="ri-linkedin-fill"></i>
                      <i class="ri-instagram-fill"></i>
                      <i class="ri-twitter-fill"></i> --}}
                  </div>

              </div>

          </div>

          <div class="card__content">

              <span class="team__heading">
                <a href="{{ route('team.slug', ['slug' => $team?->slug]) }}"  target="_blank"> {{ $team->title }}</a>
              </span>

              <span class="text">
                {{ $team->speciality }}
              </span>

          </div>

      </div>
      @endforeach

     

  </div>

</div>


    @endsection

    @push('js')
    @endpush
