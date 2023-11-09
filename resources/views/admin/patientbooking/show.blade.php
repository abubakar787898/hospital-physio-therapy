@extends('layouts.backend.app')

@section('title','PatientBooking')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <a href="{{ route('admin.patients.index') }}" class="btn btn-danger waves-effect">BACK</a>
        
        <br>
        <br>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PATIENT BOOKING DETAIL
                              {{-- {{ $patientbooking->title }} --}}
                                {{-- <small>PatientBookinged By <strong> <a href="">{{ $patientbooking->user->name }}</a></strong> on {{ $patientbooking->created_at->toFormattedDateString() }}</small> --}}
                            </h2>
                        </div>
                        <div class="body">
                            <label for="">Full Name :</label>
                            <p> {{ $patientbooking->f_name." ".$patientbooking->l_name }}</p>
                            <hr>

                            <label for="">Email:</label><br>

                            <a href="mailto: {{ $patientbooking->email }}"> {{ $patientbooking->email }}</a>
                            <hr>

                            <br>
                            <label for="">Mobile Number:</label><br>
                            <a> {{ $patientbooking->mobile }}</a>
                            <hr>

                            <label for="">Age :</label><br>
                            <a> {{ $patientbooking->age }}</a>
                            <hr>
                            <label for="">Additional Info :</label><br>
                            {!! $patientbooking->comment !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    {{-- <div class="card">
                        <div class="header bg-cyan">
                            <h2>
                                Categoryies
                            </h2>
                        </div>
                        <div class="body">
                            @foreach($patientbooking->categories as $category)
                                <span class="label bg-cyan">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div> --}}
                    <div class="card">
                        <div class="header bg-green">
                            <h2>
                                Slot Detail
                            </h2>
                        </div>
                        <div class="body">
                         <label for="">Appointment Type:</label>
                                <p class="">{{ $patientbooking->slot->appointment_type->name }}</p><br>
                                <label for="">Booking Date:</label>
                                <p class="">{{ $patientbooking->slot->date}}</p><br>
                                <label for="">Timing:</label>
                                <p class="">{{ $patientbooking->slot->from_time."-".$patientbooking->slot->to_time }}</p>
                                <label for="">Amount:</label>
                                <p class="">{{ $patientbooking->slot->price }}</p>
                                <label for="">Status:</label>
                                <p class="">{{ $patientbooking->slot->status }}</p>
                         
                        </div>
                    </div>
                  

                </div>
            </div>
    </div>
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
        });
        function approvePatientBooking(id) {
            swal({
                title: 'Are you sure?',
                text: "You went to approve this patientbooking ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('approval-form').submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'The patientbooking remain pending :)',
                        'info'
                    )
                }
            })
        }
    </script>

@endpush