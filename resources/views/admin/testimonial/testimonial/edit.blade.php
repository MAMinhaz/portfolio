@extends('layouts.admin')

@section('title')
    | Edit Testimonial
@endsection

@section('admin_content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group pull-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('portfolio') }}">Your Portfolio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Admin Dashboard</a></li>
                        <li class="breadcrumb-item active">Portfolio - Testimonial Block</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Existing Testimonial Details</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-20 text-xs-center">
                <div class="card-block">
                    <form method="POST" action="{{ route('testimonial_edit_post') }}">
                        @csrf
                        <input type="hidden" name="value" value="{{ $testimonials->id }}">

                        <div class="form-group row">
                            <label class="col-3 col-form-label">Clients Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control" placeholder="Insert your client name" name="testimonial_given" value="{{ $testimonials->testimonial_given }}">
                            </div>

                            @error('testimonial_given')
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

                        <div class="form-group row">
                            <label class="col-3 col-form-label">Client's Designation</label>
                            <div class="col-9">
                                <input type="text" class="form-control" placeholder="Insert your clients designation here" name="designation" value="{{ $testimonials->designation }}">
                            </div>

                            @error('designation')
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

                        <div class="form-group row">
                            <label class="col-3 col-form-label">Testimonial</label>
                            <div class="col-9">
                                <input type="text" class="form-control" placeholder="Insert your testimonial here" name="testimonial" value="{{ $testimonials->testimonial }}">
                            </div>

                            @error('testimonial')
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

                        <div class="form-group row">
                            <label class="col-3 col-form-label">Client Image</label>
                            <div class="col-9">
                                <img src="{{ asset('uploads') }}/testimonial/testimonial_image/{{ $testimonials->testimonial_image }}" alt="image not found" class="img-fluid" height="300" width="400">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-inverse btn-rounded w-md waves-effect waves-light">Click To Complete Edit</button>
                    </form>
                    <br>
                    <a href="{{ route('testimonial_index') }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light">Return Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection