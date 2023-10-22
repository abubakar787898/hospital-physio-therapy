@extends('layouts.frontend.app')

@section('title','Home')

@push('css')
    <link href="{{ asset('assets/frontend/css/home/style.css') }}" rel="stylesheet">

    
@endpush

@section('content')
  
<section>

    <div class="carousel_menu">

      <div class="carousel_content">
        <h1>Life is a Choice<br><span>Do your Best</span></h1>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officia quae vitae id aliquid repellendus veritatis, autem corporis, quidem laborum quos recusandae? Nostrum officiis ipsa corrupti unde adipisci eligendi quidem quam?</p>
        
        <a href="Book Now/Book Now.html">
         <button>Book Now</button>
       </a>

      </div>

      <div class="my_carousel">
  
          <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
              
              <div class="carousel-inner">
      
                <div class="carousel-item active">
                  <img src="{{ asset('assets/frontend/images/image1.jpg') }}" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Join Us Now!</h5>
                    <h1>Power To Achieve</h1>
                  </div>
                </div>
      
                <div class="carousel-item">
                    <img src="{{ asset('assets/frontend/images/image2.jpg') }}" class="d-block w-100" alt="...">
                  <div class="carousel-caption ">
                      <h5>Road To Succes!</h5>
                    <h1>Be Strong</h1>
                  </div>
                </div>
      
                <div class="carousel-item">
                    <img src="{{ asset('assets/frontend/images/image2.jpg') }}" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                      <h5>Visit Us For Help!</h5>
                    <h1>Always Smile</h1>
                  </div>
                </div>


      
              </div>
              

              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
  
      </div>

    </div>

  </section>


 <!-- joins us section  -->
 <div class="joinus_menu">
     <h1>Why Us ?</h1>
     
     <span>
       <p>- One to one attention, with the same physiotherapist each visit</p>
       <p>- Appropriate balance of conventional practices and modern technology</p>
       <p>- Quality care and expert knowledge</p>
       <p>- Ongoing support and compassion</p>
       <p>- Easy Access and Free Parking</p>
     </span>
     
 </div>
@endsection

@push('js')

@endpush