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
                                    <li class="breadcrumb-item active">Portfolio - Portfolio Content</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Portfolio Content</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                {{-- portfolio category block start --}}
                <div class="card m-b-20 card-block mt-3 mb-3">
                    <h4 class="card-title">Portfolio's Category</h4>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- portofolio flash message start --}}
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
                                {{-- flash error end --}}

                                {{-- flash success -> portfolio category added start --}}
                                @if(session()->has('portfo_cat_done'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('portfo_cat_done') }}</strong>
                                    </div>
                                @endif
                                {{-- flash success -> portfolio category added end --}}

                                {{-- flash success -> portfolio category edited start --}}
                                @if(session()->has('portfo_cat_edit_done'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('portfo_cat_edit_done') }}</strong>
                                    </div>
                                @endif
                                {{-- flash success -> portfolio category edited end --}}

                                {{-- flash danger -> portfolio category deleted start --}}
                                @if(session()->has('portfo_cat_destroyed'))
                                    <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('portfo_cat_destroyed') }}</strong>
                                    </div>
                                @endif
                                {{-- flash danger -> portfolio category deleted end --}}
                            </div>
                            {{-- portofolio flash message end --}}

                            {{-- portfolio category table start --}}
                            <a href="#portfo_cat" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm" data-animation="contentscale" data-plugin="custommodal"
                            data-overlaySpeed="100" data-overlayColor="#36404a">Add Portfolio's Category</a>
                            <hr>
                            <table class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Serial number</th>
                                        <th>Portfolio Category Name</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($portfolio_category as $portfo_cat)
                                        <tr>
                                            <td>{{ $loop->index ++ }}</td>
                                            <td>{{ $portfo_cat->category_name }}</td>
                                            <td>
                                                @isset($portfo_cat->created_at)
                                                    <li>Time : {{ $portfo_cat->created_at->format('h:i:s A') }}</li>
                                                    <li>Date : {{ $portfo_cat->created_at->format('d:m:Y') }}</li>
                                                    <li>Duration : {{ $portfo_cat->created_at->diffForHumans() }}</li>
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($portfo_cat->updated_at)
                                                    <li>Time : {{ $portfo_cat->updated_at->format('h:i:s A') }}</li>
                                                    <li>Date : {{ $portfo_cat->updated_at->format('d:m:Y') }}</li>
                                                    <li>Duration : {{ $portfo_cat->updated_at->diffForHumans() }}</li>
                                                @endisset
                                            </td>
                                            <td>
                                                <a href="{{ route('portfolio_cat_edit', $portfo_cat->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit Category</a>
                                                <a href="{{ route('portfolio_cat_hard_delete', $portfo_cat->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Category</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- portfolio category table end --}}
                        </div>
                    </div>
                </div>
                {{-- portfolio category block end --}}


                {{-- portfolio details block start --}}
                <div class="card m-b-20 card-block mt-3 mb-3">
                    <h4 class="card-title">Portfolio's Details</h4>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- portofolio flash message start --}}
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
                                {{-- flash error end --}}

                                {{-- flash warning -> about me milestone limit crossed start --}}
                                @if(session()->has('aboutme_ms_limit_4'))
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('aboutme_ms_limit_4') }}</strong>
                                    </div>
                                @endif
                                {{-- flash warning -> about me milestone limit crossed end --}}

                                {{-- flash success -> about me milestone added start --}}
                                @if(session()->has('portfo_details_done'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('portfo_details_done') }}</strong>
                                    </div>
                                @endif
                                {{-- flash success -> about me milestone added end --}}

                                {{-- flash success -> portfolio details edited start --}}
                                @if(session()->has('portfo_details_edit_done'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('portfo_details_edit_done') }}</strong>
                                    </div>
                                @endif
                                {{-- flash success -> portfolio details edited end --}}

                                {{-- flash danger -> about me milestone deleted start --}}
                                @if(session()->has('aboutme_ms_deleted'))
                                    <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('aboutme_ms_deleted') }}</strong>
                                    </div>
                                @endif
                                {{-- flash danger -> about me milestone deleted end --}}
                            </div>
                            {{-- portofolio flash message end --}}

                            {{-- about me skills table start --}}
                            <a href="#portfo_details" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm" data-animation="contentscale" data-plugin="custommodal"
                            data-overlaySpeed="100" data-overlayColor="#36404a">Add Portfolio's Details</a>
                            <hr>
                            <table id="aaa" class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Serial number</th>
                                        <th>Portfolio Title</th>
                                        <th>Portfolio Description</th>
                                        <th>Portfolio Date</th>
                                        <th>Clients</th>
                                        <th>Category</th>
                                        <th>Thumbnail Image</th>
                                        <th>Portfolio Image</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($portfolio as $portfo)
                                        <tr>
                                            <td>{{ $loop->index ++ }}</td>
                                            <td>{{ $portfo->title }}</td>
                                            <td>{{ $portfo->description }}</td>
                                            <td>{{ $portfo->date }}</td>
                                            <td>{{ $portfo->clients }}</td>
                                            <td>{{ $portfo->portfolio_cats->category_name }}</td>
                                            <td>
                                                @isset($portfo->thumbnail_image)
                                                    <img src="{{ asset('uploads') }}/portfolios/thumbnail_image/{{ $portfo->thumbnail_image }}" class="img-fluid" alt="Image not found">
                                                @endisset
                                            </td>
                                            <td>
                                                @forelse($portfo->portfolio_image->where('portfo_id', $portfo->id) as $image)
                                                    <img src="{{ asset('uploads') }}/portfolios/portfo_image/{{ $image->portfo_image }}" class="img-fluid" alt="Image not found">
                                                @empty
                                                    <p>nai</p>
                                                @endforelse
                                            </td>
                                            <td>
                                                @isset($portfo->created_at)
                                                    <li>Time : {{ $portfo->created_at->format('h:i:s A') }}</li>
                                                    <li>Date : {{ $portfo->created_at->format('d:m:Y') }}</li>
                                                    <li>Duration : {{ $portfo->created_at->diffForHumans() }}</li>
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($portfo->updated_at)
                                                    <li>Time : {{ $portfo->updated_at->format('h:i:s A') }}</li>
                                                    <li>Date : {{ $portfo->updated_at->format('d:m:Y') }}</li>
                                                    <li>Duration : {{ $portfo->updated_at->diffForHumans() }}</li>
                                                @endisset
                                            </td>
                                            <td>
                                                <a href="{{ route('portfolio_edit', $portfo->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit Portfolio</a>
                                                <a href="{{ route('portfolio_hard_delete', $portfo->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Portfolio</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- about me skills table end --}}
                        </div>
                    </div>
                </div>
                {{-- portfolio details block end --}}


                {{-- portfolio category addition modal form start --}}
                <div id="portfo_cat" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Close</span>
                    </button>
                    <br>
                    <h4 class="custom-modal-title">Add new category</h4>
                    <div class="custom-modal-text">
                        <form method="POST" action="{{ route('portfolio_cat_create_post') }}">
                            @csrf

                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" name="category_name">
                                <br>
                                {{-- <p>
                                    <strong>Notes your should follow to add milestone name</strong>
                                    <mark>
                                        <ul>
                                            <li>You cannot add milestone only four times. If you want to add another try to add after deleting previous one or edit it . </li>
                                            <li>Your Milestone should be unique.</li>
                                        </ul>
                                    </mark>
                                </p> --}}
                            </div>

                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </form>
                    </div>
                </div>
                {{-- portfolio category addition modal form end --}}


                {{-- portfolio category addition modal form start --}}
                <div id="portfo_details" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Close</span>
                    </button>
                    <br>
                    <h4 class="custom-modal-title">Add new category</h4>
                    <div class="custom-modal-text">
                        <form method="POST" action="{{ route('portfolio_create_post') }}" enctype="multipart/form-data">
                            @csrf

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Portfolio Title</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" placeholder="Insert Portfolio title Here" name="title">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Portfolio Description</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" placeholder="Insert Portfolio Description Here" name="description">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Portfolio Date</label>
                                        <div class="col-9">
                                            <input type="date" class="form-control" placeholder="Insert Portfolio date Here" name="date">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Client Name</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" placeholder="Insert Your Client Name Here" name="clients">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Category Name</label>
                                        <div class="col-9">
                                            <select class="form-control" name="category_id">
                                                <option>Choose a category</option>
                                                @forelse ($portfolio_category as $cats)
                                                    <option value="{{ $cats->id }}">{{ $cats->category_name }}</option>
                                                @empty
                                                    <option>There's no category available. Add category at first.</button></option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Portfolio Thumbnail Picture</label>
                                        <div class="col-9">
                                            <input type="file" class="form-control" name="thumbnail_image">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Portfolio All Picture</label>
                                        <div class="col-9">
                                            <input type="file" class="form-control" name="portfo_image[]" multiple>
                                        </div>
                                    </div>

                            <button type="submit" class="btn btn-primary">Add Portfolio</button>
                        </form>
                    </div>
                </div>
                {{-- portfolio category addition modal form end --}}
@endsection