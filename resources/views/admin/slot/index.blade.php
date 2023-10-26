@extends('layouts.backend.app')

@section('title','PaperType')

@push('css')
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />

    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        {{-- <div class="block-header">
            <a class="btn btn-primary waves-effect" href="{{ route('admin.paper_types.create') }}">
                <i class="material-icons">add</i>
                <span>Add New PaperType</span>
            </a>
        </div> --}}
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="container">
                        <form id="createSlotForm">
                            @csrf
                            <label for="date_time">Select Date and Time:</label>
                            <input type="datetime-local" id="date_time" name="date_time" required>
                            <button type="submit">Create Slot</button>
                        </form>
                    </div>
                
                    <div id="calendar"></div>
                    {{-- <div class="header">
                        <h2>
                            ALL PAPERTYPES
                          
                        </h2>
                    </div> --}}
                
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection

@push('js')
{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <!-- Jquery DataTable Plugin Js -->
    {{-- <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script> --}}
    <script type="text/javascript">

// resources/js/app.js

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Initialize FullCalendar
    $('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
    },
    events: '/slots', // Endpoint to fetch available slots
    selectable: true,
    select: function (start, end) {
        // Logic to handle slot selection
        if (confirm('Do you want to book this slot?')) {
            bookSlot(start.format());
        }
        $('#calendar').fullCalendar('unselect');
    },
    eventRender: function (event, element) {
        // Customize how events are rendered on the calendar
        element.find('.fc-title').append('<br>' + event.additionalInfo);
    },
    loading: function (isLoading, view) {
        // Handle loading events, e.g., show a loading spinner
        if (isLoading) {
            $('#loading-spinner').show();
        } else {
            $('#loading-spinner').hide();
        }
    },
    // Add more options as needed
});
$('#createSlotForm').submit(function (e) {
                e.preventDefault();

                // Get the selected date and time
                var date_time = $('#date_time').val();

                // AJAX request to create a new slot
                $.ajax({
                    url: '/slots',
                    method: 'POST',
                    data: { date_time: date_time },
                    success: function (response) {
                        alert('Slot created successfully');
                    },
                    error: function (error) {
                        alert('Error creating slot: ' + error.responseJSON.message);
                    }
                });
            });

    function bookSlot(date_time) {
        // AJAX request to book the selected slot
        $.ajax({
            url: '/slots/book',
            method: 'PATCH',
            data: { date_time: date_time },
            success: function (response) {
                alert(response.message);
                $('#calendar').fullCalendar('refetchEvents'); // Refresh calendar events
            },
            error: function (error) {
                alert(error.responseJSON.message);
            }
        });
    }
});


        function deletePaperType(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush