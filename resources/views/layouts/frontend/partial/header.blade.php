<header class="whole__navbar">

    <div class="top__bar">

        <div class="personal__details">

            <a href="https://www.google.com/maps/search/?q=Hospital, Co. Limerick, Ireland" target="_blank" class="text">
                <i class="ri-map-pin-fill"></i>
                Hospital, Co. Limerick,
                Ireland
            </a>

            <a href="mailto: {{env('COMPANY_MAIL')}}" class="text">
                <i class="ri-mail-fill"></i>
               {{env('COMPANY_MAIL')}}
            </a>

        </div>

        <div class="social__links">

            <a href="#" class="social__icon">
                <i class="ri-facebook-circle-fill"></i>
            </a>

            <a href="#" class="social__icon">
                <i class="ri-pinterest-fill"></i>
            </a>

            <a href="#" class="social__icon">
                <i class="ri-linkedin-box-fill"></i>
            </a>

        </div>

    </div>

    <div class="nav__bar">

        <div class="logo">
           <a href="{{ route('home') }}"> <img src="{{asset('logo.png')}}" alt="hospital physio therapy"></a>
        </div>

        <div class="nav__links" id="nav__links">

            <a href="{{ route('home') }}" class="link">
                Home
            </a>

            <a href="{{ route('about') }}" class="link">
                About
            </a>

            <a href="{{ route('our-team') }}"class="link">
                Team
            </a>

            <a href="{{ route('service') }}" class="link">
                Services
            </a>
            <a href="{{ route('booking') }}" class="link">
                Book Now
            </a>

            <a href="{{ route('contact') }}" class="link">
                Contact Us
            </a>

        </div>

        <div class="btns">

            <a href="tel:+352{{env('MOBILE_NUMBER')}}" class="sec__btn">
                <i class="ri-phone-fill"></i>
                <div class="btn__context">
                    <span class="text">
                        Call Now:
                    </span>
                    
                        <span class="number">+352 {{env('MOBILE_NUMBER')}}</span>
                    
                    
                </div>
            </a>

            <a href="{{ route('booking') }}" class="btn">
                Appointment
            </a>
            
            <label for="check" class="menu" id="menuToggler">
                <input type="checkbox" id="checkTo" />
                <span></span>
                <span></span>
                <span></span>
            </label>

        </div>

    </div>

</header>



{{-- <header>

    <nav class="navbar">

       <div class="brand_logo">
         <a href="{{ route('home') }}">
           <img src="{{ asset('favicon.svg') }}" alt="" width="100px" height="60px">
         </a>
             <h2>Hospital Physio Therapy</h2>
       </div>

       <input type="checkbox" id="check">
       <label for="check" class="checkbtn">
       <img src="{{asset('menu_bar.svg')}}" alt="" width="40px" height="40px">
       </label>

       <ul>
         <a href="{{ route('home') }}"><li>Home</li></a>
         <a href="{{ route('about') }}"><li>About</li></a>
         <a href="{{ route('service') }}"><li>Services</li></a>
         <a href="{{ route('booking') }}"><li>Book Now</li></a>
         <a href="{{ route('contact') }}"><li>Contact</li></a>
       
       </ul>

   </nav>

  </header> --}}

<script>
      const _urlStore = "{{ url('/') }}/"
</script>