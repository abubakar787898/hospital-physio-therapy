@extends('layouts.frontend.app')

@section('title', 'Book Now Form')

@push('css')
    {{-- <link href="{{ asset('assets/frontend/css/book-now/booking.css') }}" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="{{ asset('assets/frontend/css/book-now/booking-form.css') }}" rel="stylesheet"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endpush

@section('content')

    <style>
        .booking__header {
            margin-top: 64px;
            display: flex;
            align-items: center;
            flex-direction: column;
            color: var(--white-color);
            background: var(--primary-color);

            gap: 24px;

            padding: 32px 6vw
        }

        .top__content {
            display: flex;
            align-self: center;
            flex-direction: column;

            color: var(--white-color);

            .paragraph,
            .title {
                color: var(--white-color);
                text-align: center;
            }
        }

        .detail__booking {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 32px;
        }

        .detail {
            display: flex;
            flex-direction: column;
            gap: 10px;
            font-size: 24px;

            .paragraph{
                color: var(--white-color);
                font-size: 24px;
                font-weight: 800;
            }
        }

        .contact__form {
            padding: 60px 6vw;
            display: grid;

            gap: 32px;

            grid-template-columns: repeat(2, 1fr);

            .input {
                padding: 14px;
                border-radius: 4px;
                outline: none;

                border: 1px solid rgba(0, 0, 0, 0.1);

                font-size: 16px;
            }

            .input:nth-child(7) {
                grid-column: 1;
                grid-column-end: 3;
            }

            .input::placeholder {
                font-size: 16px;
                color: var(--dark-color);
            }

            .text__area {
                outline: none;
                border-radius: 4px;
                grid-column: 1;
                grid-column-end: 3;

                height: 240px;

                resize: none;
            }


            .btn {
                text-align: center;
                grid-column: 1;
                grid-column-end: 3;
                border: 0;
                outline: 0;

                cursor: pointer;

                width: 100%;

                color: var(--white-color);
            }
        }
    </style>

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

    <div class="booking__header">

        <div class="top__content">
            <h1 class="title">Your Details</h1>
            <p class="paragraph">Please enter your details to finalize your booking.</p>
        </div>

        <h4>Your Booking Details</h4>

        <div class="detail__booking">

            <div class="detail">
                <h6>Treatment:</h6>
                <p class="paragraph">{{ $data->appointment_type->name }}</p>
            </div>

            <div class="detail">
                <h6>Date:</h6>
                <p class="paragraph">{{ \Carbon\Carbon::parse($data->date)->format('l, F j, Y') }}</p>
            </div>

            <div class="detail">
                <h6>Time:</h6>
                <p class="paragraph">{{ \Carbon\Carbon::parse($data->from_time)->format('h:i A') . ' to ' . \Carbon\Carbon::parse($data->to_time)->format('h:i A') }}
                </p>
            </div>

            <div class="detail">
                <h6>Amount:</h6>
                <p class="paragraph">€{{ $data->price }}
                </p>
            </div>

        </div>

    </div>





    {{-- <h1>Plz Fill All Fields</h1> --}}
    <div class="booking_form">


        <form action="{{ route('patient-booked') }}" method="POST" class="contact__form form">
            @csrf

            <input class="input" type="hidden" name="slot_id" value="{{ $data->id }}">

            <input class="input" type="text" id="fname" name="f_name" placeholder="First Name"  required>

            <input class="input" type="text" id="lname" name="l_name" placeholder="Last Name"  required>

            <input class="input" type="email" id="email" name="email" placeholder="Email"  required>

            <input class="input" type="text" id="phone" name="mobile" placeholder="Mobile" required >

            <input class="input" type="number" id="age" name="age" placeholder="Age" required >

            <textarea class="text__area input" name="message" id="message" rows="6" placeholder="Message"></textarea>

            <input type="submit" class="btn" name="submit" id="submit">

        </form>

        {{-- <div class="container">







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



                                <form role="form" action="{{ route('stripe.post') }}" method="post"
                                    class="require-validation" data-cc-on-file="false"
                                    data-stripe-publishable-key="{{ config('services.stripe.key') }}" id="payment-form">

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
                                                class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                type='text'>

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



            </div> --}}







    @endsection

    @push('js')
    @endpush
