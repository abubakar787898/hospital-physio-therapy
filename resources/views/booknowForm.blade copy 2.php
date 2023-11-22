@extends('layouts.frontend.app')

@section('title', 'Book Now Form')

@push('css')
    {{-- <link href="{{ asset('assets/frontend/css/book-now/booking.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="{{ asset('assets/frontend/css/book-now/booking-form.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endpush

@section('content')


    <div class="banner__section">

        <h1 class="title">
            Book Now
        </h1>

        <div class="url">

            <a href="{{ route('home') }}"> <span class="text">
                    Home
                </span></a>
            /
            <span>
                Book Now
            </span>

        </div>

    </div>

    <section>
        <div class="booking_section">

            <div class="booking__title">
                <h1 class="title">Your Details</h1>
                <p class="paragraph">Please enter your details to finalize your booking.</p>
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
                    <div class="info">
                        <span>
                            <h6>Amount:</h6>
                            <p>€{{ $data->price }}
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





    {{-- <h1>Plz Fill All Fields</h1> --}}
    <div class="booking_form">


        <form action="{{ route('patient-booked') }}" method="POST" class="form">
            @csrf

            <input type="hidden" name="slot_id" value="{{ $data->id }}">
            <div class="fields">
                <span>
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="f_name" placeholder="First Name">
                </span>

                <span>
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="l_name" placeholder="Last Name">
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
    <div class="container">







        <div class="row">

            <div class="col-md-6 col-md-offset-3">

                <div class="panel panel-default credit-card-box">

                    <div class="panel-heading display-table">

                        <h3 class="panel-title">Payment Details</h3>

                    </div>

                    <div class="panel-body">



                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">

                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

                                <p>{{ Session::get('success') }}</p>

                            </div>
                        @endif



                        <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                            data-cc-on-file="false" data-stripe-publishable-key="{{ config('services.stripe.key') }}"
                            id="payment-form">

                            @csrf



                            <div class='form-row row'>

                                <div class='col-xs-12 form-group required'>

                                    <label class='control-label'>Name on Card</label> <input class='form-control'
                                        size='4' type='text'>

                                </div>

                            </div>



                            <div class='form-row row'>

                                <div class='col-xs-12 form-group card required'>

                                    <label class='control-label'>Card Number</label> <input autocomplete='off'
                                        class='form-control card-number' size='20' type='text'>

                                </div>

                            </div>



                            <div class='form-row row'>

                                <div class='col-xs-12 col-md-4 form-group cvc required'>

                                    <label class='control-label'>CVC</label> <input autocomplete='off'
                                        class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>

                                </div>

                                <div class='col-xs-12 col-md-4 form-group expiration required'>

                                    <label class='control-label'>Expiration Month</label> <input
                                        class='form-control card-expiry-month' placeholder='MM' size='2'
                                        type='text'>

                                </div>

                                <div class='col-xs-12 col-md-4 form-group expiration required'>

                                    <label class='control-label'>Expiration Year</label> <input
                                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                        type='text'>

                                </div>

                            </div>



                            <div class='form-row row'>

                                <div class='col-md-12 error form-group hide'>

                                    <div class='alert-danger alert'>Please correct the errors and try

                                        again.</div>

                                </div>

                            </div>



                            <div class="row">

                                <div class="col-xs-12">

                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now
                                        ($100)</button>

                                </div>

                            </div>



                        </form>

                    </div>

                </div>

            </div>

        </div>



    </div>




    </section>



@endsection

@push('js')
@endpush
