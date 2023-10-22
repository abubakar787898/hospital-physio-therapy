@extends('layouts.frontend.app')

@section('title','Book Now')

@push('css')
    <link href="{{ asset('assets/frontend/css/book-now/booking.css') }}" rel="stylesheet">

    
@endpush

@section('content')
<section>
    <div class="hero_section">

        <div class="hero_title">
            <h1>Lorem ipsum dolor sit amet consectetur.</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta sequi eveniet sit sapiente quisquam praesentium illum eligendi eum repudiandae quidem aliquam dolores ab perspiciatis commodi officiis id iste, fugiat cupiditate!</p>
        </div>

        <div class="hero_content">
            <form action="">

                <div class="form_menu">

                    <span>
                        <label for="date">I'm Available From</label>
                        <input type="date" name="date" id="date">
                    </span>
                    
                <span>
                    <label for="follow">I Want To Book A</label>
                    <select name="follow" id="follow">
                        <option value="Follow Up" hidden>Follow Up</option>
                        <option value="Follow Up" >Follow Up</option>
                        <option value="Follow Up" >Initial Appointment</option>
                        <option value="Follow Up" >Video Consultation</option>
                    </select>
                </span>

                </div>
                
            
            <div class="form_btn">
                <a href="#"><button>Find The Next Available Appointment</button></a>
            </div>

            </form>
        </div>

    </div>

  </section>
<section>


@endsection

@push('js')

@endpush