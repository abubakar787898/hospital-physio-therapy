@extends('layouts.backend.app')

@section('title','Slots')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')
<?php
// This function takes two time values in the format HH:MM and returns the difference in the same format
function diff($start, $end) {
  // Convert to unix timestamps
  $start = strtotime($start);
  $end = strtotime($end);
  // Perform subtraction to get the difference (in seconds) between times
  $diff = $end - $start;
  // Convert to minutes
  $minutes = $diff / 60;
  // Return the difference
  return $minutes;
}



?>

    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-primary waves-effect" href="{{ route('admin.slots.create') }}">
                <i class="material-icons">add</i>
                <span>Add New Slot</span>
            </a>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg- col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ALL Slots
                            <span class="badge bg-blue">{{ $slots->count() }}</span>
                        </h2>
                    </div>
                    
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Appointment Type</th>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Amount</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Book New Slot</th>
                                
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Appointment Type</th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Amount</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                        <th>Book New Slot</th>
                                      
                                    
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($slots as $key=>$slot)
                                  
                                        <tr>
                                            <td>{{ $slot->id }}</td>
                                            <td>{{ $slot?->appointment_type?->name }}</td>
                                            <td>{{$slot->date }}</td>
                                            <td>{{$slot->from_time }}</td>
                                            <td>{{$slot->to_time }}</td>
                                            <td>{{$slot->price }}</td>
                                            <td>{{diff($slot->from_time,$slot->to_time ) }}</td>
                                           
                                         
                                            <td>
                                                @if($slot->status == "booked")
                                                    <span class="badge bg-blue">Booked</span>
                                                @else
                                                    <span class="badge bg-pink">Available</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($slot->status != "booked")
                                                <a href="{{ route('admin.booking-slot',$slot->id) }}" >
                                                    <span class="badge bg-blue">Book New Slot</span>
                                                </a>
                                              
                                                @endif
                                            </td>
                                         
                                            {{--<td>{{ $slot->updated_at }}</td>--}}
                                            <td class="text-center">
                                                @if($slot->status != "booked")
                                                {{-- <a href="{{ route('admin.slots.show',$slot->id) }}" class="btn btn-info waves-effect">
                                                    <i class="material-icons">visibility</i>
                                                </a> --}}
                                            
                                                <a href="{{ route('admin.slots.edit',$slot->id) }}" class="btn btn-info waves-effect">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <button class="btn btn-danger waves-effect" type="button" onclick="deleteSlot({{ $slot->id }})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $slot->id }}" action="{{ route('admin.slots.destroy',$slot->id) }}" method="SERVICE" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                @endif
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
        <!-- #END# Exportable Table -->
    </div>
@endsection

@push('js')
    <!-- Jquery DataTable Plugin Js -->
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
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deleteSlot(id) {
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