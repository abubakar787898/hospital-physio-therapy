@extends('layouts.frontend.app')

@section('title', 'Home')

@push('css')
    <link href="{{ asset('assets/frontend/css/home/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />


    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
@endpush

@section('content')

    <section>

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
                                        <h5>{!! \Illuminate\Support\Str::limit($slider->description, 10) !!}</h5>
                                    @endif
                                    @if (!empty($slider->title))
                                        <h1>{{ \Illuminate\Support\Str::limit($slider->title, 10) }}</h1>
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

    </section>
   

    <style>
     
    </style>

    <h2 class="title">
        Our Services
    </h2>

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

                    <a href="{{ route('booking') }}"class="btn btn-2">
                        Book Now
                    </a>

                    <a href="{{ route('service.slug', ['slug' => $service->slug]) }}" class="btn">
                        Learn More
                    </a>

                </div>

            </div>
        @endforeach

    </div>
    
    <!-- joins us section  -->
    <div class="joinus_menu">
        <h1 class="title">Why Us ?</h1>

        <span>
            <p>- One to one attention, with the same physiotherapist each visit</p>
            <p>- Appropriate balance of conventional practices and modern technology</p>
            <p>- Quality care and expert knowledge</p>
            <p>- Ongoing support and compassion</p>
            <p>- Easy Access and Free Parking</p>
        </span>

    </div>

    <section class="swiper mySwiper">
        <h1 class="title">Our Team</h1>
        <div class="swiper-wrapper">

            @foreach ($teams as $key => $team)
                <div class="team__card swiper-slide">
                    <div class="card__image">
                        <img src="/image/{{ $team->image }}" alt="card image">
                    </div>

                    <div class="card__content">
                        <span class="card__title">{{ $team->title }}</span>
                        {{-- <span class="card__name">Vanessa Martinez</span> --}}
                        <p class="card__text">{!! $team->description !!}<br> </p>
                        {{-- <a href="#" style=" text-align:center">View More</a> --}}
                    </div>

                    <div class="icons">
                        @if (!empty($team->fb_link))
                            <a href="{{ $team->fb_link }}" class="card__btn"><i class="ri-facebook-fill"></i></a>
                        @endif
                        @if (!empty($team->youtube_link))
                            <a href="{{ $team->youtube_link }}" class="card__btn"><i class="ri-youtube-fill"></i></a>
                        @endif
                        @if (!empty($team->linkedin_link))
                            <a href="{{ $team->linkedin_link }}" class="card__btn"><i class="ri-linkedin-fill"></i></a>
                        @endif
                        @if (!empty($team->insta_link))
                            <a href="{{ $team->insta_link }}" class="card__btn"><i class="ri-instagram-fill"></i></a>
                        @endif
                        @if (!empty($team->twitter_link))
                            <a href="{{ $team->twitter_link }}" class="card__btn"><i class="ri-twitter-fill"></i></a>
                        @endif
                    </div>
                </div>
            @endforeach


        </div>
    </section>
    {{-- <div class="container text-center py-5">
  <h3 >Building Team</h3>
  <h4 class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, explicabo.</h4>
  <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
      <div class="col">
        <div class="card">
          <img src="{{ asset('assets/frontend/images/image1.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Leanne Graham</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis, neque.</p>
          </div>
          <div class="d-flex justify-content-evenly p-4">
              <i class="bi bi-facebook"></i>
              <i class="bi bi-linkedin"></i>
              <i class="bi bi-envelope-fill"></i>
              <i class="bi bi-whatsapp"></i>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="{{ asset('assets/frontend/images/image1.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Leanne Graham</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis, neque.</p>
          </div>
          <div class="d-flex justify-content-evenly p-4">
              <i class="bi bi-facebook"></i>
              <i class="bi bi-linkedin"></i>
              <i class="bi bi-envelope-fill"></i>
              <i class="bi bi-whatsapp"></i>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="{{ asset('assets/frontend/images/image1.jpg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Leanne Graham</h5>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Blanditiis, neque.</p>
          </div>
          <div class="d-flex justify-content-evenly p-4">
              <i class="bi bi-facebook"></i>
              <i class="bi bi-linkedin"></i>
              <i class="bi bi-envelope-fill"></i>
              <i class="bi bi-whatsapp"></i>
          </div>
        </div>
      </div>
   
    </div>
</div> --}}
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {

            loop: true,
            autoplay: true,
            autoplayTimeout: 1000, //2000ms = 2s;
            autoplayHoverPause: true,

            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 300,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>
@endpush
