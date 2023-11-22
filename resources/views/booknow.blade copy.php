@extends('layouts.frontend.app')

@section('title', 'Book Now')

@push('css')
    <script src="{{ asset('assets/frontend/js/jquery-3.1.1.min.js') }}"></script>
    <link href="{{ asset('assets/frontend/css/book-now/booking.css') }}" rel="stylesheet">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"> --}}
    <style>
        .custom-scrollbar {
            max-height: 300px;
            /* Adjust the maximum height as needed */
            overflow-y: auto;
        }
    </style>
@endpush

@section('content')


    <style>
        .booking__section {
            display: flex;
            align-items: center;
            flex-direction: column;
            gap: 32px;

            padding: 62px 6vw;

            .title {
                font-family: Nunito;
                font-size: 36px;
            }

            .paragraph {
                font-family: Nunito;
                font-size: 18px;
                text-align: center;
                max-width: 1000px;
            }

            .booking__header {
                display: flex;
                align-items: center;
                flex-direction: column;
                gap: 24px;
            }

            .booking__form{
                display: grid;
                gap: 32px;
                grid-template-columns: repeat(3, 1fr)
            }
        }
    </style>

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

    <div class="booking__section">

        <div class="booking__header">

            <h1 class="title">Book Your Physiotherapy Session Today</h1>
            <p class="paragraph">Embark on the journey to a healthier and more vibrant you. At our physiotherapy center, we
                believe in
                personalized care and effective treatments. Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Our dedicated team is committed to guiding you through the path of recovery, addressing your unique
                needs with compassion and expertise. Take the first step towards a pain-free and active life.</p>

        </div>

        <div class="booking__form">

            <input type="date" class="form-control" name="date" value="{{ \Carbon\Carbon::now()->toDateString() }}"
                id="date">

            <select class="" name="appointment_type" id="appointment_type" aria-label=".form-select example">
                @foreach ($appointment_types as $appointment_type)
                    <option value="{{ $appointment_type?->id }}">{{ $appointment_type->name }}
                    </option>
                @endforeach
            </select>

            {{-- {{dd($appointmenttype)}} --}}
            <th id="header"> {{ $appointmenttype }} : Booking Time and Detail</th>
            @if (!empty($data) && $data->count())
                @foreach ($data as $key => $value)
                    <tr>
                        <td> {{ \Carbon\Carbon::parse($value->date)->format('l, F j, Y') }}
                            <br>
                            {{ \Carbon\Carbon::parse($value->from_time)->format('h:i A') . ' to ' . \Carbon\Carbon::parse($value->to_time)->format('h:i A') }}
                        </td>

                        <td>
                            @if ($value->status == 'available')
                                <a href="{{ route('booking-form', ['id' => $value->id]) }}" class="btn btn-primary">Book
                                    Now</a>
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
        </div>
    </div>

    <div class="pagination">
        {{-- {{ $data->links() }} --}}
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
                            $('#header').html(response?.appointment_type +
                                " : Booking Time and Detail");
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
