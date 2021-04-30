@extends('layouts.admin')

@section('title')
    | Edit Specific Service
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
                                    <li class="breadcrumb-item active">Portfolio - Service Block</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Edit Existing Service</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card m-b-20 text-xs-center">
                            <div class="card-block">
                                <form method="POST" action="{{ route('service_edit_post') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label style="font-size: 130%">Service Title</label>
                                        <input type="text" class="form-control" name="service_title" value="{{ $services->service_title }}">
                                        <input type="hidden" value="{{ $services->id }}" name="value">
                                        <br>
                                        <p>
                                            <strong>Notes your should follow to add title</strong>
                                            <mark>
                                                <ul>
                                                    <li>Your Service title should be unique.</li>
                                                </ul>
                                            </mark>
                                        </p>

                                        @error('service_title')
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
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style="font-size: 130%">Service list 1</label>
                                                    <input type="text" class="form-control" name="service_list_1" value="{{ $services->service_list_1 }}">

                                                    @error('service_list_1')
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

                                                <div class="col-md-4">
                                                    <label style="font-size: 130%">Service list 2</label>
                                                    <input type="text" class="form-control" name="service_list_2" value="{{ $services->service_list_2 }}">

                                                    @error('service_list_2')
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

                                                <div class="col-md-4">
                                                    <label style="font-size: 130%">Service list 3</label>
                                                    <input type="text" class="form-control" name="service_list_3" value="{{ $services->service_list_3 }}">

                                                    @error('service_list_3')
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

                                                <div class="col-md-4">
                                                    <label style="font-size: 130%">Service list 4</label>
                                                    <input type="text" class="form-control" name="service_list_4" value="{{ $services->service_list_4 }}">

                                                    @error('service_list_4')
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

                                                <div class="col-md-4">
                                                    <label style="font-size: 130%">Service list 5</label>
                                                    <input type="text" class="form-control" name="service_list_5" value="{{ $services->service_list_5 }}">

                                                    @error('service_list_5')
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

                                                <div class="col-md-4">
                                                    <label style="font-size: 130%">Service list 6</label>
                                                    <input type="text" class="form-control" name="service_list_6" value="{{ $services->service_list_6 }}">

                                                    @error('service_list_6')
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
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-inverse btn-rounded w-md waves-effect waves-light">Click To Complete Edit</button>
                                </form>
                                    <br>
                                <a href="{{ route('service') }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light">Return Back</a>
                            </div>
                        </div>
                    </div>
                </div>

@endsection