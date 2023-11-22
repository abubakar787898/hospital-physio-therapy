@extends('layouts.frontend.app')

@section('title', 'Contact Us')

@push('css')
    <link href="{{ asset('assets/frontend/css/contact/contact.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/frontend/css/contact/contactform.css') }}" rel="stylesheet"> --}}
@endpush

@section('content')


    <div class="banner__section">

        <h1 class="title">
            Contact Us
        </h1>

        <div class="url">

            <a href="{{ route('home') }}"> <span class="text">
                    Home
                </span></a>
            /
            <span>
                Contact Us
            </span>

        </div>

    </div>

    <div class="contact__header">

        <span class="text">
            Let's get in touch
        </span>

        <h1 class="title">
            Contact With Us
        </h1>

    </div>

    <form action="{{ route('contact-form') }}" method="POST" class="contact__form">
        @csrf


        <input type="text" placeholder="Your Name" class="input" name="name" required/>

        <input type="email" placeholder="Your Email Address" class="input" name="email" required />




        <textarea placeholder="Message" class="input text__area" name="comment"></textarea>

            <input class="btn" type="submit" value="Send Now">
    </form>

    <div class="contact__detail">

      <div class="hospital__detail">

          <div class="detail__container">

              <h1 class="heading">
                  Hours of Operation
              </h1>

              <div class="detail__list">

                  <span class="list">
                      Monday: 7:00am – 6:00pm
                  </span>

                  <span class="list">
                      Monday: 7:00am – 6:00pm
                  </span>

                  <span class="list">
                      Monday: 7:00am – 6:00pm
                  </span>

                  <span class="list">
                      Monday: 7:00am – 6:00pm
                  </span>

                  <span class="list">
                      Monday: 7:00am – 6:00pm
                  </span>

              </div>

          </div>

          <div class="detail__container">

              <h1 class="heading">
                  Email Address
              </h1>

              <div class="detail__list">

                  <span class="list">
                      Xyz@gmail.com
                  </span>

              </div>

          </div>

          <div class="detail__container">

              <h1 class="heading">
                  Location
              </h1>

              <div class="detail__list">

                  <span class="list">
                      423B, Road Wordwide Country, USA
                  </span>

              </div>

          </div>

          <div class="detail__container">

              <h1 class="heading">
                  Phone Number
              </h1>

              <div class="detail__list">

                  <span class="list">
                      +92 123 456 7890
                  </span>

              </div>

          </div>

          <div class="detail__container">

              <h1 class="heading">
                  Follow Us
              </h1>

              <div class="detail__list">

                  <i class="ri-facebook-fill"></i>

                  <i class="ri-instagram-fill"></i>

                  <i class="ri-twitter-fill"></i>

                  <i class="ri-linkedin-fill"></i>

              </div>

          </div>

      </div>

      <iframe class="hospital__map"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52998.130157721724!2d70.31055800936353!3d28.408761029376443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39375be564555555%3A0xf393db635d0b2944!2sAl-Saeed%20Medical%20Complex!5e0!3m2!1sen!2s!4v1700659458067!5m2!1sen!2s"></iframe>

  </div>




    {{-- <div class="main">
        <h1>Contact Us</h1><br>
        <div class="container">
            <div class="content">
                <div class="left-side">
                    <div class="address details">
                        <i style="color: rgb(56 121 145 / 90%)" class="fas fa-map-marker-alt"></i>
                        <div class="topic">Address</div>
                        <div class="text-one">Hospital, Co. Limerick, </div>
                        <div class="text-two">Ireland</div>
                    </div>
                    <div class="phone details">
                        <i style="color: rgb(56 121 145 / 90%)" class="fas fa-phone-alt"></i>
                        <div class="topic">Phone</div>
                        <div class="text-one">+353 {{ env('MOBILE_NUMBER') }}</div>

                    </div>
                    <div class="email details">
                        <i style="color: rgb(56 121 145 / 90%)" class="fas fa-envelope"></i>
                        <div class="topic">Email</div>
                        <div class="text-one">{{ env('COMPANY_MAIL') }}</div>

                    </div>
                </div>
                <div class="right-side">
                    <div class="topic-text">Send us a message</div>
                    <p>If you have any work from me or any types of quries related to my tutorial, you can send me message
                        from here. It's my pleasure to help you.</p>
                    <form action="{{ route('contact-form') }}" method="POST">
                        @csrf
                        <div class="input-box">
                            <input type="text" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="input-box">
                            <input type="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="input-box message-box">
                            <textarea name="comment" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="button">
                            <input type="submit" value="Send Now">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}



@endsection

@push('js')
@endpush
