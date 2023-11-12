@extends('layouts.frontend.app')

@section('title','Contact Us')

@push('css')
    {{-- <link href="{{ asset('assets/frontend/css/contact/contact.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/frontend/css/contact/contactform.css') }}" rel="stylesheet">

    
@endpush

@section('content')

<div class="main">
  <h1>Contact Us</h1><br>
<div class="container">
  <div class="content">
    <div class="left-side">
      <div class="address details">
        <i style="color: rgb(56 121 145 / 90%)"  class="fas fa-map-marker-alt"></i>
        <div class="topic">Address</div>
        <div class="text-one">Hospital, Co. Limerick, </div>
        <div class="text-two">Ireland</div>
      </div>
      <div class="phone details">
        <i style="color: rgb(56 121 145 / 90%)"  class="fas fa-phone-alt"></i>
        <div  class="topic">Phone</div>
        <div class="text-one">+353 {{env('MOBILE_NUMBER')}}</div>
        
      </div>
      <div class="email details">
        <i style="color: rgb(56 121 145 / 90%)" class="fas fa-envelope"></i>
        <div class="topic">Email</div>
        <div class="text-one">{{env('COMPANY_MAIL')}}</div>
     
      </div>
    </div>
    <div class="right-side">
      <div class="topic-text">Send us a message</div>
      <p>If you have any work from me or any types of quries related to my tutorial, you can send me message from here. It's my pleasure to help you.</p>
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
        <input type="submit" value="Send Now" >
      </div>
    </form>
  </div>
  </div>
</div>
</div>
{{-- <section>
    <div class="hero_section">

      <div class="hero_title">
        <h1>Come Find Us</h1>
      </div>

    </div>
  </section>


  <!-- visit us section  -->
  
  <div class="visit_section">

    <div class="visit_head">
      <h2>Visit Our Clinic at Mungret College</h2>
    </div>

    <div class="visit_menu">

      <div class="visit_content">

        <div class="visit_title">
          <h5>Ameneties at Mungret College :</h5>
          <ul>
            <li>Free Parking</li>
            <li>Coffee Shop</li>
            <li>Public Park 2km</li>
            <li>Playground</li>
          </ul>
        </div>

        <div class="visit_hours">
          <h5>Hours :</h5>
          <ul>
            <li>Monday-Friday, from 8am - 6pm</li>
            <li>Saturday Mornings by appointment</li>

          </ul>
        </div>

        <div class="visit_addres">
          <h5>Addres:</h5>
          <p>Mungret College,Mungret,Co.Limecrik v94</p>
        </div>

        <div class="visit_phone">
          <h5>Phone:</h5>
          <p>061 545 605 / 087 1278004</p>
        </div>

      </div>

      <div class="visit_map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3508.8031728464507!2d70.29884267443681!3d28.42519539346781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39375bdc46c6f91f%3A0x654490d339d046ce!2sDanZee%20Tech!5e0!3m2!1sen!2s!4v1697431936557!5m2!1sen!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

    </div>
    
  </div>


  <!-- contact us form  -->
  <div class="contact_menu">

    <div class="contact_head">
      <h4>We'd Love To Hear From You</h4>
    </div>

    <div class="contact_form">

      <form action="">

        <span>
          <label for="name">Name</label>
          <input type="text" name="name" id="name" placeholder="Name">
        </span>

        <span>
          <label for="email">Email</label>
          <input type="email" name="email" id="email" placeholder="Email">
        </span>

        <span>
          <label for="phone">Phone</label>
          <input type="text" name="phone" id="phone" placeholder="Phone">
        </span>

        <span>
          <textarea name="request" id="request" rows="6" placeholder="Your Request"></textarea>
        </span>

        <span>
          <input type="submit" name="submit" id="#" class="submit_btn">
        </span>

      </form>

    </div>

  </div>

<section> --}}


@endsection

@push('js')

@endpush