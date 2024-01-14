@extends('layouts.frontend.app')

@section('title', 'Home')
@push('meta')
    <meta name="title" content="{{ $home?->meta_title }}">
    <meta name="description" content="{{ $home?->meta_description }}">
@endpush
@push('css')
    <link href="{{ asset('assets/frontend/css/home/home.css') }}" rel="stylesheet">

    {{-- <link href="{{ asset('assets/frontend/css/team/team.css') }}" rel="stylesheet"> --}}

    {{-- <link href="{{ asset('assets/frontend/css/home/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet"> --}}
@endpush

@section('content')

    <div class="hero__section">

        <div class="swiper heroSwiper mySwiper">

            <div class="swiper-wrapper">
                @foreach ($sliders as $key => $slider)
                    {{-- <div class="swiper-slide" style="background-image: url(./image/{{ $slider->image }});"> --}}
                    <div class="swiper-slide">

                        <img src="./image/{{ $slider->image }}" class="slide__background">

                        <div class="slide__content">


                            @if (!empty($slider->title))
                                <h1 class="heading" style="color:{{ $slider->title_color }}">{{ $slider->title }}</h1>
                            @endif



                            @if (!empty($slider->description))
                                <p class="paragraph"> {!! $slider->description !!} </p>
                            @endif


                            <div class="hero_btns">

                                <a href="{{env('BOOK_NOW')}}" target="_blank" class="btn hero_btn sec__btn">
                                    Book Now
                                </a>

                                {{-- <a href="#" class="btn">
                                    Contact Us
                                </a> --}}

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
            {{-- <i class="ri-arrow-left-s-line slide__arrow arrow__left"></i>
            <i class="ri-arrow-right-s-line slide__arrow arrow__right"></i> --}}
        </div>
    </div>

    <div class="company__section">

        <div class="swiper mySwiper mySwiperCompany">

            <div class="swiper-wrapper">
                @foreach ($companies as $company)
                    <div class="swiper-slide">
                        <img src="/image/{{ $company->image }}" alt={{ $company->name }}>
                        {{-- <img src="{{ asset('assets/frontend/images/companies/client-logo02.png') }}" alt=""> --}}
                    </div>
                @endforeach
                @foreach ($companies as $company)
                    <div class="swiper-slide">
                        <img src="/image/{{ $company->image }}" alt={{ $company->name }}>
                        {{-- <img src="{{ asset('assets/frontend/images/companies/client-logo02.png') }}" alt=""> --}}
                    </div>
                @endforeach


                {{-- <div class="swiper-slide">
                    <img src="{{ asset('assets/frontend/images/companies/client-logo02.png') }}" alt="">

                </div>

                <div class="swiper-slide">
                    <img src="{{ asset('assets/frontend/images/companies/client-logo03.png') }}" alt="">

                </div>

                <div class="swiper-slide">
                    <img src="{{ asset('assets/frontend/images/companies/client-logo04.png') }}" alt="">

                </div>

                <div class="swiper-slide">
                    <img src="{{ asset('assets/frontend/images/companies/client-logo05.png') }}" alt="">

                </div> --}}

            </div>
        </div>





    </div>
    {{-- <div class="company__section">

  <img src="{{asset('assets/frontend/images/companies/client-logo01.png')}}" alt="">

  <img src="{{asset('assets/frontend/images/companies/client-logo02.png')}}" alt="">

  <img src="{{asset('assets/frontend/images/companies/client-logo03.png')}}" alt="">

  <img src="{{asset('assets/frontend/images/companies/client-logo04.png')}}" alt="">

  <img src="{{asset('assets/frontend/images/companies/client-logo05.png')}}" alt="">

</div> --}}
    {{-- <section>

        <div class="carousel_menu">

            <div class="carousel_content">
                <h1>Life is a Choice<br><span>Do your Best</span></h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia quae vitae id aliquid repellendus
                    veritatis, autem corporis, quidem laborum quos recusandae? Nostrum officiis ipsa corrupti unde adipisci
                    eligendi quidem quam?</p>

                <a href="{{ route('booking') }}">
                    <button>Book Now</button>
                </a>

            </div>

            <div class="my_carousel">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($sliders as $key => $slider)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="/image/{{ $slider->image }}" class="d-block w-100" style="height: 300px;"
                                    alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    @if (!empty($slider->description))
                                        <h5>{!! $slider->description !!}</h5>
                                    @endif
                                    @if (!empty($slider->title))
                                        <h1 style="color:{{$slider->title_color}}">{{ $slider->title }}</h1>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>



        </div>

    </section> --}}

    <div class="service__section">

        <div class="service__header">

            <span class="text">
                Our services
            </span>

            <h1 class="title">
                Hospital Physio Therapy Services
            </h1>

        </div>

        <div class="service__slider">

            <div class="swiper mySwiper mySwiperService">

                <div class="swiper-wrapper">
                    @foreach ($services as $service)
                        <div class="swiper-slide">

                            <div class="service__img">
                                <img src="/image/{{ $service->image }}" alt={{ $service->name }}>
                                <div class="type">
                                    <img src="/image/{{ $service->image }}" alt={{ $service->name }}>
                                </div>
                            </div>

                            <div class="service__content">
                                <h2 class="service__heading">
                                    {{ $service->name }}
                                </h2>
                                <p class="paragraph">
                                    @if (strlen(strip_tags($service->description)) > 72)
                                        {{ substr(strip_tags($service->description), 0, 72) }}
                                    @else
                                        {{ strip_tags($service->description) }}
                                    @endif
                                </p>
                                <a href="{{ route('service.slug', ['slug' => $service?->slug]) }}" class="read">
                                    Read More
                                </a>
                            </div>

                        </div>
                    @endforeach

                </div>

                <div class="swiper-pagination"></div>

            </div>

        </div>

    </div>



    <!-- joins us section  -->



    <div class="about__section">

        <div class="about__img">
            <img src="https://vaidy.themeht.com/wp-content/uploads/2023/02/service-03.jpg" />
        </div>

        <div class="about__content">

            <span class="text">
                About Us
            </span>

            <h1 class="heading">
                {{ $about->title }}
            </h1>

            <p class="paragraph">
                {{ $about->description }}
            </p>

            <a href="{{ route('about') }}" class="btn">
                Read More
            </a>

        </div>

    </div>



    <div class="video__section">
        <a class="video__btn" href="#"><i class="ri-play-mini-fill"></i></a>
        <img src="{{ asset('assets/frontend/images/about/project-img-02.jpg') }}">

    </div>

    <div class="choose__section">

        <div class="choose__content">

            <span class="text">
                Why Choose us
            </span>

            <h1 class="title">
                {{ $home?->title }}
            </h1>

            <p class="paragraph">
                {{ $home?->description }}

            </p>

        </div>

        <div class="choose__card">

            <div class="card">

                <img src="{{ asset('assets/frontend/images/choose/1.png') }}" alt="">

                <span class="choose__heading">
                    Expert Therapist
                </span>

                <p class="paragraph">
                    Finding a Therapist Who Can Help You Heal.
                </p>

            </div>

            <div class="card">

                <img src="{{ asset('assets/frontend/images/choose/2.png') }}" alt="">

                <span class="choose__heading">
                    Trusted Clinic
                </span>

                <p class="paragraph">
                    We are world's best and trusted therapy center.
                </p>

            </div>

            <div class="card">

                <img src="{{ asset('assets/frontend/images/choose/3.png') }}" alt="">

                <span class="choose__heading">
                    Health Guarantee
                </span>

                <p class="paragraph">
                    A health guarantee is a promise from the Therapist.
                </p>

            </div>

            <div class="card">

                <img src="{{ asset('assets/frontend/images/choose/1.png') }}" alt="">

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

            <h1 class="title">
                Meet the Team
            </h1>

        </div>

        <div class="team__card">
            @foreach ($teams as $key => $team)
                <div class="card">

                    <div class="team__img">
                        <img src="/image/{{ $team->image }}" alt="{{$team->title}}">

                        {{-- <div class="social__icon">
                            <i class="ri-share-fill"></i>

                            <div class="icon">
                                @if (!empty($team->fb_link))
                                    <a href="{{ $team->fb_link }}" target="_blank">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                @endif
                                @if (!empty($team->linkedin_link))
                                    <a href="{{ $team->linkedin_link }}" target="_blank">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                @endif
                                @if (!empty($team->insta_link))
                                    <a href="{{ $team->insta_link }}" target="_blank">
                                        <i class="ri-instagram-fill"></i>
                                    </a>
                                @endif
                                @if (!empty($team->twitter_link))
                                    <a href="{{ $team->twitter_link }}" target="_blank">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                @endif
                                @if (!empty($team->youtube_link))
                                    <a href="{{ $team->youtube_link }}" target="_blank">
                                        <i class="ri-youtube-fill"></i>
                                    </a>
                                @endif
                               
                            </div>

                        </div> --}}

                    </div>

                    <div class="card__content">

                        <span class="team__heading">
                            <a href="{{ route('team.slug', ['slug' => $team?->slug]) }}" target="_blank">
                                {{ $team->title }}</a>
                        </span>

                        <span class="text">
                            {{ $team->speciality }}
                        </span>

                    </div>

                </div>
            @endforeach



        </div>

    </div>


    {{-- 
  
    <div class="team_section">

        <div class="team_head">
          <h1 class="title">Our Team</h1>
        </div>
  
          <div class="team_profiles">
            @foreach ($teams as $key => $team)
            <div class="team_card">
    
              <div class="card_top_bg"></div>
  
              <div class="card_img">
                <img src="/image/{{ $team->image }}" alt="profile_img" width="100%" height="100%">
              </div>
    
              <div class="card_info">
                <h3>{{ $team->title }}</h3>
                <p> @if (strlen(strip_tags($team->description)) > 70)
                    {{ substr(strip_tags($team->description), 0, 70) . '...' }}
                  @else
                    {{ strip_tags($team->description) }}
                  @endif</p>
              </div>
              <div class="card_icons">
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
           
  
              <div class="card_btn">
              <a href="{{ route('team.slug', ['slug' => $team?->slug]) }}"  target="_blank">
                <button>Read More</button></a>
              </div>
    
            </div>
  
            @endforeach
  
          </div>
        </div> --}}

@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".heroSwiper", {
            navigation: {
                nextEl: ".ri-arrow-right-s-line",
                prevEl: ".ri-arrow-left-s-line",
            },
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
            },
            loop: true,
        });

        var serviceSwiper = new Swiper(".mySwiperService", {
            slidesPerView: 3,
            spaceBetween: 60,
            grabCursor: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            breakpoints: {
                1010: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                650: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                300: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                // Add more breakpoints if needed for other screen sizes
            }
        });
        var swiperCompany = new Swiper(".mySwiperCompany", {
            spaceBetween: 30,
            slidesPerView: 4,
            centeredSlides: true,
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            breakpoints: {
                1010: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
                650: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                300: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                },
                // Add more breakpoints if needed for other screen sizes
            }
        });
    </script>
@endpush
