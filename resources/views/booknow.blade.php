@extends('layouts.frontend.app')

@section('title', 'Book Now')

@push('css')
    <link href="{{ asset('assets/frontend/css/book-now/booking.css') }}" rel="stylesheet">
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


    {{-- Start --}}
    <h1 class="title payment__title">
        Please fill all the fields
    </h1>


    {{-- <form class="radio__btns">

        

    </form> --}}

    <!-- ====== Contact Form ====== -->
    <!-- ====== Contact Form ====== -->
    <form action="{{ route('patient-booked') }}" method="POST" class="contact__form form require-validation"
        id="booking_form" data-cc-on-file="false" data-stripe-publishable-key="{{ config('services.stripe.key') }}">

        @csrf

        <h1 class="title">
            Enter Your Appointment Details
        </h1>
        <br>
        <div class="radio__btns">
            <div class="radio__btn">
                <input type="radio" id="COS" class="paymentMethod" name="payment_type" value="cos" checked>
                <label for="COS">COS (Cash on Service)</label>
            </div>

            <div class="radio__btn">
                <input type="radio" id="Online" class="paymentMethod" name="payment_type"  value="online" >
                <label for="Online">Online</label>
            </div>
        </div>
        <br>
        <select class="input" name="appointment">
            <option value="Service Type">Select Appointment Type</option>
            @foreach ($appointment_types as $appointment_type)
                <option value="{{ $appointment_type?->id }}" >{{ $appointment_type->name }}
                </option>
            @endforeach

        </select>

        <select class="input" name="service">
            <option value="Service Type">Select Service Type</option>
            @foreach ($services as $service)
                <option value="{{ $service?->id }}" >{{ $service->name }}
                </option>
            @endforeach
        </select>

        <div class="input__field">
            <span class="input__text">
                Select Date
            </span>
            {{-- <div ></div> --}}

            <input class="input" id="booking_date" type="text" name="booking_date"  required>
        </div>

        <div class="input__field">
            <span class="input__text">
                Select Time
            </span>
            <input class="input" type="time" name="booking_time" id="booking_time"  required>
        </div>
        <select class="input" name="duration">
            <option value="Service Type">Select Duration</option>
            @foreach ($durations as $duration)
                <option value="{{ $duration?->id }}" >{{ $duration->duration . ' Minutes  ' . $duration->amount . '€' }}
                </option>
            @endforeach
        </select>
        <br>
        <h1 class="title">
            Enter Your Personal Details
        </h1>

        <br>

        <div class="input__field">
            <span class="input__text">
                First Name
            </span>
            <input class="input" type="text" name="f_name"  placeholder="First Name" required>
        </div>

        <div class="input__field">
            <span class="input__text">
                Last Name
            </span>
            <input class="input" type="text" name="l_name" placeholder="Last Name"  required>
        </div>

        <div class="input__field">
            <span class="input__text">
                Your Email Address
            </span>
            <input class="input" type="email" name="email"  placeholder="Email" required>
        </div>

        <div class="input__field">
            <span class="input__text">
                Your Mobile Number
            </span>
            <input class="input" type="text" name="mobile" placeholder="Mobile" required>
        </div>

        <div class="input__field">
            <span class="input__text">
                Enter You Age
            </span>
            <input class="input" type="number" name="age"  placeholder="Age" required>
        </div>

        <br>

        <h1 class="heading">
            Enter Your Card Detail
        </h1>

        <div class="contact__form payment__form">

            <div class="input__field">
                <label >Name on Card</label>
                <input class="input" type="text" name="name_on_card"  placeholder="Name on Card">
            </div>
            <div class="input__field">
                <label >Card Number</label>

            <input class="input card-number" autocomplete="off" type="text" size="20" name="card_no"
                placeholder="Card Number">
            </div>
            <div class="input__field">
                <label >CVC Number</label>

            <input class="input card-cvc" type="text" placeholder='ex. 311' size='4' type='text'>
            </div>
            <div class="input__field">
                <label >Expiry Month</label>
            <input class="input card-expiry-month " name="expiry_month" placeholder='MM' size='2' type='text'>
            </div>
            <div class="input__field">
                <label >Expiry Year</label>

            <input class="input card-expiry-year" size='4' type='text' name="expiry_year" placeholder='YYYY'>
            </div>
        </div>


        <textarea class="text__area input" name="comment" placeholder="Additional Info"></textarea>

        <input type="submit" class="btn" value="Submit">


    </form>
    {{-- End --}}

    <link href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/css/datepicker.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/js/datepicker.min.js"></script>




@endsection

@push('js')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>

        document.getElementById('booking_time').addEventListener('change', function() {
            var selectedTime = new Date('2000-01-01T' + this.value);
            var minTime = new Date('2000-01-01T10:30');
            var maxTime = new Date('2000-01-01T17:00');

            if (selectedTime < minTime || selectedTime > maxTime) {
                alert('Invalid time selection. Please choose a time between 10:30 AM and 5:00 PM.');
                this.value = ''; // Clear the invalid value
            }
        });
        const today = new Date();
        const elem = document.querySelector('#booking_date');

        const datepicker = new Datepicker(elem, {
            pickLevel: 0,
            daysOfWeekDisabled: [0, 6],

        });



        window.addEventListener('DOMContentLoaded', (event) => {
            const radioButtons = document.querySelectorAll('.paymentMethod');
            const paymentForm = document.querySelector('.contact__form.payment__form');
            const cardDetailHeading = document.querySelector('.heading');

            radioButtons.forEach(radioButton => {
                radioButton.addEventListener('change', function() {
                    if (radioButton.id === 'COS' && radioButton.checked) {
                        paymentForm.style.display = 'none';
                        cardDetailHeading.style.display = 'none';
                    } else {
                        paymentForm.style.display = 'grid';
                        cardDetailHeading.style.display = 'block';
                    }
                });
            });
        });

        // stripe payment
       
        $(function() {
        
          
        
        /*------------------------------------------
    
        --------------------------------------------
    
        Stripe Payment Code
    
        --------------------------------------------
    
        --------------------------------------------*/
    
        var $form = $(".require-validation");

$('form.require-validation').bind('submit', function (e) {

    var $form = $(".require-validation"),

        inputSelector = ['input[type=email]', 'input[type=password]',
            'input[type=text]', 'input[type=file]',
            'textarea'].join(', '),

        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        paymentType = $('input[name=payment_type]:checked').val(),  // Get the selected payment type

        valid = true;

    $errorMessage.addClass('hide');

    $('.has-error').removeClass('has-error');

    $inputs.each(function (i, el) {
        var $input = $(el);

        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
        }
    });

    // Check payment type and skip payment processing if 'COS' is selected
    if (paymentType !== 'cos' && !$form.data('cc-on-file')) {
        e.preventDefault();
        Stripe.setPublishableKey($form.data('stripe-publishable-key'));

        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
    }

});

    
        // var $form = $(".require-validation");
    
         
    
        // $('form.require-validation').bind('submit', function(e) {
    
        //     var $form = $(".require-validation"),
    
        //     inputSelector = ['input[type=email]', 'input[type=password]',
    
        //                      'input[type=text]', 'input[type=file]',
    
        //                      'textarea'].join(', '),
    
        //     $inputs = $form.find('.required').find(inputSelector),
    
        //     $errorMessage = $form.find('div.error'),
    
        //     valid = true;
    
        //     $errorMessage.addClass('hide');
    
        
    
        //     $('.has-error').removeClass('has-error');
    
        //     $inputs.each(function(i, el) {
    
        //       var $input = $(el);
    
        //       if ($input.val() === '') {
    
        //         $input.parent().addClass('has-error');
    
        //         $errorMessage.removeClass('hide');
    
        //         e.preventDefault();
    
        //       }
    
        //     });
    
         
    
        //     if (!$form.data('cc-on-file')) {
    
        //       e.preventDefault();
    
        //       Stripe.setPublishableKey($form.data('stripe-publishable-key'));
    
        //       Stripe.createToken({
    
        //         number: $('.card-number').val(),
    
        //         cvc: $('.card-cvc').val(),
    
        //         exp_month: $('.card-expiry-month').val(),
    
        //         exp_year: $('.card-expiry-year').val()
    
        //       }, stripeResponseHandler);
    
        //     }
    
        
    
        // });
    
          
    
        /*------------------------------------------
    
        --------------------------------------------
    
        Stripe Response Handler
    
        --------------------------------------------
    
        --------------------------------------------*/
    
        function stripeResponseHandler(status, response) {
    
            if (response.error) {
    
                $('.error')
    
                    .removeClass('hide')
    
                    .find('.alert')
    
                    .text(response.error.message);
    
            } else {
    
                /* token contains id, last4, and card type */
    
                var token = response['id'];
    
                     
    
                $form.find('input[type=text]').empty();
    
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
    
                $form.get(0).submit();
    
            }
    
        }
    
         
    
    });

    </script>
@endpush
