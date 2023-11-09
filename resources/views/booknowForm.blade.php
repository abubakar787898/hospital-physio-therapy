@extends('layouts.frontend.app')

@section('title', 'Book Now Form')

@push('css')
    {{-- <link href="{{ asset('assets/frontend/css/book-now/booking.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/frontend/css/book-now/booking-form.css') }}" rel="stylesheet">
@endpush

@section('content')


    <section>
        <div class="booking_section">

            <div class="booking_title">
                <h1>Your Details</h1>
                <p>Please enter your details to finalize your booking.</p>
            </div>

            <div class="booking_deatils">
                <h4>Your Booking Details</h4>

                <div class="booking_info">

                    <div class="info">
                        <span>
                            <h6>Treatment:</h6>
                            <p>{{ $data->appointment_type->name }}</p>
                        </span>

                        <span>
                            <h6>Date:</h6>
                            <p>{{ \Carbon\Carbon::parse($data->date)->format('l, F j, Y') }}</p>
                        </span>
                    </div>

                    <div class="info">
                        <span>
                            <h6>Time:</h6>
                            <p>{{ \Carbon\Carbon::parse($data->from_time)->format('h:i A') . ' to ' . \Carbon\Carbon::parse($data->to_time)->format('h:i A') }}
                            </p>
                        </span>
                        {{-- 
            <span>
              <h6>With:</h6>
              <p>Kevin Hartin</p>
            </span> --}}
                    </div>

                </div>

            </div>

        </div>
    </section>
 




        <div class="booking_form">



            <form action="{{ route('patient-booked') }}" method="POST" class="row g-3 needs-validation  ">
                @csrf

                <input type="hidden" name="slot_id" value="{{ $data->appointment_type_id }}">
                <div class="fields">
                    <span>
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="f_name" placeholder="First Name">
                    </span>

                    <span>
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="l_name"  placeholder="Last Name">
                    </span>
                </div>

                <div class="fields">
                    <span>
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Email">
                    </span>

                    <span>
                        <label for="phone">Mobile Number</label>
                        <input type="text" id="phone" name="mobile" placeholder="Mobile">
                    </span>
                </div>
                <div class="fields">
                    <span>
                        <label for="age">Age</label>
                        <input type="number" id="age" name="age" placeholder="Age">
                    </span>


                </div>

                <div class="text_field">
                    <textarea name="message" id="message" rows="6" placeholder="....."></textarea>
                </div>

                <input type="submit" name="submit" id="submit">









            </form>


        </div>


     

    </section>
    <section>


    @endsection

    @push('js')
    @endpush
