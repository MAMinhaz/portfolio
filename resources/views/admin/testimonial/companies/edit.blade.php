@extends('layouts.admin')

@section('title')
    | Edit Company
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
                <h4 class="page-title">Edit Existing Company Details</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-20 text-xs-center">
                <div class="card-block">
                    <form method="POST" action="{{ route('testimonial_companies_edit_post') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="value" value="{{ $companies->id }}">

                        <div class="form-group row">
                            <label class="col-3 col-form-label">Company Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control" placeholder="Insert your company name" name="company_name" value="{{ $companies->company_name }}">
                            </div>

                            @error('company_name')
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
                            <label class="col-3 col-form-label">Company Current Logo</label>
                            <div class="col-9">
                                <img src="{{ asset('uploads') }}/company_logo/{{ $companies->company_logo }}" alt="image not found" height="500" width="600">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-3 col-form-label">Company New Logo</label>
                            <div class="col-9">
                                <input type="file" class="form-control" name="company_logo">
                            </div>

                            @error('company_logo')
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

                        <button type="submit" class="btn btn-inverse btn-rounded w-md waves-effect waves-light">Click To Complete Edit</button>
                    </form>
                    <br>
                    <a href="{{ route('testimonial_index') }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light">Return Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection