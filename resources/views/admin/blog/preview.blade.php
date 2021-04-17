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
                        <li class="breadcrumb-item active">Portfolio - Blog Block</li>
                    </ol>
                </div>
                <h4 class="page-title">Blog Post Preview</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-20 text-xs-center">
                <div class="card-block">
                    <h4 class="card-title">{{ $blog->title }}</h4>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                            Date : {{ $blog->created_at->format('d:m:Y') }}
                            </div>
                            <div class="col-sm">
                            Added {{ $blog->created_at->diffForHumans() }}
                            </div>
                            <div class="col-sm">
                            Category : {{ $blog->blog_category->category_name }}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('uploads') }}/blog/blog_thumbnail_image/{{ $blog->blog_thumbnail_image }}" alt="Blog Thumbnail Picture Not Found" class="img-fluid">
                    </div>

                    @php
                        echo $description;
                    @endphp


                    <a href="{{ route('blog_index') }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light">Return Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection