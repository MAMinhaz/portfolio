@extends('layouts.admin')

@section('title')
    | Edit Single Portfolio Details
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
                        <li class="breadcrumb-item active">Portfolio - Portfolio Section</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Existing Portfolio Details</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-20 text-xs-center">
                <div class="card-block">
                    <form method="POST" action="{{ route('portfolio_edit_post') }}">
                        @csrf

                        <div class="form-group row">
                            <input type="hidden" name="value" value="{{ $portfo_details->id }}">
                            <label class="col-3 col-form-label">Portfolio Title</label>
                            <div class="col-9">
                                <input type="text" class="form-control" placeholder="Insert Portfolio title Here" name="title" value="{{ $portfo_details->title }}">
                            </div>

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

                        <div class="form-group row">
                            <label class="col-3 col-form-label">Portfolio Description</label>
                            <div class="col-9">
                                <textarea class="form-control" name="description" cols="30" rows="10">{{ $portfo_details->description }}</textarea>
                            </div>

                            @error('description')
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
                            <label class="col-3 col-form-label">Portfolio Date</label>
                            <div class="col-9">
                                <input type="date" class="form-control" placeholder="Insert Portfolio date Here" name="date" value="{{ $portfo_details->date }}">
                            </div>

                            @error('date')
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
                            <label class="col-3 col-form-label">Client Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control" placeholder="Insert Your Client Name Here" name="clients" value="{{ $portfo_details->clients }}">
                            </div>

                            @error('clients')
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
                            <label class="col-3 col-form-label">Category Name</label>
                            <div class="col-9">
                                <select class="form-control" name="category_id">
                                    <option>Choose a category</option>
                                    @forelse ($portfolio_category as $cats)
                                        <option value="{{ $cats->id }}" {{ $portfo_details->category_id == $cats->id ? "selected" : "" }}>{{ $cats->category_name }}</option>
                                    @empty
                                        <option>There's no category available. Add category at first.</button></option>
                                    @endforelse
                                </select>
                            </div>

                            @error('category_id')
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
                    <a href="{{ route('portfolio_index') }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light">Return Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection