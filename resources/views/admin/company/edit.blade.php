@extends('layouts.backend.app')

@section('title','Service')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.companies.update',$company->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               EDIT COMPANY
                            </h2>
                        </div>
                        <div class="body">
                          
                           
                           
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="title" class="form-control" name="name" value="{{$company->name}}" required>
                                        <label class="form-label">Title</label>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="image"> Image</label>
                                    <input type="file" name="image" >
                                </div>
                                <div class="card">
                                    <div class="header bg-amber">
                                        <h2>
                                             Image
                                        </h2>
                                    </div>
                                    <div class="body">
                                        <img class="img-responsive thumbnail" src="/image/{{ $company->image }}" height="300" width="300" alt="">
                                    </div>

                                    <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.companies.index') }}">BACK</a>
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