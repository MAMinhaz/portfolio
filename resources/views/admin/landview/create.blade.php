@extends('layouts.admin')

@section('admin_content')

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('portoview') }}">Your Portfolio</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Admin Dashboard</a></li>
                                    <li class="breadcrumb-item active">Portfolio - landview content</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Landview Content</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card m-b-20 text-xs-center">
                            <div class="card-header">
                                Landview Content
                            </div>
                            <div class="card-block">
                                <h4 class="card-title">Create Landview Content</h4>
                                <form method="POST" action="{{ route('landview_create_post') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Landview Title</label>
                                        <input type="text" class="form-control" name="title">
                                        <br>
                                        <p>
                                            <strong>Notes your should follow to add title</strong>
                                            <mark>
                                                <ul>
                                                    <li>You cannot add homepage title only once. If you want to add another try to add after deleting previous title or edit it . </li>
                                                </ul>
                                            </mark>
                                        </p>

                                        @error('title')
                                            <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                                                role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong>{{ $message }}</strong> 
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Landview Name</label>
                                        <input type="text" class="form-control" name="name">
                                        <br>
                                        <p>
                                            <strong>Notes your should follow to add name</strong>
                                            <mark>
                                                <ul>
                                                    <li>You cannot add homepage name only once. If you want to add another try to add after deleting previous title or edit it. </li>
                                                </ul>
                                            </mark>
                                        </p>

                                        @error('name')
                                            <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                                                role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong>{{ $message }}</strong> 
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Landview profession name</label>
                                        <input type="text" class="form-control" name="profession_name">
                                        <br>
                                        <p>
                                            <strong>Notes your should follow to add your professison name</strong>
                                            <mark>
                                                <ul>
                                                    <li>You can add profession three times to your homepage. If you want to add another try to add after deleting previous profession name. </li>
                                                </ul>
                                            </mark>
                                        </p>

                                        @error('profession_name')
                                            <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                                                role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <strong>{{ $message }}</strong> 
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Landview Display picture</label>
                                        <input type="file" name="landview_image" class="form-control" onchange="readURL(this);">
                                        <img class="hidden" id="tenant_photo_viewer" src="#" alt="your image" />
                                        <style media="screen">
                                            .hidden {
                                                display: none;
                                            }
                                        </style>
                                        <script>
                                            function readURL(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        $('#tenant_photo_viewer').attr('src', e.target.result).width(150).height(150);
                                                    };
                                                    $('#tenant_photo_viewer').removeClass('hidden');
                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        </script>
                                        <br>
                                        <p>
                                            <strong>Notes your should follow to add your professison name</strong>
                                            <mark>
                                                <ul>
                                                    <li>You can add profession three times to your homepage. If you want to add another try to add after deleting previous profession name. </li>
                                                </ul>
                                            </mark>
                                        </p>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                    <br>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>

@endsection

@section('scripts')
@endsection