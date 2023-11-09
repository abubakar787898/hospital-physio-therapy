@extends('layouts.backend.app')

@section('title','Book New Slot')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.book-slot') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="slot_id" value="{{$slot->id}}">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BOOK SLOT FOR PATIENT
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                           Slot Detail
                                            </h2>
                                        </div>
                                        <div class="body">
                                            <div class="row">
                                               
                                                <div class="form-group form-float">
                                                    <div >
                                                        <label for="appointment">Appointment Type</label>
                                                        <select name="appointment" id="appointment_type_id" class="form-control" disabled  >
                                                            @foreach($appointments as $appointment)
                                                                <option    {{ $appointment->id == $slot->appointment_type_id ? 'selected' : '' }} value="{{ $appointment->id }}">{{ $appointment->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        
                                                        <input type="date"  class="form-control"  value="{{ $slot?->date }}" disabled>
                                                        <label class="form-label">Date</label>
                                                    </div>
                                                </div>
                    
                                               <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="time" id="from_time" class="form-control" name="from_time" value="{{ $slot?->from_time }}" disabled>
                                                            <label class="form-label">Start Time</label>
                                                        </div>
                                                    </div>
                    
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="time" id="to_time" class="form-control" name="to_time" value="{{ $slot?->to_time }}" disabled>
                                                            <label class="form-label">End Time</label>
                                                        </div>
                                                    </div>
                                                </div>
                                               </div>
                                               
                                               <div class="form-group form-float">
                    
                                                <div class="form-line">
                                                    <input type="number" class="form-control" name="price" value="{{ $slot?->price }}" disabled>
                                                    <label class="form-label">Status</label>
                                                </div>
                                            </div>
                                               <div class="form-group form-float">
                    
                                                <div class="form-line">
                                                    <input type="text" class="form-control" value="{{ $slot?->status }}" disabled>
                                                    <label class="form-label">Status</label>
                                                </div>
                                            </div>
                                                {{-- <div class="form-group">
                                                    <input type="checkbox" id="publish" class="filled-in" name="status" value="1" {{ $slot->status == true ? 'checked' : '' }}>
                                                    <label for="publish">Publish</label>
                                                </div> --}}
                    
                                        {{-- <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.teams.index') }}">BACK</a>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button> --}}
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>
                                            Patient Detail
                                            </h2>
                                        </div>
                                        <div class="body">
                                            <div class="row">
                                                <div class="col-md-6">
                                           
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" id="f_name" class="form-control" name="f_name" required >
                                                    <label class="form-label">First Name</label>
                                                </div>
                                            </div>
                                        </div>
                                                <div class="col-md-6">
                                           
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" id="l_name" class="form-control" name="l_name" required >
                                                            <label class="form-label">Last Name</label>
                                                        </div>
                                                    </div>
                                        </div>
                                                <div class="col-md-6">
                                           
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="email" id="email" class="form-control" name="email" >
                                                            <label class="form-label">Email</label>
                                                        </div>
                                                    </div>
                                        </div>
                                                <div class="col-md-6">
                                           
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text" id="mobile" class="form-control" name="mobile" >
                                                            <label class="form-label">Mobile</label>
                                                        </div>
                                                    </div>
                                        </div>
                                                <div class="col-md-6">
                                           
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="number" id="age" class="form-control" name="age" >
                                                            <label class="form-label">Age</label>
                                                        </div>
                                                    </div>
                                        </div>
                                                <div class="col-md-12">
                                           
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                          <textarea name="comment" id="" cols="100" rows="10"></textarea>
                                                           
                                                        </div>
                                                    </div>
                                        </div>
                                     
                                        <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.slots.index') }}">BACK</a>
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         

                     
                        </div>
                    </div>
                </div>
               
            </div>
           
        </form>
    </div>
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    

@endpush