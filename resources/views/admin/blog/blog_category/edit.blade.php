@extends('layouts.admin')

@section('title')
    | Edit Blog Post Category
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
                        <li class="breadcrumb-item active">Portfolio - Blog Block</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Existing Blog Category</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-20 text-xs-center">
                <div class="card-block">
                    <form method="POST" action="{{ route('blog_cat_edit_post') }}">
                        @csrf
                        <div class="form-group">
                            <label style="font-size: 130%">Blog Category Name</label>
                            <input type="text" class="form-control" name="category_name" value="{{ $blog_category->category_name }}">
                            <input type="hidden" value="{{ $blog_category->id }}" name="value">
                            <br>

                            @error('category_name')
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
                    <a href="{{ route('blog_cats_index') }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light">Return Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection