@extends('layouts.admin')

@section('title')
    | Blog Post Categories
@endsection

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
                <h4 class="page-title">Blog Post's Category</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->


    {{-- about me milestone block start --}}
    <div class="card m-b-20 card-block mt-3 mb-3">
        <div class="row">
            <div class="col-md-12">
                {{-- about me skill flash message start --}}
                <div>
                    {{-- flash error start --}}
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

                    {{-- flash success -> blog category added --}}
                    @if(session()->has('blog_cat_added'))
                        <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="false">×</span>
                            </button>
                            <strong>{{ session('blog_cat_added') }}</strong>
                        </div>
                    @endif

                    {{-- flash success -> blog category edited start --}}
                    @if(session()->has('blog_cats_edited'))
                        <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="false">×</span>
                            </button>
                            <strong>{{ session('blog_cats_edited') }}</strong>
                        </div>
                    @endif

                    {{-- flash danger -> blog category deleted--}}
                    @if(session()->has('blog_cats_deleted'))
                        <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('blog_cats_deleted') }}</strong>
                        </div>
                    @endif
                </div>

                {{-- about me skills table start --}}
                <a href="#blog_post_cat" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm" data-animation="contentscale" data-plugin="custommodal"
                data-overlaySpeed="100" data-overlayColor="#36404a">Add Blog Post Category</a>
                <hr>
                <table id="blog_cat" class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                    <thead>
                        <tr>
                            <th>Serial number</th>
                            <th>Blog Category Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blog_cats as $blog_cat)
                            <tr>
                                <td>{{ $loop->index ++ }}</td>
                                <td>{{ $blog_cat->category_name }}</td>
                                <td>
                                    <a href="{{ route('blog_cat_edit', $blog_cat->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit Blog Category</a>
                                    <a href="{{ route('blog_cats_hard_delete', $blog_cat->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Blog Category</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- blog category addition modal form --}}
    <div id="blog_post_cat" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <br>
        <h4 class="custom-modal-title">Add Blog Category</h4>
        <div class="custom-modal-text">
            <form method="POST" action="{{ route('blog_cats_create_post') }}">
                @csrf

                <div class="form-group">
                    <label style="font-size: 150%">Blog Category Name</label>
                    <input type="text" class="form-control" name="category_name">
                    <br>
                    <p>
                        <strong>Notes your should follow to add milestone name</strong>
                        <mark>
                            <ul>
                                <li>Your category name should be unique.</li>
                            </ul>
                        </mark>
                    </p>
                </div>

                <button type="submit" class="btn btn-primary">Add Blog Category</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#blog_cat').DataTable();
        });
    </script>
@endsection