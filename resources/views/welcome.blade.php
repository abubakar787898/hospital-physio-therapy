@extends('layouts.frontend.app')

@section('title', 'Home')
@push('meta')
    <meta name="title" content="{{ $home?->meta_title }}">
    <meta name="description" content="{{ $home?->meta_description }}">
 
@endpush
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

    </section>
   

 
    <div class="services_section team_section">

        <div class="service_head">
           <h1 class="title">Our Services</h1>
        </div>
      
        <div class="services_menu">
          <div class="cover">
            <button class="left" onclick="leftScroll()">
              <i class="fas fa-angle-double-left"></i>
            </button>
      
            <div class="scroll-images">
      
                @foreach ($services as $service)
              <div class="child">
                <div class="card_img">
                  <img src="/image/{{ $service->image }}" alt="" width="100%" height="100%">
                </div>
                <div class="card_text">
                  <h4>  {{ $service->name }}</h4>
                  <p> @if (strlen(strip_tags($service->description)) > 70)
                    {{ substr(strip_tags($service->description), 0, 70) . '...' }}
                  @else
                    {{ strip_tags($service->description) }}
                  @endif</p>
                </div>
                <div class="card_btn">
                  <a href="{{ route('booking') }}"><button>Book Now</button></a>
                  <a href="{{ route('service.slug', ['slug' => $service?->slug]) }}"><button>Read more</button></a>
                </div>
              </div>
              @endforeach
             
      
              
            </div>
            
            <button class="right" onclick="rightScroll()">
              <i class="fas fa-angle-double-right"></i>
            </button>
          </div>
        </div>
      </div>
    {{-- <h2 class="title">
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

    </div> --}}
    
    <!-- joins us section  -->
    {{-- <div class="joinus_menu"> --}}
        <div class="container" style="padding: 30px; border-radius: 15px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);">
            <h1 class="title">{{$home->title}}</h1>
        
            <div>
                {!! $home->description !!}
            </div>
        </div>
        
        

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
        </div>
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
    <script src="https://kit.fontawesome.com/2ee5c96cad.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    const scrollImages = document.querySelector(".scroll-images");
    const scrollLength = scrollImages.scrollWidth - scrollImages.clientWidth;
    const leftButton = document.querySelector(".left");
    const rightButton = document.querySelector(".right");
  
    function checkScroll() {
      const currentScroll = scrollImages.scrollLeft;
      if (currentScroll === 0) {
        leftButton.setAttribute("disabled", "true");
        rightButton.removeAttribute("disabled");
      } else if (currentScroll === scrollLength) {
        rightButton.setAttribute("disabled", "true");
        leftButton.removeAttribute("disabled");
      } else {
        leftButton.removeAttribute("disabled");
        rightButton.removeAttribute("disabled");
      }
    }
  
    scrollImages.addEventListener("scroll", checkScroll);
    window.addEventListener("resize", checkScroll);
    checkScroll();
  
    function leftScroll() {
      scrollImages.scrollBy({
        left: -200,
        behavior: "smooth"
      });
    }

    function rightScroll() {
      scrollImages.scrollBy({
        left: 200,
        behavior: "smooth"
      });
    }
  
    leftButton.addEventListener("click", leftScroll);
    rightButton.addEventListener("click", rightScroll);
  });

    </script>
    {{-- <script>
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
    </script> --}}
@endpush
