@extends('layouts.admin')

@section('admin_content')

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('portfolio') }}">Your Portfolio</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Admin Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('landview') }}">Portfolio - landview content</a></li>
                                    <li class="breadcrumb-item active">Portfolio - edit landview content</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Landview Content Edit</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card m-b-20 text-xs-center">
                            <div class="card-header">
                                Landview Content Edit
                            </div>
                            <div class="card-block">
                                <h4 class="card-title">Create Landview Content</h4>
                                <form method="POST" action="{{ route('landview_edit_post') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Landview Title</label>
                                        <input type="hidden" value="{{ $landviews->id }}" name="idlandview">
                                        <input type="text" class="form-control" name="title" value="{{ $landviews->title }}">

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
                                        <input type="text" class="form-control" name="name" value="{{ $landviews->name }}">

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
                                        <input type="text" class="form-control" name="profession_name" value="{{ $landviews->profession_name }}">

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