@extends('layouts.backend.app')

@section('title','Payment')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        {{-- <div class="block-header">
            <a class="btn btn-primary waves-effect" href="{{ route('admin.s.create') }}">
                <i class="material-icons">add</i>
                <span>Add New PatientBooking</span>
            </a>
        </div> --}}
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ALL PAYMENTS
                            <span class="badge bg-blue">{{ $payments->count() }}</span>
                        </h2>
                    </div>
                    
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Booking Id</th>
                                    <th>Transaction Id</th>
                                     <th>Amount</th>
                                    <th>Currency</th>
                                    <th>Last Four Digit</th>
                                    <th>Status</th>                  

                                    <th>Payment Date</th>                  
                                    {{-- <th>Action</th> --}}
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Booking Id</th>
                                    <th>Transaction Id</th>
                                     <th>Amount</th>
                                    <th>Currency</th>
                                    <th>Last Four Digit</th>
                                    <th>Status</th>                  
                                    <th>Payment Date</th>                  
                                    {{-- <th>Action</th> --}}
                                </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($payments as $key=>$payment)
                                  
                                        <tr>
                                            <td>{{ $payment->id }}</td>
                                            <td>{{ $payment?->booking?->f_name ." ".$payment?->booking?->l_name}}</td>
                                            <td>{{ $payment?->booking?->email}}</td>
                                            <td>{{ $payment?->patient_booking_id}}</td>
                                            <td>{{ $payment?->transaction_id}}</td>
                                            <td>{{ ($payment?->amount)/100}}</td>
                                            <td>{{ $payment?->currency}}</td>
                                            <td>{{ $payment?->card_last_four}}</td>
                                            <td>{{ $payment?->status}}</td>
                                            <td> {{ \Carbon\Carbon::parse( $payment?->payment_date)->format('d-m-Y') }}</td>


                                            {{-- <td class="text-center">
                                                <a href="{{ route('admin.payments.show',$payment->id) }}" class="btn btn-info waves-effect">
                                                    <i class="material-icons">visibility</i>
                                                </a>
                                                <a href="{{ route('admin.payments.edit',$payment->id) }}" class="btn btn-info waves-effect">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <button class="btn btn-danger waves-effect" type="button" onclick="deletePatientBooking({{ $payment->id }})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $payment->id }}" action="{{ route('admin.payments.destroy',$payment->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td> --}}
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
        function deletePatientBooking(id) {
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