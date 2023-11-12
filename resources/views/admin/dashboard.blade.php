@extends('layouts.backend.app')

@section('title','Dashboard')

@push('css')
<link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

@endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL BOOKINGS</div>
                        <div class="number count-to" data-from="0" data-to="{{ $todayBookings->count() }}" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">library_books</i>
                    </div>
                    <div class="content">
                        <div class="text">APPOINTMENT TYPES</div>
                        <div class="number count-to" data-from="0" data-to="{{$appointments }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            
            {{-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL VIEWS</div>
                        <div class="number count-to" data-from="0" data-to="{{ $all_views }}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div> --}}
        </div>
        <!-- #END# Widgets -->
        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                {{-- <div class="info-box bg-pink hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">apps</i>
                    </div>
                    <div class="content">
                        <div class="text">CATEGORIES</div>
                     
                    </div>
                </div>
                <div class="info-box bg-blue-grey hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">labels</i>
                    </div>
                    <div class="content">
                        <div class="text">TAGS</div>
                       
                    </div>
                </div>
                <div class="info-box bg-purple hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">account_circle</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL AUTHOR</div>
                       
                    </div>
                </div>
                <div class="info-box bg-deep-purple hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">fiber_new</i>
                    </div>
                    <div class="content">
                        <div class="text">TODAY AUTHOR</div>
                       
                    </div>
                </div> --}}
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2> ALL TODAY BOOKINGS ({{$todayBookings->count()}})</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Appointment</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Amount</th>
                                    
                                    {{-- <th>Payment</th> --}}
                                    <th>Mail Status</th>
                                  
                              
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Appointment</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Amount</th>
                                    
                                    {{-- <th>Payment</th> --}}
                                    <th>Mail Status</th>
                                 
                            
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($todayBookings as $key=>$patientbooking)
                                  
                                    <tr>
                                        <td>{{ $patientbooking->id }}</td>
                                        <td>{{ $patientbooking?->slot?->appointment_type->name }}</td>
                                        <td>{{ $patientbooking->f_name ." ".$patientbooking->l_name}}</td>
                                        <td><a href="mailto:{{ $patientbooking->email}}">{{ $patientbooking->email}}</a></td>
                                        <td>{{ $patientbooking->mobile}}</td>
                                        <td> {{ \Carbon\Carbon::parse( $patientbooking?->slot?->date)->format('d-m-Y') }}</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($patientbooking->slot->from_time)->format('h:i A') }}
                                            - 
                                            {{ \Carbon\Carbon::parse($patientbooking->slot->to_time)->format('h:i A') }}
                                        </td>
                                        <td>€{{ $patientbooking->slot->price}}</td>
                                        {{-- <td>{{ $patientbooking?->payment_type}}</td> --}}
                                        <td >    @if($patientbooking?->mail_status != "pending")
                                            
                                            <span class="badge bg-green">{{ $patientbooking?->mail_status}}</span>
                                      
                                      @else
                                    
                                        <span class="badge bg-red">{{ $patientbooking?->mail_status}}</span>
                                 
                                        @endif</td>
                                        
                                      
                                       
                                     
                    
                                   
                                        <td class="text-center">
                                            <a href="{{ route('admin.patients.show',$patientbooking->id) }}" class="btn btn-info waves-effect">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a class="btn btn-success waves-effect" href="{{ route('admin.appointment-reminder',$patientbooking->id) }}" title="Send Mail" type="button" >
                                                <i class="material-icons">send</i>
                                            </a>
                                           
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2> ALL TOMORROW BOOKINGS ({{$tomorrowBookings->count()}})</h2><br>
                     
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Appointment</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Amount</th>
                                    {{-- <th>Payment</th> --}}
                                    <th>Mail Status</th>
                                 
                                  
                              
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Appointment</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Amount</th>
                                    {{-- <th>Payment</th> --}}
                                    <th>Mail Status</th>
                                 
                            
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($tomorrowBookings as $key=>$patientbooking)
                                  
                                        <tr>
                                            <td>{{ $patientbooking->id }}</td>
                                            <td>{{ $patientbooking?->slot?->appointment_type->name }}</td>
                                            <td>{{ $patientbooking->f_name ." ".$patientbooking->l_name}}</td>
                                            <td><a href="mailto:{{ $patientbooking->email}}">{{ $patientbooking->email}}</a></td>
                                            <td>{{ $patientbooking->mobile}}</td>
                                            <td> {{ \Carbon\Carbon::parse( $patientbooking?->slot?->date)->format('d-m-Y') }}</td>

                                            <td>
                                                {{ \Carbon\Carbon::parse($patientbooking->slot->from_time)->format('h:i A') }}
                                                - 
                                                {{ \Carbon\Carbon::parse($patientbooking->slot->to_time)->format('h:i A') }}
                                            </td>
                                        <td>€{{ $patientbooking->slot->price}}</td>

                                            {{-- <td>{{ $patientbooking?->payment_type}}</td> --}}
                                        <td >    @if($patientbooking?->mail_status != "pending")
                                            
                                                <span class="badge bg-green">{{ $patientbooking?->mail_status}}</span>
                                          
                                          @else
                                        
                                            <span class="badge bg-red">{{ $patientbooking?->mail_status}}</span>
                                     
                                            @endif</td>
                                            
                                          
                                           
                                         
                        
                                            {{-- <td>{{ $patientbooking->created_at }}</td> --}}
                                            {{--<td>{{ $patientbooking->updated_at }}</td>--}}
                                            <td class="text-center">
                                                <a href="{{ route('admin.patients.show',$patientbooking->id) }}" class="btn btn-info waves-effect">
                                                    <i class="material-icons">visibility</i>
                                                </a>
                                                <a class="btn btn-success waves-effect" href="{{ route('admin.appointment-reminder',$patientbooking->id) }}" title="Send Mail" type="button" >
                                                    <i class="material-icons">send</i>
                                                </a>
                                                {{-- <a href="{{ route('admin.patients.edit',$patientbooking->id) }}" class="btn btn-info waves-effect">
                                                    <i class="material-icons">edit</i>
                                                </a> --}}
                                                {{-- <button class="btn btn-danger waves-effect" type="button" onclick="deletePatientBooking({{ $patientbooking->id }})">
                                                    <i class="material-icons">delete</i>
                                                </button> --}}
                                                {{-- <form id="delete-form-{{ $patientbooking->id }}" action="{{ route('admin.patients.destroy',$patientbooking->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->

       
    </div>
@endsection

@push('js')
<script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

<script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>
    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset('assets/backend/plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="assets/backend/plugins/flot-charts/jquery.flot.js"></script>
    <script src="assets/backend/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="assets/backend/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="assets/backend/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="assets/backend/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="assets/backend/plugins/jquery-sparkline/jquery.sparkline.js"></script>
    <script src="{{ asset('assets/backend/js/pages/index.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

    <script type="text/javascript">
        function sendMail(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to send mail",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes ',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('send-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                       'Message not send',
                        'error'
                    )
                }
            })
        }
    </script>
    
@endpush