@extends('layouts.backend.app')

@section('title', 'Slots')

@push('css')
    <style>
        #slot-calendar .ui-datepicker-calendar {
            font-size: 30px;
            /* Adjust the font size as needed */
            /* Add any other styling you want here */
        }
        .day-label {
    font-size: 0.4em;
    color: rgb(6, 38, 86);
    padding-left: 3px;
    padding-right: 3px;
    
}

.label-price {
    display: block;
    padding-bottom: 1px;
}

.ui-datepicker-calendar td {
    position: relative;
    padding-bottom: 20px; /* Adjust the padding as needed */
}


    </style>
    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />

    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/backend/css/jquery-ui.multidatespicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/jquery-ui.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid" >
        <div class="block-header">
            <h1>Add New Slots</h1>
            <a class="btn btn-danger waves-effect" href="{{ route('admin.slots.index') }}">
             
                <span>Back</span>
            </a>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" style="
                padding: 11px;
            ">

                    <div class="container">

                        {{-- <form action="{{ route('admin.slots.store') }}" method="POST" enctype="multipart/form-data"> --}}
                        <form >
                            @csrf

                            <div class="row " style="margin-top: 20px">
                                <div class="col-lg-6  col-md-12 col-sm-12 col-xs-12">


                                    <select class="form-control" onChange="fetchAppointments()" id="appointment-id">
                                        <option value="">{{ __('Select Appointment Type') }}</option>
                                        @foreach ($appointment_types as $appointment_type)
                                           <option value="{{ $appointment_type->id }}">{{ $appointment_type->name }}</option>
                                              @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                  
                                    <input type="number" class="form-control" id="price"  placeholder="Amount"
                                        aria-describedby="inputGroupPrepend" required>
    
    
                                </div>

                            </div>
                            <div class="row " style="margin-top: 20px">

                            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                <label for="from-time">From Time</label>
                                <input type="time" class="form-control" id="from-time" placeholder="From Time"
                                    aria-describedby="inputGroupPrepend" required>


                            </div>
                            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                <label for="to-time">To Time</label>
                                <input type="time" class="form-control" id="to-time"  placeholder="To Time"
                                    aria-describedby="inputGroupPrepend" required>


                            </div>
                       
                            </div>

                            <button style="margin-top: 20px" type="button" class="btn btn-primary" onclick="saveSlots()"><i class="fa fa-fw fa-save"></i>&nbsp;{{ __('Save') }}</button>
                            {{-- <button style="margin-top: 20px" class="btn btn-primary" type="submit">Save</button> --}}
                        </form>
                    </div>

                    <div id="slot-calendar"></div>
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
    <script src="{{ asset('assets/backend/js/jquery-ui.multidatespicker.js') }}"></script>
    <script src="{{ asset('assets/backend/js/jquery-ui.min.js') }}"></script>

    <script type="text/javascript">
        // resources/js/app.js
        var slots=[];
        $(function() {
            $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
            var today = new Date();
            var y = today.getFullYear();
            toggleCaledarView();
            initCalendar();
            $(document).on('click', '.ui-datepicker-next', function() {
                console.log('next');
                setLabels()
            })

            $(document).on('click', '.ui-datepicker-prev', function() {
                console.log('prev');
                setLabels()
            })
            // Other code...
        });

        function toggleCaledarView() {

            if ($('#appointment-id').val() == '') {
                $('#slot-calendar').hide('slow');
            } else {
                $('#slot-calendar').show('slow');
            }

        }

        function initCalendar() {
            $('#slot-calendar').multiDatesPicker({
                numberOfMonths: [1, 1],
                defaultDate: new Date(), // Default date is the current date
                dateFormat: "yy-m-d",
                onSelect: function(date) {
                    console.log('date');
                    console.log(date);
                    setTimeout(() => {
                        setLabels();
                    }, 2000);
                }
            });
        }


        function fetchAppointments() {

console.log('fetchAppointments()')



let forloading = '.' + $(this).attr('rel');

toggleCaledarView();

$.ajax({
    url: _baseUrl + 'appointment-slot',
    method: "get",
    data: {
        id: $('#appointment-id').val(),
       
    },
    dataType: 'json',
    beforeSend: function() {
        $(forloading).append('<i class="fa fa-spinner fa-spin circular-btn-loader"></i>');

    },
    complete: function() {
        $('.circular-btn-loader').remove();

    },

    success: function(result) {
        
        if(result.success) {

            console.log(result.data)
            console.log(result.data.slots)

            slots=result.data.slots;

            setLabels()
     
            
        }

    },
    error: function(result) {
        // if (!!result.responseJSON.errors) {
        //     $('#nameValidationMessage').text(result.responseJSON.errors.name);
        // } else {
        //     $.notify(result.responseJSON.message, "error");
        // }
    }
})

}
function isTimeValid() {

if( $('#appointment-id').val() == '' 
    || $('#from-time').val() == '' 
    || $('#to-time').val() == ''
    || $('#price').val() == ''
    || $('#slot-calendar').multiDatesPicker('getDates').length == 0
) {
    return false;
}

return true;

}
function saveSlots() {
    if (!isTimeValid()) {
        alert("Fields Are Required");
        return false;
    }


    let forloading = '.' + $(this).attr('rel');

    $.ajax({
        url: _baseUrl + 'slots',
        method: "POST",
        data: {
            appointment_type_id: $('#appointment-id').val()*1,
            from_time: $('#from-time').val(),
            to_time: $('#to-time').val(),
            price: $('#price').val(),
            dates: $('#slot-calendar').multiDatesPicker('getDates'),
        },
        dataType: 'json',
        beforeSend: function() {
            $(forloading).append('<i class="fa fa-spinner fa-spin circular-btn-loader"></i>');

        },
        complete: function() {
            $('.circular-btn-loader').remove();

        },

        success: function(result) {
            
            if(result.success) {

                console.log(result.data)
                console.log(result.data.slots)

                slots=result.data.slots;

                setLabels()
                setTimeout(function() {
    location.reload();
}, 3000);
                // $.notify(result.message, "success");
            }

            // $('.showId').text(id);
            // $('.showName').text(result.data.searchResults.name);
            // $('#showRegionsModal').modal('show');
        },
        error: function(result) {
            // if (!!result.responseJSON.errors) {
            //     $('#nameValidationMessage').text(result.responseJSON.errors.name);
            // } else {
            //     $.notify(result.responseJSON.message, "error");
            // }
            $.notify(result.message, "error");

        }
    })

}

function setLabels() {

$.each(slots, function(index, row) {                    
    displayLabelInCalendar(row.date, row.from_time, row.to_time);
});

}

function displayLabelInCalendar(date, from_time, to_time) {

var date = date.split('-');

var year = date[0]*1;
var month = date[1] - 1;
var day = date[2]*1;
    
$('.ui-datepicker-calendar td').each(function() {

    if($(this).attr('data-year') == year && $(this).attr('data-month') == month) {

        if($.trim($(this).find('.ui-state-default').html()) == day) {

            // console.log('Found');

            let  dayLabelSelectedClass='';
            // selected
            if($(this).find('.ui-state-default').hasClass('ui-state-active')) {
                dayLabelSelectedClass='day-label-selected';
            }
            
            let label = '<div class="label-price day-label">' 
                    + ( from_time+"-"+ to_time)
                + '</div>';
            // let label = '<div class="">' 
            //     + '<div class="label-hotel day-label ' + dayLabelSelectedClass + '">'
            //         + '<i class="fas fa-hotel"></i> ' + hotelPrice 
            //     + '</div>'
            //     + '<div class="label-flight day-label ' + dayLabelSelectedClass + '">' 
            //         + '<i class="fas fa-plane"></i>' + flightPrice
            //     + '</div>'
            //     '</div>';

            $(this).append(label)
        }
        

    }

});

}
    </script>
@endpush
