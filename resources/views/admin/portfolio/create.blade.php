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
                                    <li class="breadcrumb-item active">Portfolio - Portfolio Section</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Portfolio Section's Content</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card m-b-20 text-xs-center">
                            <div class="card-header">
                                Create New Portfolio
                            </div>
                            <div class="card-block">
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('portfolio_create_post') }}" enctype="multipart/form-data">
                                    @csrf
                                    <h4 class="card-title">Portfolio Details</h4>
                                    <hr>

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Portfolio Title</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" placeholder="Insert Portfolio title Here" name="title">
                                        </div>
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

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Portfolio Description</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" placeholder="Insert Portfolio Description Here" name="description">
                                        </div>
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

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Portfolio Date</label>
                                        <div class="col-9">
                                            <input type="date" class="form-control" placeholder="Insert Portfolio date Here" name="date">
                                        </div>
                                        <br>
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
                                            <input type="text" class="form-control" placeholder="Insert Your Client Name Here" name="clients">
                                        </div>
                                        <br>
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
                                                <option value="cat">Choose a category</option>
                                                <option value="1">graphics</option>
                                                <option value="2">web design</option>
                                                <option value="3">web development</option>
                                                <option value="4">web programmign</option>
                                                <option value="5">MOtion graphic</option>
                                                <option value="6">seo</option>
                                                <option value="7">seo</option>
                                            </select>
                                        </div>
                                        <small>If you want to add a new category,,You must add it from below field.</small>
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

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">New Category Name</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" placeholder="Insert Your New Category Name Here" name="category_id_new">
                                        </div>
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

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Portfolio Thumbnail Picture</label>
                                        <div class="col-9">
                                            <input type="file" class="form-control" name="thumbnail_image">
                                        </div>
                                        <br>
                                        @error('thumbnail_image')
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
                                        <label class="col-3 col-form-label">Portfolio All Picture</label>
                                        <div class="col-9">
                                            <input type="file" class="form-control" name="portfo_image" multiple>
                                        </div>
                                        <br>
                                        @error('portfo_image')
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
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Create new portfolio</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

@endsection

@section('scripts')
@endsection