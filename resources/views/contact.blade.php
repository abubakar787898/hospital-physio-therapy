@extends('layouts.frontend.app')

@section('title','Contact Us')

@push('css')
    <link href="{{ asset('assets/frontend/css/contact/contact.css') }}" rel="stylesheet">

    
@endpush

@section('content')
<section>
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

<section>


@endsection

@push('js')

@endpush