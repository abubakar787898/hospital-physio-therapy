@extends('layouts.frontend.app')

@section('title','About-us Hospital PhysioTherapy')
@push('meta')
    <meta name="title" content="{{ $about?->meta_title }}">
    <meta name="description" content="{{ $about?->meta_description }}">
@endpush
@push('css')
{{-- <link href="{{ asset('assets/frontend/css/team/team.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/frontend/css/about/about.css') }}" rel="stylesheet">

    
@endpush

@section('content')

<div class="banner__section">

    <h1 class="title" title="hospital PhysioTherapy">
        About us
    </h1>

    <div class="url">

        <a href="{{route('home')}}"> <span class="text">
            Home
        </span></a>
        /
        <span>
            About Us
        </span>

    </div>

</div>

<div class="about__section">

    <div class="about__img">
       
        <img src="{{asset('assets/frontend/images/about/about.jpg')}}">

    </div>

    <div class="about__content">

        <span class="text">
            About Us
        </span>

        <h1 class="heading">
           {{$about->title}}
        </h1>

        <p class="paragraph">
            {{$about->description}}
        </p>

        <div class="about__list">

            <div class="list">
                <i class="ri-check-double-line"></i>
                <span class="text">
                    Experienced Doctors
                </span>
            </div>

            <div class="list">
                <i class="ri-check-double-line"></i>
                <span class="text">
                    Effective Treatment
                </span>
            </div>

            <div class="list">
                <i class="ri-check-double-line"></i>
                <span class="text">
                    Good Quality Services
                </span>
            </div>

            <div class="list">
                <i class="ri-check-double-line"></i>
                <span class="text">
                    Uniformed, Licensed Plumbers
                </span>
            </div>

            <div class="list">
                <i class="ri-check-double-line"></i>
                <span class="text">
                    Advanced Machines
                </span>
            </div>

            <div class="list">
                <i class="ri-check-double-line"></i>
                <span class="text">
                    Long Term Experience
                </span>
            </div>

        </div>

    </div>

</div>
<div class="vision__section">

    <div class="card">

        <h1 class="heading">
            Our Vision
        </h1>

        <p class="paragraph">
            {{$about->description_1}}
        </p>

    </div>

    <div class="card">

        <h1 class="heading">
            Our Mission
        </h1>

        <p class="paragraph">
            {{$about->description_2}}

        </p>

    </div>

    <div class="card">

        <h1 class="heading">
            Our Philosophy
        </h1>

        <p class="paragraph">
            {{$about->description_3}}

        </p>

    </div>

</div>
<div class="achievement__section">

    <div class="achievement__content">

        <h1 class="heading">
            Our Achievements
        </h1>

        <p class="paragraph">
            {{$about->description_4}}

        </p>

        <div class="achievement__cards">

            <div class="card">

                <img src="images/achivement/1.png" alt="">

                <h1 class="title">
                    100+
                </h1>

                <span class="paragraph">
                    Happy Clients
                </span>

            </div>

            <div class="card">

                <img src="images/achivement/2.png" alt="">

                <h2 class="title">
                    {{ $teams->count() }}+
                </h2>

                <span class="paragraph">
                    Expert Team
                </span>

            </div>

            <div class="card">

                <img src="images/achivement/3.png" alt="">

                <h2 class="title">
                    1878+
                </h2>

                <span class="paragraph">
                    Active Member
                </span>

            </div>

        </div>

    </div>

</div>
<div class="choose__section">

    <div class="choose__content">

        <span class="text">
            Why Choose us
        </span>

        <h2 class="title">
            We offer Treatment to Your Pain
        </h2>

    </div>

    <div class="choose__card">

        <div class="card">

            <img src="{{asset('assets/frontend/images/choose/1.png')}}" alt="">

            <span class="choose__heading">
                Expert Therapist
            </span>

            <p class="paragraph">
                Finding a Therapist Who Can Help You Heal.
            </p>

        </div>

        <div class="card">

            <img src="{{asset('assets/frontend/images/choose/2.png')}}" alt="">

            <span class="choose__heading">
                Trusted Clinic
            </span>

            <p class="paragraph">
                We are world's best and trusted therapy center.
            </p>

        </div>

        <div class="card">

            <img src="{{asset('assets/frontend/images/choose/3.png')}}" alt="">

            <span class="choose__heading">
                Health Guarantee
            </span>

            <p class="paragraph">
                A health guarantee is a promise from the Therapist.
            </p>

        </div>

        <div class="card">

            <img src="{{asset('assets/frontend/images/choose/1.png')}}" alt="">

            <span class="choose__heading">
                Expert Therapist
            </span>

            <p class="paragraph">
                Finding a Therapist Who Can Help You Heal.
            </p>

        </div>

        <div class="card">

            <img src="{{asset('assets/frontend/images/choose/3.png')}}" alt="">

            <span class="choose__heading">
                Health Guarantee
            </span>

            <p class="paragraph">
                A health guarantee is a promise from the Therapist.
            </p>

        </div>

        <div class="card">

            <img src="{{asset('assets/frontend/images/choose/1.png')}}" alt="">

            <span class="choose__heading">
                Expert Therapist
            </span>

            <p class="paragraph">
                Finding a Therapist Who Can Help You Heal.
            </p>

        </div>

    </div>

</div>

<div class="team__section">

    <div class="team__content">

        <span class="text">
            Our Team
        </span>

        <h2 class="title" title="Hospital Physiotherapy Team">
            Meet the Team
        </h2>

    </div>

    <div class="team__card">
        @foreach ($teams as $key => $team)
          <div class="card">
            <a href="{{ route('team.slug', ['slug' => $team?->slug]) }}"  >
              
              <div class="team__img">
                  <img src="/image/{{ $team->image }}" alt="{{ $team->title }}">
    
    
              </div>
    
              <div class="card__content">
    
                  <span class="team__heading">
                    <a href="{{ route('team.slug', ['slug' => $team?->slug]) }}"  > {{ $team->title }}</a>
                  </span>
    
                  <span >
                    <a href="{{ route('team.slug', ['slug' => $team?->slug]) }}" class="text"  >
                    {{ $team->speciality }}
                    </a>
                  </span>
    
              </div>
              
            </a>
          </div>
          @endforeach
    
         
    
      </div>

</div>

@endsection

@push('js')

@endpush