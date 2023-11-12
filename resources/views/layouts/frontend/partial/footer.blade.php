 <!-- footer  -->

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
        {{-- <a href="FAQ/FAQ.html">FAQ</a> --}}
      </div>

      <div class="list_third">
        <h3>Links</h3>
        <a href="{{ route('service') }}">Services</a>
        <a href="{{ route('contact') }}">Support</a>
        {{-- <a href="#">Privacy Policy</a>
        <a href="#">Terms & Conditions</a> --}}
        <a href="{{ route('booking') }}">
          <button>Book Now</button>
        </a>

      </div>
      
    </div>
  </div>

</footer>

<!-- icons  -->
<div class="footer_icons">
  <span>
    <a href="#"><i class="fa fa-brand fa-facebook"></i></a>
    <a href="#"><i class="fa fa-brand fa-twitter"></i></a>
    <a href="#"><i class="fa fa-brand fa-linkedin"></i></a>
    <a href="#"><i class="fa fa-brand fa-instagram"></i></a>
  </span>

  <p>Copyright © hospitalphysiotherapy.com 2023</p>
  
</div>
 {{-- <footer>

    <div class="footer_end">

      <div class="footer_list">

        <div class="list_first">
          <a href="index.html">
            <img src="{{ asset('assets/frontend/images/logo real.png') }}" alt="" width="120px" height="100px">
          </a>
          <h3>Physio-Therapy</h3>
      </div>

        <div class="list_sec">
          <h3>Explore More</h3>
          <a href="index.html">About</a>
          <a href="Services/services.html">Services</a>
          <a href="Book Now/Book Now.html">Book Now</a>
          <a href="Contact/contact.html">Contact</a>
          <a href="FAQ/FAQ.html">FAQ</a>
        </div>
  
        <div class="list_third">
          <h3>Read More</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus nihil pariatur, hic perspiciatis reprehenderit magni, veniam nesciunt tempora natus quisquam iure nostrum quod eligendi eum labore aut eos aliquid consectetur.

          </p>
        </div>
        
      </div>
    </div>

  </footer>

  <!-- icons  -->
  <div class="footer_icons">
    <a href="#"><i class="fa fa-brand fa-facebook"></i></a>
    <a href="#"><i class="fa fa-brand fa-twitter"></i></a>
    <a href="#"><i class="fa fa-brand fa-linkedin"></i></a>
    <a href="#"><i class="fa fa-brand fa-instagram"></i></a>
  </div> --}}
