@extends('layouts.admin')

@section('admin_content')

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('portfolio') }}">Portfolio</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Admin Dashboard</a></li>
                                    <li class="breadcrumb-item active">Portfolio - Blog Block</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Blog Block Content</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                {{-- about me milestone block start --}}
                <div class="card m-b-20 card-block mt-3 mb-3">
                    <h4 class="card-title">Blog Post</h4>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- about me skill flash message start --}}
                            <div>
                                {{-- flash error start --}}
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

                                @error('blog_thumbnail_image')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong> 
                                    </div>
                                @enderror

                                {{-- flash success -> blog post added --}}
                                @if(session()->has('blog_added'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('blog_added') }}</strong>
                                    </div>
                                @endif

                                {{-- flash success -> blog post edited start --}}
                                @if(session()->has('blog_edited'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('blog_edited') }}</strong>
                                    </div>
                                @endif

                                {{-- flash danger -> blog post deleted--}}
                                @if(session()->has('blog_deleted'))
                                    <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('blog_deleted') }}</strong>
                                    </div>
                                @endif
                            </div>

                            {{-- about me skills table start --}}
                            <a href="{{ route('blog_post_create') }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Add New Blog Post</a>
                            <hr>
                            <table id="aaa" class="table m-0 table-colored-bordered table-bordered-inverse">
                                <thead>
                                    <tr>
                                        <th>Serial number</th>
                                        <th>Blog Title</th>
                                        <th>Blog Category Name</th>
                                        <th>Blog Thumbnail Picture</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td>{{ $loop->index ++ }}</td>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->blog_category->category_name }}</td>
                                            <td>
                                                <img src="{{ asset('uploads') }}/blog/blog_thumbnail_image/{{ $blog->blog_thumbnail_image }}" alt="Blog Thumbnail Picture Not Found" class="img-fluid">
                                            </td>
                                            <td>
                                                @isset($blog->created_at)
                                                    <li>Date : {{ $blog->created_at->format('d:m:Y') }}</li>
                                                    <li>Duration : {{ $blog->created_at->diffForHumans() }}</li>
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($blog->updated_at)
                                                    <li>Date : {{ $blog->updated_at->format('d:m:Y') }}</li>
                                                    <li>Duration : {{ $blog->updated_at->diffForHumans() }}</li>
                                                @endisset
                                            </td>
                                            <td>
                                                <a href="{{ route('blog_post_preview', $blog->id) }}" class="btn btn-inverse btn-rounded w-md waves-effect waves-light w-sm btn-sm">Preview Blog Post</a>
                                                <a href="{{ route('blog_post_edit', $blog->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit Blog Post</a>
                                                <a href="{{ route('blog_post_hard_delete', $blog->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Blog Post</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
@endsection