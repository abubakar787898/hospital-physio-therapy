@extends('layouts.frontend.app')

@section('title','About')

@push('css')
    <link href="{{ asset('assets/frontend/css/faq/faq.css') }}" rel="stylesheet">

    
@endpush

@section('content')
<section>

    <div class="hero_section">

        <div class="hero_title">
            <h1>About</h1>
        </div>

    </div>

  </section>



  <div class="faq_section">

    <div class="faq_head">
        <h1>{{$about->title}}</h1>
    </div>

    <div class="faq_content">

     {!! $about->description !!}

    {{-- <div class="faq_btn">
        <a href="../Book Now/Book Now.html"><button>Book Now</button></a>
    </div> --}}
    
  </div>
  </div>
<section>


@endsection

@push('js')

@endpush