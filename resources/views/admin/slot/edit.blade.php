@extends('layouts.backend.app')

@section('title','Slot')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.slots.update',$slot->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT Slot
                            </h2>
                        </div>
                        <div class="body">
                            <div class="form-group form-float">
                                <div >
                                    <label for="appointment">Select Appointment Type</label>
                                    <select name="appointment" id="appointment_type_id" class="form-control"  >
                                        @foreach($appointments as $appointment)
                                            <option    {{ $appointment->id == $slot->appointment_type_id ? 'selected' : '' }} value="{{ $appointment->id }}">{{ $appointment->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="date" id="date" class="form-control" name="date" value="{{ $slot->date }}">
                                    <label class="form-label">Date</label>
                                </div>
                            </div>

                           <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="time" id="from_time" class="form-control" name="from_time" value="{{ $slot->from_time }}">
                                        <label class="form-label">Start Time</label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="time" id="to_time" class="form-control" name="to_time" value="{{ $slot->to_time }}">
                                        <label class="form-label">End Time</label>
                                    </div>
                                </div>
                            </div>
                           </div>
                           <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" value="{{ $slot->status }}">
                                <label class="form-label">Status</label>
                            </div>
                        </div>
                            {{-- <div class="form-group">
                                <input type="checkbox" id="publish" class="filled-in" name="status" value="1" {{ $slot->status == true ? 'checked' : '' }}>
                                <label for="publish">Publish</label>
                            </div> --}}

                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.slots.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
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