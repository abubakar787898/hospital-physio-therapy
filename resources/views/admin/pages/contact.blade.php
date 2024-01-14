@extends('layouts.backend.app')

@section('title','Contact')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.contact.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Update Contact Page
                            </h2>
                        </div>
                        <div class="body">
                         
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="title" value="{{ $contact?->title }}">
                                    <label class="form-label">Contact Us</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="meta_title" class="form-control"  value="{{ $contact?->meta_title }}" name="meta_title" required>
                                    <label class="form-label">Meta Title</label>
                                </div>
                            </div>
                            
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea  id="meta_description" class="form-control"   name="meta_description" required> {{ $contact?->meta_description }}</textarea>
                                    <label class="form-label">Meta Description</label>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="image">Featured Image</label>
                                <input type="file" name="image">
                            </div>
                            <div class="card">
                                <div class="header bg-amber">
                                    <h2>
                                        Featured Image
                                    </h2>
                                </div>
                                <div class="body">
                                    <img class="img-responsive thumbnail" src="/image/{{ $contact->image }}" height="300" width="300" alt="">
                                </div>
                            </div> --}}

                            {{-- <div class="form-group">
                                <input type="checkbox" id="publish" class="filled-in" name="status" value="1" {{ $contact->status == true ? 'checked' : '' }}>
                                <label for="publish">Publish</label>
                            </div> --}}

                            {{-- <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.contacts.index') }}">BACK</a> --}}
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
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