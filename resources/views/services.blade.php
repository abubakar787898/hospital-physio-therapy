@extends('layouts.frontend.app')

@section('title','Serivces')
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
<section>

    <div class="hero_section">

        <div class="hero_title">
            <h1>Services We Offer You</h1>
        </div>

    </div>

  </section>


  <div class="services_menu">

    <div class="service_head">
        <h6>We offer a full range of physiotherapy services catered to match your personal goals</h6>
    </div>

    <div class="service_cards">

        <div class="card_group">

            <div class="card_single">
            
                <div class="card_img">
                    <img src="{{ asset('assets/frontend/images/cardimg.jpg') }}" alt="" width="100%" height="100%">
                </div>

                <div class="card_title">
                    <h5>Manual Therapy</h5>
                </div>

                <div class="card_btn">
                    <a href="#"><button>Learn More</button></a>
                </div>

            </div>

            <div class="card_single">
            
                <div class="card_img">
                    <img src="{{ asset('assets/frontend/images/cardimg1.jpg') }}" alt="" width="100%" height="100%">

                </div>

                <div class="card_title">
                    <h5>Manual Therapy</h5>
                </div>

                <div class="card_btn">
                    <a href="#"><button>Learn More</button></a>
                </div>

            </div>


            <div class="card_single">
            
                <div class="card_img">
                    <img src="{{ asset('assets/frontend/images/cardimg2.jpg') }}" alt="" width="100%" height="100%">

                </div>

                <div class="card_title">
                    <h5>Manual Therapy</h5>
                </div>

                <div class="card_btn">
                    <a href="#"><button>Learn More</button></a>
                </div>

            </div>


            <div class="card_single">
            
                <div class="card_img">
                    <img src="{{ asset('assets/frontend/images/cardimg1.jpg') }}" alt="" width="100%" height="100%">

                </div>

                <div class="card_title">
                    <h5>Manual Therapy</h5>
                </div>

                <div class="card_btn">
                    <a href="#"><button>Learn More</button></a>
                </div>

            </div>


            <div class="card_single">
            
                <div class="card_img">
                    <img src="{{ asset('assets/frontend/images/cardimg2.jpg') }}" alt="" width="100%" height="100%">

                </div>

                <div class="card_title">
                    <h5>Manual Therapy</h5>
                </div>

                <div class="card_btn">
                    <a href="#"><button>Learn More</button></a>
                </div>

            </div>


            <div class="card_single">
            
                <div class="card_img">
                    <img src="{{ asset('assets/frontend/images/cardimg.jpg') }}" alt="" width="100%" height="100%">

                </div>

                <div class="card_title">
                    <h5>Manual Therapy</h5>
                </div>

                <div class="card_btn">
                    <a href="#"><button>Learn More</button></a>
                </div>

            </div>

            

        </div>
        
        <div class="service_btn">
            <a href="../Book Now/Book Now.html">
                <button>Book Now</button>
            </a>
        </div>

    </div>
  </div> 
<section>


@endsection

@push('js')

@endpush