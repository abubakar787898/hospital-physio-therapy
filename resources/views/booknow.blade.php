@extends('layouts.frontend.app')

@section('title', 'Book Now')

@push('css')
    <link href="{{ asset('assets/frontend/css/book-now/booking.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <style>
        .custom-scrollbar {
            max-height: 300px; /* Adjust the maximum height as needed */
            overflow-y: auto;
        }
    </style>
@endpush

@section('content')
<div class="banner__section">

    <h1 class="title">
        Book Now
    </h1>

    <div class="url">

        <a href="{{ route('home') }}"> <span class="text">
                Home
            </span></a>
        /
        <span>
            Book Now
        </span>

    </div>

</div>
    <section>
        <div class="hero_section">

            <div class="hero_title">
                <h1>Book Your Physiotherapy Session Today</h1>
              

            </div>



            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Available From</label>
                                    <input type="date" class="form-control" name="date"
                                        value="{{ \Carbon\Carbon::now()->toDateString() }}" id="date">


                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label ">Select Treatmenat</label>
                                    <select class="form-select form-select-xl mb-3 form-control" name="appointment_type"
                                        id="appointment_type" aria-label=".form-select example">
                                        @foreach ($appointment_types as $appointment_type)
                                            <option value="{{ $appointment_type?->id }}">{{ $appointment_type->name }}
                                            </option>
                                        @endforeach
                                    </select>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- {{dd($appointmenttype)}} --}}
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                <table class="table table-striped " id="booking-table">
                                    <thead>
                                        <tr style="position: sticky; top: 0; background-color: white;">
                                            <th id="header">  {{$appointmenttype}} : Booking Time and Detail</th>
                                            <th width="300px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="custom-scrollbar" style="max-height: 300px; overflow-y: auto;">
                                        @if (!empty($data) && $data->count())
                                            @foreach ($data as $key => $value)
                                                <tr>
                                                    <td> {{ \Carbon\Carbon::parse($value->date)->format('l, F j, Y') }} <br>
                                                        {{ \Carbon\Carbon::parse($value->from_time)->format('h:i A') . ' to ' . \Carbon\Carbon::parse($value->to_time)->format('h:i A') }}
                                                    </td>

                                                    <td>
                                                        @if ($value->status=='available')
                                                        <a  href="{{ route('booking-form', ['id' => $value->id]) }}" class="btn btn-primary">Book Now</a>
                                                        @else
                                                        <a href="#" class="btn btn-danger">Booked</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="10">There are no data.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                </div>
                              <div class="pagination">
    {{-- {{ $data->links() }} --}}
</div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section>


    @endsection

    @push('js')
        <script>
            $(document).ready(function() {
                // Attach change event listener to date and treatment type selectors
                $('#date, #appointment_type').on('change', function() {
                    // Get selected date and treatment type
                    var selectedDate = $('#date').val();
                    var selectedType = $('#appointment_type').val();
                    console.log(selectedDate);
                    console.log(selectedType);
                    // Make an AJAX request to fetch data
                    $.ajax({
                        url: _urlStore + 'getSlot', // Replace with your actual endpoint
                        method: 'GET',
                        data: {
                            date: selectedDate,
                            appointment_type: selectedType
                        },
                        success: function(response) {
                            console.log(response);
                            // Update the table with the new data
                            $('#booking-table tbody').html(response?.table_content);
                            $('#header').html(response?.appointment_type+" : Booking Time and Detail");
                            // $('.pagination').html(response?.pagination);
                            if (!response?.table_content || response?.table_content
                                .length === 0) {
                                $('#booking-table tbody').html(
                                    '<tr><td colspan="2">There are no data.</td></tr>');
                            }

                        },
                        error: function(xhr, status, error) {
    console.error('Error fetching data: ', error);
    console.log('XHR Status:', status);
    console.log('XHR Response:', xhr.responseText);
}
                    });
                });
            });
        </script>
    @endpush
