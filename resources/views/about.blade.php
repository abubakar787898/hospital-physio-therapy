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
        <h1>About</h1>
    </div>

    <div class="faq_content">

        <span>
            <h5>Conditions Treated:</h5>
            <p>Neck pain / Mid and Low Back Pain / Shoulder Pain / Hip Pain / Knee Pain / Ankle and Foot Pain / Elbow pain / Wrist & hand pain / Ligament sprains / Muscle strains / muscle tears / Tendinopathies /  Sports Injuries / Post Surgical Rehabilitation</p>
        </span>

        <span>
            <h5>Opening Hours:</h5>
            <p>Mon-Fri : 8 AM – 6.00PM </p>
            <p>Saturday Mornings by Appointment (061 545 645 )</p>
        </span>

        <span>
            <h5>Fees:</h5>
            <p>Chartered Physiotherapy €55</p>
            <p>Please note that as of the 1st of December 2022, our updated physiotherapy appointment fee will be €60 ( €50 student card). This is due to increased operating costs and to ensure that we can continue to provide the same high level of service</p>
        </span>

        <span>
            <h5>How soon can I get an appointment?</h5>
            <p>Every effort will be made to see you within 24-48hrs.</p>
        </span>

        <span>
            <h5>Is there parking?</h5>
            <p>Yes there is ample, free parking available in Mungret College</p>
        </span>

        <span>
            <h5>Do I need a GP referral ?</h5>
            <p>No, you do not need a referral from your GP. If you do have any letters from specialists or scan results it would be useful to bring them with you to our appointment. </p>
        </span>

        <span>
            <h5>How long will the treatment session last?</h5>
            <p>The first appointment usually lasts approximately 45 minutes. Follow-up appointments usually last for approximately 30 minutes.</p>
        </span>

        <span>
            <h5>Are my treatments covered by health insurance?</h5>
            <p>We are recognised by all the major health insurers in Ireland. Please speak with your insurance company to check the terms and conditions of your policy for details on your cover.</p>
        </span>

        
    </div>

    {{-- <div class="faq_btn">
        <a href="../Book Now/Book Now.html"><button>Book Now</button></a>
    </div> --}}
    
  </div>
<section>


@endsection

@push('js')

@endpush