@extends('layouts.backend.app')

@section('title','AppointmentType')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                           ADD NEW SERVICE NAME
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.service-names.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name">
                                    <label class="form-label">Service Name</label>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <input type="file" name="image">
                            </div> --}}

                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.service-names.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush