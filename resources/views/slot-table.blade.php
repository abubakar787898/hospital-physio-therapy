@foreach($data as $key => $value)
  <tr>
    <td> {{ \Carbon\Carbon::parse($value->date)->format('l, F j, Y') }} <br> {{ \Carbon\Carbon::parse($value->from_time)->format('h:i A') ." to ".\Carbon\Carbon::parse($value->to_time)->format('h:i A') }}  </td>
    <td>
        <td>
            @if ($value->status=='available')
            <a href="{{ route('booking-form', ['id' => $value->id]) }}" class="btn btn-primary">Book Now</a>
            @else
            <a href="#" class="btn btn-danger">Booked</a>
            @endif
        </td>
    </td>
  </tr>
@endforeach