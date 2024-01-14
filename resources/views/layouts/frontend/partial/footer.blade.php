 <!-- footer  -->
{{-- 
 <footer>

  <div class="footer_end">

    <div class="footer_list">

      <div class="list_first">

        <div class="footer_logo">
          <a href="{{ route('home') }}">
            <img  src="{{ asset('favicon.svg') }}"  alt="" width="120px" height="100px">
          </a>
          <h3>Hospital Physio Therapy</h3>
        </div>

        <div class="footer_about" style="max-width: 250px">
          <h3>About Us</h3>
          <small>Hospital-Physio-Therapy: Your dedicated partner for personalized physiotherapy, prioritizing your well-being. Visit us to experience tailored care and a journey to optimal health.</small>
        </div>

        <div class="footer_contact">
          <h3>Contact Us</h3>
          <p>+352 {{env('MOBILE_NUMBER')}}</p>
          <a style="color: white" href="mailto:{{env('COMPANY_MAIL')}}">{{env('COMPANY_MAIL')}}</a>
        </div>

    </div>

      <div class="list_sec">
        <h3>Information</h3>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('service') }}">Services</a>
        <a href="{{ route('booking') }}">Book Now</a>
        <a href="{{ route('contact') }}">Contact</a>
        
      </div>

      <div class="list_third">
        <h3>Links</h3>
        <a href="{{ route('service') }}">Services</a>
        <a href="{{ route('contact') }}">Support</a>
      
        <a href="{{ route('booking') }}">
          <button>Book Now</button>
        </a>

      </div>
      
    </div>
  </div>

</footer> --}}

<!-- icons  -->
{{-- <div class="footer_icons">
  <span>
    <a href="#"><i class="fa fa-brand fa-facebook"></i></a>
    <a href="#"><i class="fa fa-brand fa-twitter"></i></a>
    <a href="#"><i class="fa fa-brand fa-linkedin"></i></a>
    <a href="#"><i class="fa fa-brand fa-instagram"></i></a>
  </span>

  <p>Copyright © hospitalphysiotherapy.com 2023</p>
  
</div> --}}
<div class="footer__section">

  <div class="main__footer">

      <div class="footer__container">

          <h1 class="container__heading">
              Our Services
          </h1>

          <div class="footer__links">
@php
    $services = app('App\Models\Services')->take(5)->get(); 
@endphp
@foreach ($services as $item)
<a href="{{ route('service.slug', ['slug' => $item?->slug]) }}" class="link">
    {{ $item?->name }}
</a>
@endforeach
              

              {{-- <a href="{{ route('service') }}" class="link">
                  Chiropractic Therapy
              </a>

              <a href="{{ route('service') }}" class="link">
                  Clinical Pilates
              </a>

              <a href="{{ route('service') }}" class="link">
                  Work Injuries
              </a>

              <a href="{{ route('service') }}" class="link">
                  Massage Therapy
              </a> --}}

          </div>

      </div>

      <div class="footer__container">

          <h1 class="container__heading">
              Useful Link
          </h1>

          <div class="footer__links">

              <a href="{{ route('about') }}" class="link">
                  About Us
              </a>

              <a href="{{ route('service') }}" class="link">
                  Services
              </a>

              <a href="{{env('BOOK_NOW')}}" target="_blank"  class="link">
                  Book Now
              </a>

              <a href="{{ route('our-team') }}" class="link">
                  Our Team
              </a>

              <a href="{{ route('contact') }}" class="link">
                  Contact Us
              </a>

          </div>

      </div>

      <div class="footer__container">

          <h1 class="container__heading">
              Get In Touch
          </h1>

          <div class="footer__links">
        
            
              {{-- <a href="https://www.google.com/maps/search/?q=Hospital, Co. Limerick, Ireland" target="_blank" class="link"> --}}
              <a href="{{env('LOCATION')}}" target="_blank" title="Hospital PhysioTherapy" class="link">
                  <i class="ri-map-pin-fill"></i>
                  Hospital PhysioTherapy Coolscart, Hospital, Co. Limerick, Ireland
              </a>

              <a href="mailto:{{env('COMPANY_MAIL')}}" class="link">
                  <i class="ri-mail-fill"></i>
                  {{env('COMPANY_MAIL')}}
              </a>

              <a href="tel:+352{{env('MOBILE_NUMBER')}}" class="link">
                  <i class="ri-phone-fill"></i>
                 +352 {{env('MOBILE_NUMBER')}}
              </a>
              <a href="tel:+352{{env('MOBILE_NUMBER2')}}" class="link">
                  <i class="ri-phone-fill"></i>
                 +352 {{env('MOBILE_NUMBER2')}}
              </a>
              <a href="{{env('BOOK_NOW')}}" target="_blank" style="background:var(--primary-color)" class="btn">
                Book Now
            </a>
          </div>

      </div>

  </div>

  <div class="footer__copy">

    <span class="copy">
        Copyright © <?php echo date('Y'); ?> All Rights Reserved
    </span>
    

      <div class="footer__icons">

          <a href="{{env('FACEBOOK_LINK')}}" target="_blank">
              <i class="ri-facebook-circle-fill"></i>
          </a>

          {{-- <a href="#">
              <i class="ri-dribbble-line"></i>
          </a> --}}

          <a href="{{env('INSTA_LINK')}}" target="_blank">
              <i class="ri-instagram-fill"></i>
          </a>

          {{-- <a href="#">
              <i class="ri-twitter-x-fill"></i>
          </a>

          <a href="#">
              <i class="ri-linkedin-box-fill"></i>
          </a> --}}

      </div>

  </div>

</div>