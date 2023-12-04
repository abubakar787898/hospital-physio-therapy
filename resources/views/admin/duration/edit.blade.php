@extends('layouts.backend.app')

@section('title','Duration')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.durations.update',$duration->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               EDIT DURATION
                            </h2>
                        </div>
                        <div class="body">
                          
                           
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" min="1" id="duration" class="form-control" name="duration" value="{{$duration->duration}}" required>
                                    <label class="form-label">Duration in Minutes</label>
                                   
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" id="amount" class="form-control" name="amount" value="{{$duration->amount}}" required>
                                    <label class="form-label">Amount In Euro</label>
                                   
                                </div>
                            </div>
                         
                              

                                    <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.durations.index') }}">BACK</a>
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                                </div>
                        
                          
                        </div>
                    </div>
                </div>
              
            </div>
          
        </form>
    </div>
@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
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
    </script>

@endpush