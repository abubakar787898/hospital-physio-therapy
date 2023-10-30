@extends('layouts.backend.app')

@section('title','Team')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('admin.teams.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               ADD NEW TEAM
                            </h2>
                        </div>
                        <div class="body">
                          
                             
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="title" class="form-control" name="title" required>
                                        <label class="form-label">Title</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image">Featured Image</label>
                                    <input type="file" name="image" required>
                                </div>

                            <div class="form-group">
                                <select name="type" id="type" class="form-control"  >
                                   
                                        <option value="team" selected>Team</option>
                                        <option value="slider">Slider</option>
                                  
                                </select>
                             
                            </div>
                          
                        </div>
                    </div>
                </div>
              
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                             Social Media Links
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-6">
                           
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="fb_link" class="form-control" name="fb_link" >
                                    <label class="form-label">Facebook Link</label>
                                </div>
                            </div>
                        </div>
                                <div class="col-md-6">
                           
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="insta_link" class="form-control" name="insta_link" >
                                            <label class="form-label">Instagram Link</label>
                                        </div>
                                    </div>
                        </div>
                                <div class="col-md-6">
                           
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="youtube_link" class="form-control" name="youtube_link" >
                                            <label class="form-label">Youtube Link</label>
                                        </div>
                                    </div>
                        </div>
                                <div class="col-md-6">
                           
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="twitter_link" class="form-control" name="twitter_link" >
                                            <label class="form-label">Twitter Link</label>
                                        </div>
                                    </div>
                        </div>
                                <div class="col-md-6">
                           
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="linkedin_link" class="form-control" name="linkedin_link" >
                                            <label class="form-label">Linkedin Link</label>
                                        </div>
                                    </div>
                        </div>
                        <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.teams.index') }}">BACK</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               BODY
                            </h2>
                        </div>
                        <div class="body">
                            <textarea id="tinymce" name="description" ></textarea>
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