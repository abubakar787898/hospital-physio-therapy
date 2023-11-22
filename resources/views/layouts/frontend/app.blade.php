<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/svg" href="{{ asset('/favicon.svg') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'hospital-physio-therapy') }}</title>
    @stack('meta')
    <!-- Font -->

    {{-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" /> --}}
     
    {{-- <link rel="stylesheet" href="{{ asset('assets/frontend/css/home/header & footer.css') }}">

    <link href="{{ asset('assets/frontend/css/swiper.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/css/ionicons.css') }}" rel="stylesheet"> --}}
    <!-- Stylesheets -->
{{-- new desing --}}
   <!-- ====== Remixicon Cdn Link ====== -->
   <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
   <link rel="stylesheet" href="{{ asset('assets/frontend/css/footer.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/frontend/css/navbar.css') }}">


    @stack('css')
</head>
<body>

@include('layouts.frontend.partial.header')

@yield('content')

@include('layouts.frontend.partial.footer')

<!-- SCIPTS -->
<script src="{{ asset('assets/frontend/js/jquery-3.1.1.min.js') }}"></script>
{{-- <script src="{{ asset('assets/frontend/js/jquery-3.1.1.min.js') }}"></script>

<script src="{{ asset('assets/frontend/js/tether.min.js') }}"></script>

<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/swiper.js') }}"></script>
<script src="{{ asset('assets/frontend/js/scripts.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://kit.fontawesome.com/2ee5c96cad.js" crossorigin="anonymous"></script>
{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif


    var menu = document.getElementById("menuToggler");
var nav__links = document.getElementById("nav__links");

menu.addEventListener("click", function () {
    if (nav__links.classList.contains("active__navLinks")) {
        nav__links.classList.remove("active__navLinks");
    } else {
        nav__links.classList.add("active__navLinks");
    }
});

</script>
@stack('js')
</body>
</html>
