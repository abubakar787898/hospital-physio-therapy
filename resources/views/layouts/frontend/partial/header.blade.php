
<header>

    <nav class="navbar">

       <div class="brand_logo">
         <a href="index.html">
           <img src="{{ asset('assets/frontend/images/logo real.png') }}" alt="" width="120px" height="95px">
         </a>
             <h2>Physio-Works</h2>
       </div>

       <input type="checkbox" id="check">
       <label for="check" class="checkbtn">
       <img src="Assets/svg/Burger Menu.svg" alt="" width="40px" height="40px">
       </label>

       <ul>
         <a href="index.html"><li>About</li></a>
         <a href="Services/services.html"><li>Services</li></a>
         <a href="Book Now/Book Now.html"><li>Book Now</li></a>
         <a href="Contact/contact.html"><li>Contact</li></a>
         <a href="FAQ/FAQ.html"><li>FAQ</li></a>
       </ul>

   </nav>

  </header>
{{-- <header class="bg-success text-white">
    <div class="container-fluid position-relative no-side-padding">

        <a href="{{ route('home') }}" class="logo">{{ env('APP_NAME') }}</a>

        <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

        <ul class="main-menu visible-on-click" id="main-menu">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('post.index') }}">Posts</a></li>
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                @if(Auth::user()->role->id == 1)
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                @endif
                @if(Auth::user()->role->id == 2)
                    <li><a href="{{ route('author.dashboard') }}">Dashboard</a></li>
                @endif
            @endguest
        </ul><!-- main-menu -->

        <div class="src-area bg-success text-white">
            <form method="GET" action="{{ route('search') }}">
                <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                <input class="src-input" value="{{ isset($query) ? $query : '' }}" name="query" type="text" placeholder="Search">
            </form>
        </div>

    </div><!-- conatiner -->
</header> --}}