@extends('layouts.frontend.app')

@section('title','Book Now')

@push('css')
    <link href="{{ asset('assets/frontend/css/book-now/booking.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/book-now/booking-form.css') }}" rel="stylesheet">

    
@endpush

@section('content')
<section>
    <div class="hero_section">

        <div class="hero_title">
            <h1>Complete Your Physiotherapy Session Form</h1>
           

        </div>
        <style>
            table {

              border-collapse: collapse;
              width: 50%;
              /* border: 1px solid black; */
            }
           
            th, td {
              text-align: center;
              padding: 8px;
            }
            
            tr:nth-child(even) {background-color: #f2f2f2;}
            </style>
        <div class="container">
{{-- <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> --}}
                {{-- <div class="card">
                    <div class="card-body"> --}}
                 
                        <h2 style="text-align: center">Your Appointment Detail</h2>
                        <div style="display:flex; justify-content: center">
                        <table>
                         
                            <tr>
                            <th>Treatment</th>
                            <td>{{$data->appointment_type->name}}</td>
                            </tr>
                            <tr>
                            <th>Date</th>
                            <td> {{ \Carbon\Carbon::parse($data->date)->format('l, F j, Y') }}</td>
                            </tr>
                            <tr>
                            <th>Time</th>
                            <td>   {{ \Carbon\Carbon::parse($data->from_time)->format('h:i A') . ' to ' . \Carbon\Carbon::parse($data->to_time)->format('h:i A') }}</td>
                            </tr>
                           
                          </table>  
                        </div>
                          <br><br>
<form  action="{{ route('patient-booked') }}" method="POST" class="row g-3 needs-validation" >
    @csrf
    <div class="form-row row">
        <input type="hidden" name="slot_id" value="{{$data->appointment_type_id}}">
        <div class="form-group col-md-6">
          <label for="inputFname4">First Name</label>
          <input type="text" class="form-control" id="inputFname4" name="f_name" placeholder="First Name" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputLname4">Last Name</label>
          <input type="text" class="form-control" id="inputLname4" name="l_name" placeholder="Last Name" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputmobile4">Mobile Number</label>
          <input type="text" class="form-control" id="inputmobile4" name="mobile" placeholder="Mobile Number" required>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="age">Age</label>
          <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <div class="form-group col-md-6 col-lg-6">
            <label for="comment">Additional Information</label>
           <textarea name="comment" id="comment" cols="90" rows="5" placeholder="Additional Info"></textarea>
          </div>
      </div>
    
       
 
   <div class="col-md-2">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
</div>
        {{-- </div>
    </div> --}}
    {{-- </div> --}}
    </div>

  </section>
<section>


@endsection

@push('js')

@endpush