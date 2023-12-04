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
<div class="banner__section">

  <h1 class="title">
      {{$team->title}}
  </h1>

  <div class="url">

    <a href="{{route('home')}}"> <span class="text">
      Home
  </span></a>
      /
      <span>
        Team
      </span>

  </div>

</div>

<div class="team__section">

  <div class="team__img">

      <div class="member__img">

          <img src="/image/{{ $team->image }}" alt="{{$team->title}}" />

      </div>

      <div class="member__detail">

          <div class="detail__list">
            @if (!empty($team->phone))
              <span class="list">
                  <span class="text">
                      Phone:
                  </span>
                {{$team->phone}}
              </span>
              @endif
            @if (!empty($team->email))
              <span class="list">
                  <span class="text">
                      Email:
                  </span>
                {{$team->email}}
              </span>
              @endif
            @if (!empty($team->speciality))
              <span class="list">
                  <span class="text">
                    Specialist:
                  </span>
                {{$team->speciality}}
              </span>
              @endif
            @if (!empty($team->experience))
              <span class="list">
                  <span class="text">
                    Experience:
                  </span>
                {{$team->experience}}
              </span>
              @endif
            

          </div>
          {{-- <div class="social__icon">
         

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
          
            </div>

        </div> --}}
          {{-- <div class="social__icons">

              <i class="ri-facebook-fill"></i>

              <i class="ri-twitter-fill"></i>

              <i class="ri-instagram-fill"></i>

              <i class="ri-linkedin-fill"></i>

          </div> --}}

      </div>

  </div>

  <div class="team__content">
    {!!$team->description !!}
      {{-- <h1 class="heading">
          Personal Experience & Biography
      </h1>

      <p class="paragraph">
          As the nation’s largest network of chiropractors, we pride ourselves on providing convenient and
          affordable chiropractic care focused on your unique needs and goals. Whether you’re seeking pain relief
          or preventative care, you can expect our patient-centric approach to be new and different from any
          healthcare experience you’ve had before. Perhaps even life-changing.
      </p>

      <h1 class="heading">
          Therapist Qualifications
      </h1>

      <p class="paragraph">
          Our entire team is upbeat and positive. We give every patient our full attention and energy. Patients
          feel safe, welcome and heard in our office. Everything about our practice and our care is healing,
          empowering and uplifting. Countless patients have told us we’re the first place where a doctor took the
          time to listen to them.
      </p> --}}

      <div class="single__cards">

          <div class="card">
            <img src="{{asset('assets/frontend/images/choose/1.png')}}" alt="">

              <h1 class="card__subheading">
                  Trusted Clinic
              </h1>
              <p class="paragraph">
                  Setting therapy goals will give you a sense of direction.
              </p>
          </div>

          <div class="card">
            <img src="{{asset('assets/frontend/images/choose/2.png')}}" alt="">

              <h1 class="card__subheading">
                  Emergency
              </h1>
              <p class="paragraph">
                  Chiropractic care may help you. Contact us today!
              </p>
          </div>

          <div class="card">
            <img src="{{asset('assets/frontend/images/choose/3.png')}}" alt="">

              <h1 class="card__subheading">
                  Free Estimates
              </h1>
              <p class="paragraph">
                  Fill Appointment form and get Free Estimates.
              </p>
          </div>

      </div>

  </div>

</div>


</div>


    @endsection

    @push('js')
    @endpush
