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
                    <h4 class="card-title">Blog Post's Tags</h4>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- about me skill flash message start --}}
                            <div>
                                {{-- flash error start --}}
                                @error('tag')
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
                                @if(session()->has('blog_tag_added'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('blog_tag_added') }}</strong>
                                    </div>
                                @endif

                                {{-- flash success -> blog tag edited start --}}
                                @if(session()->has('blog_tags_edited'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('blog_tags_edited') }}</strong>
                                    </div>
                                @endif

                                {{-- flash danger -> blog category deleted--}}
                                @if(session()->has('blog_tags_deletd'))
                                    <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('blog_tags_deletd') }}</strong>
                                    </div>
                                @endif
                            </div>

                            {{-- about me skills table start --}}
                            <a href="#blog_post_tag" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm" data-animation="contentscale" data-plugin="custommodal"
                            data-overlaySpeed="100" data-overlayColor="#36404a">Add Blog Post Tags</a>
                            <hr>
                            <table id="aaa" class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Serial number</th>
                                        <th>Blog Tags Name</th>
                                        <th>Added by</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blog_tags as $blog_tag)
                                        <tr>
                                            <td>{{ $loop->index ++ }}</td>
                                            <td>{{ $blog_tag->tag }}</td>
                                            <td>{{ users()->find($blog_tag->addedby)->name }}</td>
                                            <td>
                                                @isset($blog_tag->created_at)
                                                    <li>Date : {{ $blog_tag->created_at->format('d:m:Y') }}</li>
                                                    <li>Duration : {{ $blog_tag->created_at->diffForHumans() }}</li>
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($blog_tag->updated_at)
                                                    <li>Date : {{ $blog_tag->updated_at->format('d:m:Y') }}</li>
                                                    <li>Duration : {{ $blog_tag->updated_at->diffForHumans() }}</li>
                                                @endisset
                                            </td>
                                            <td>
                                                <a href="{{ route('blog_tag_edit', $blog_tag->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit Blog Tag</a>
                                                <a href="{{ route('blog_tag_hard_delete', $blog_tag->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Blog tag</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                {{-- blog category addition modal form --}}
                <div id="blog_post_tag" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Close</span>
                    </button>
                    <br>
                    <h4 class="custom-modal-title">Add Blog Tags</h4>
                    <div class="custom-modal-text">
                        <form method="POST" action="{{ route('blog_tags_create_post') }}">
                            @csrf

                            <div class="form-group">
                                <label>Tag Name</label>
                                <input type="text" class="form-control" name="tag">
                                <br>
                                <p>
                                    <strong>Notes your should follow to add milestone name</strong>
                                    <mark>
                                        <ul>
                                            <li>You cannot add milestone only four times. If you want to add another try to add after deleting previous one or edit it . </li>
                                            <li>Your Milestone should be unique.</li>
                                        </ul>
                                    </mark>
                                </p>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Tag</button>
                        </form>
                    </div>
                </div>
@endsection