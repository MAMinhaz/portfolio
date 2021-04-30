@extends('layouts.admin')

@section('title')
    | Create New Blog
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
                <h4 class="page-title">Blog block's Content</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-20 text-xs-center">
                <div class="card-block">
                    <h4 class="card-title">Blog Category Addition Form</h4>
                    <form method="POST" action="{{ route('blog_post_create_post') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Blog Title</label>
                            <input type="text" class="form-control" name="title" required>
                            <br>

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
                            <label>Blog Category</label>
                            <select class="form-control" name="category_id" required>
                                <option value="1">Select Blog Category</option>
                                @foreach($blog_cats as $blog_cat)
                                    <option value="{{ $blog_cat->id }}">{{ $blog_cat->category_name }}</option>
                                @endforeach
                            </select>
                            <br>

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


                        <div class="form-group">
                            <label>Blog Details</label>
                            <textarea id="elm1" name="description" required></textarea>
                            <br>

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


                        <div class="form-group">
                            <label>Blog Thumbnail Picture</label>
                            <input type="file" class="form-control" name="blog_thumbnail_image">
                            <br>

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
                        </div>


                        <button type="submit" class="btn btn-inverse btn-rounded w-md waves-effect waves-light">Add Blog Post</button>
                    </form>
                    <br>
                    <a href="{{ route('blog_index') }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light">Return Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            if($("#elm1").length > 0){
                tinymce.init({
                    selector: "textarea#elm1",
                    theme: "modern",
                    height:300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
        });
    </script>
@endsection