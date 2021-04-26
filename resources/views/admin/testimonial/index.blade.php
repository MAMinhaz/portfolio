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
                                    <li class="breadcrumb-item active">Portfolio - Testimonial Content</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Testimonial Content</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                {{-- testimonial block start --}}
                <div id="testimonials" class="card m-b-20 card-block mt-3 mb-3">
                    <h4 class="card-title">Testimonial</h4>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- testimonial flash message --}}
                            <div>
                                {{-- flash error --}}
                                @error('testimonial_given')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong> 
                                    </div>
                                @enderror

                                @error('designation')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong> 
                                    </div>
                                @enderror

                                @error('testimonial')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong> 
                                    </div>
                                @enderror

                                @error('testimonial_image')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong> 
                                    </div>
                                @enderror

                                {{-- flash success -> testimonial added --}}
                                @if(session()->has('testimonial_add_done'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('testimonial_add_done') }}</strong>
                                    </div>
                                @endif

                                {{-- flash success -> testimonial edited --}}
                                @if(session()->has('testimonial_edit_done'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('testimonial_edit_done') }}</strong>
                                    </div>
                                @endif

                                {{-- flash success -> testimonial shown --}}
                                @if(session()->has('testimonial_show_done'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('testimonial_show_done') }}</strong>
                                    </div>
                                @endif

                                {{-- flash warning -> testeimonial hidden --}}
                                @if(session()->has('testimonial_hide_done'))
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('testimonial_hide_done') }}</strong>
                                    </div>
                                @endif

                                {{-- flash danger -> testimonial deleted --}}
                                @if(session()->has('testimonial_deleted'))
                                    <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('testimonial_deleted') }}</strong>
                                    </div>
                                @endif
                            </div>

                            {{-- testimonial data table --}}
                            <a href="#testi_add" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm" data-animation="contentscale" data-plugin="custommodal"
                            data-overlaySpeed="100" data-overlayColor="#36404a">Add Testimonials</a>
                            <hr>
                            <table class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Serial number</th>
                                        <th>Testimonial given by</th>
                                        <th>designation</th>
                                        <th>Testimonial</th>
                                        <th>Testimonial Writer</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($testimonials as $testimonial)
                                        <tr>
                                            <td>{{ $loop->index ++ }}</td>
                                            <td>{{ $testimonial->testimonial_given }}</td>
                                            <td>{{ $testimonial->designation }}</td>
                                            <td>{{ $testimonial->testimonial }}</td>
                                            <td>
                                                <img src="{{ asset('uploads') }}/testimonial/testimonial_image/{{ $testimonial->testimonial_image }}" class="img-fluid" alt="Image not found">
                                            </td>
                                            <td>
                                                @isset($testimonial->created_at)
                                                    <li>Time : {{ $testimonial->created_at->format('h:i:s A') }}</li>
                                                    <li>Date : {{ $testimonial->created_at->format('d:m:Y') }}</li>
                                                    <li>Duration : {{ $testimonial->created_at->diffForHumans() }}</li>
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($testimonial->updated_at)
                                                    <li>Time : {{ $testimonial->updated_at->format('h:i:s A') }}</li>
                                                    <li>Date : {{ $testimonial->updated_at->format('d:m:Y') }}</li>
                                                    <li>Duration : {{ $testimonial->updated_at->diffForHumans() }}</li>
                                                @endisset
                                            </td>
                                            <td>
                                                <a href="{{ route('testimonial_edit', $testimonial->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit Testimonial</a>
                                                <a href="{{ route('testimonial_hard_delete', $testimonial->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Testimonial</a>
                                                @if($testimonial->show_status == 1)
                                                    <a href="{{ route('testimonial_show', $testimonial->id) }}" class="btn btn-inverse btn-rounded w-md waves-effect waves-light w-sm btn-sm">Show Testimonial</a>
                                                @elseif($testimonial->show_status == 2)
                                                    <a href="{{ route('testimonial_hide', $testimonial->id) }}" class="btn btn-inverse btn-rounded w-md waves-effect waves-light w-sm btn-sm">Hide Testimonial</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                {{-- companies block  --}}
                <div id="company" class="card m-b-20 card-block mt-3 mb-3">
                    <h4 class="card-title">Companies</h4>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- testimonial flash message --}}
                            <div>
                                {{-- flash error --}}
                                @error('company_name')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong> 
                                    </div>
                                @enderror

                                @error('company_logo')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong> 
                                    </div>
                                @enderror

                                {{-- flash success -> testimonial added --}}
                                @if(session()->has('company_added'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('company_added') }}</strong>
                                    </div>
                                @endif

                                {{-- flash success -> testimonial edited --}}
                                @if(session()->has('company_edited'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('company_edited') }}</strong>
                                    </div>
                                @endif

                                {{-- flash success -> testimonial shown --}}
                                @if(session()->has('testimonial_companies_show_done'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('testimonial_companies_show_done') }}</strong>
                                    </div>
                                @endif

                                {{-- flash warning -> testeimonial hidden --}}
                                @if(session()->has('testimonial_companies_hidden_done'))
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('testimonial_companies_hidden_done') }}</strong>
                                    </div>
                                @endif

                                {{-- flash danger -> testimonial deleted --}}
                                @if(session()->has('testimonial_company_deleted'))
                                    <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('testimonial_company_deleted') }}</strong>
                                    </div>
                                @endif
                            </div>

                            {{-- testimonial data table --}}
                            <a href="#company" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm" data-animation="contentscale" data-plugin="custommodal"
                            data-overlaySpeed="100" data-overlayColor="#36404a">Add Company</a>
                            <hr>
                            <table class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Serial number</th>
                                        <th>Company Name</th>
                                        <th>Company Logo</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($companies as $companie)
                                        <tr>
                                            <td>{{ $loop->index ++ }}</td>
                                            <td>{{ $companie->company_name }}</td>
                                            <td>
                                                <img src="{{ asset('uploads') }}/company_logo/{{ $companie->company_logo }}" alt="image not found" height="400" width="500">
                                            </td>
                                            <td>
                                                @isset($companie->created_at)
                                                    <li>Time : {{ $companie->created_at->format('h:i:s A') }}</li>
                                                    <li>Date : {{ $companie->created_at->format('d:m:Y') }}</li>
                                                    <li>Duration : {{ $companie->created_at->diffForHumans() }}</li>
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($companie->updated_at)
                                                    <li>Time : {{ $companie->updated_at->format('h:i:s A') }}</li>
                                                    <li>Date : {{ $companie->updated_at->format('d:m:Y') }}</li>
                                                    <li>Duration : {{ $companie->updated_at->diffForHumans() }}</li>
                                                @endisset
                                            </td>
                                            <td>
                                                <a href="{{ route('testimonial_companies_edit', $companie->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit Company</a>
                                                <a href="{{ route('testimonial_companies_hard_delete', $companie->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Company</a>
                                                @if($companie->show_status == 1)
                                                    <a href="{{ route('testimonial_companies_show', $companie->id) }}" class="btn btn-inverse btn-rounded w-md waves-effect waves-light w-sm btn-sm">Show Company</a>
                                                @elseif($companie->show_status == 2)
                                                    <a href="{{ route('testimonial_companies_hide', $companie->id) }}" class="btn btn-inverse btn-rounded w-md waves-effect waves-light w-sm btn-sm">Hide Company</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                {{-- testimonial  addition modal form --}}
                <div id="testi_add" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Close</span>
                    </button>
                    <br>
                    <h4 class="custom-modal-title">Add new testimonial</h4>
                    <div class="custom-modal-text">
                        <form method="POST" action="{{ route('testimonial_create_post') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Client Name</label>
                                <input type="text" class="form-control" name="testimonial_given">
                            </div>

                            <div class="form-group">
                                <label>Client Designation</label>
                                <input type="text" class="form-control" name="designation">
                            </div>

                            <div class="form-group">
                                <label>Testimonial</label><br>
                                <textarea name="testimonial"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Client Picture</label>
                                <input type="file" class="form-control" name="testimonial_image">
                            </div>

                            <button type="submit" class="btn btn-primary">Add testimonial</button>
                        </form>
                    </div>
                </div>

                {{-- testimonial  addition modal form --}}
                <div id="company" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Close</span>
                    </button>
                    <br>
                    <h4 class="custom-modal-title">Add new company</h4>
                    <div class="custom-modal-text">
                        <form method="POST" action="{{ route('testimonial_companies_create_post') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" class="form-control" name="company_name">
                            </div>

                            <div class="form-group">
                                <label>Company Logo</label>
                                <input type="file" class="form-control" name="company_logo">
                            </div>

                            <button type="submit" class="btn btn-primary">Add Company</button>
                        </form>
                    </div>
                </div>
@endsection

@section('scripts')
@endsection