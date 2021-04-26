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
                                    <li class="breadcrumb-item active">Portfolio - Frontend Customization</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Contact Information and Social Links</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                {{-- Contact Information block --}}
                <div id="main_contact_information" class="card m-b-20 card-block mt-3 mb-3">
                    <h4 class="card-title">Social Links</h4>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- contact info flash message start --}}
                            <div>
                                @error('email')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                @error('cell_number')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                @error('address')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                {{-- flash success -> contact information added--}}
                                @if(session()->has('contact_info_added'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('contact_info_added') }}</strong>
                                    </div>
                                @endif

                                {{-- flash success -> contact information shown--}}
                                @if(session()->has('contact_info_shown'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('contact_info_shown') }}</strong>
                                    </div>
                                @endif

                                {{-- flash warning -> contact information hidden --}}
                                @if(session()->has('contact_info_hidden'))
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('contact_info_hidden') }}</strong>
                                    </div>
                                @endif

                                {{-- flash warning -> contact information addition limit --}}
                                @if(session()->has('contact_add_limit'))
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('contact_add_limit') }}</strong>
                                    </div>
                                @endif

                                {{-- flash success -> contact info edited --}}
                                @if(session()->has('contact_info_edited'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('contact_info_edited') }}</strong>
                                    </div>
                                @endif

                                {{-- flash danger -> contact info deleted--}}
                                @if(session()->has('contact_info_deleted'))
                                    <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('contact_info_deleted') }}</strong>
                                    </div>
                                @endif
                            </div>

                            {{-- about me description table start --}}
                            <a href="#f_contact_info" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm" data-animation="contentscale" data-plugin="custommodal"
                            data-overlaySpeed="100" data-overlayColor="#36404a">Add New Social Link</a>
                            <hr>
                            <table id="aaa" class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Serial number</th>
                                        <th>Email Address</th>
                                        <th>Contact Number</th>
                                        <th>Your Address</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contactinfo as $contact)
                                        <tr>
                                            <td>{{ $loop->index ++ }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->cell_number }}</td>
                                            <td>{{ $contact->address }}</td>
                                            <td>
                                                @isset($contact->created_at)
                                                    <li>Date : {{ $contact->created_at->format('d:m:Y') }}</li>
                                                    <li>Duration : {{ $contact->created_at->diffForHumans() }}</li>
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($contact->updated_at)
                                                    <li>Date : {{ $contact->updated_at->format('d:m:Y') }}</li>
                                                    <li>Duration : {{ $contact->updated_at->diffForHumans() }}</li>
                                                @endisset
                                            </td>
                                            <td>
                                                <a href="{{ route('f_contactinfo_edit', $contact->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit Contact Info</a>
                                                <a href="{{ route('f_contactinfo_hard_delete', $contact->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Contact Info</a>
                                                @if($contact->show_status == 2)
                                                    <a href="{{ route('f_contactinfo_show', $contact->id) }}" class="btn btn-inverse btn-rounded w-md waves-effect waves-light w-sm btn-sm">Show Contact Info</a>
                                                @elseif($contact->show_status == 1)
                                                    <a href="{{ route('f_contactinfo_hide', $contact->id) }}" class="btn btn-primary btn-rounded w-md waves-effect waves-light w-sm btn-sm">Hide Contact Info</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                {{-- Social Links block --}}
                <div id="social_links" class="card m-b-20 card-block mt-3 mb-3">
                    <h4 class="card-title">Contact Informations</h4>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- contact info flash message start --}}
                            <div>
                                @error('link_name')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                @error('link')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                {{-- flash success -> social link added--}}
                                @if(session()->has('link_added'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('link_added') }}</strong>
                                    </div>
                                @endif

                                {{-- flash success -> contact information shown--}}
                                @if(session()->has('contact_info_shown'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('contact_info_shown') }}</strong>
                                    </div>
                                @endif

                                {{-- flash warning -> contact information hidden --}}
                                @if(session()->has('contact_info_hidden'))
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('contact_info_hidden') }}</strong>
                                    </div>
                                @endif

                                {{-- flash warning -> social link addition limit --}}
                                @if(session()->has('link_add_limit'))
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('link_add_limit') }}</strong>
                                    </div>
                                @endif

                                {{-- flash success -> social link edited --}}
                                @if(session()->has('link_edited'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('link_edited') }}</strong>
                                    </div>
                                @endif

                                {{-- flash danger -> social link deleted--}}
                                @if(session()->has('link_deleted'))
                                    <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('link_deleted') }}</strong>
                                    </div>
                                @endif
                            </div>

                            {{-- about me description table start --}}
                            <a href="#f_social_link" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm" data-animation="contentscale" data-plugin="custommodal"
                            data-overlaySpeed="100" data-overlayColor="#36404a">Add New Contact Information</a>
                            <hr>
                            <table id="aaa" class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Serial number</th>
                                        <th>Social Link Name</th>
                                        <th>Social Link</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sociallink as $link)
                                        <tr>
                                            <td>{{ $loop->index ++ }}</td>
                                            <td>{{ $link->link_name }}</td>
                                            <td>{{ $link->link }}</td>
                                            <td>
                                                @isset($link->created_at)
                                                    <li>Date : {{ $link->created_at->format('d:m:Y') }}</li>
                                                    <li>Duration : {{ $link->created_at->diffForHumans() }}</li>
                                                @endisset
                                            </td>
                                            <td>
                                                @isset($link->updated_at)
                                                    <li>Date : {{ $link->updated_at->format('d:m:Y') }}</li>
                                                    <li>Duration : {{ $link->updated_at->diffForHumans() }}</li>
                                                @endisset
                                            </td>
                                            <td>
                                                <a href="{{ route('f_links_edit', $link->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit Social Link</a>
                                                <a href="{{ route('f_links_hard_delete', $link->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Social Link</a>
                                                @if($link->show_status == 2)
                                                    <a href="{{ route('f_link_show', $link->id) }}" class="btn btn-inverse btn-rounded w-md waves-effect waves-light w-sm btn-sm">Show Social Link</a>
                                                @elseif($link->show_status == 1)
                                                    <a href="{{ route('f_link_hide', $link->id) }}" class="btn btn-primary btn-rounded w-md waves-effect waves-light w-sm btn-sm">Hide Social Link</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                {{-- frontend contact information addition modal form --}}
                <div id="f_contact_info" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Close</span>
                    </button>
                    <br>
                    <h4 class="custom-modal-title">New Contact Addition Form</h4>
                    <div class="custom-modal-text">
                        <form method="POST" action="{{ route('f_contactinfo_create_post') }}">
                            @csrf

                            <div class="form-group">
                                <label>Your Email Address</label>
                                <input type="email" class="form-control" name="email">
                                <br>
                                <p>
                                    <strong>Notes your should follow to add description</strong>
                                    <mark>
                                        <ul>
                                            <li>You cannot add description only once. If you want to add another try to add after deleting previous title or edit it . </li>
                                        </ul>
                                    </mark>
                                </p>
                            </div>

                            <div class="form-group">
                                <label>Your Contact number</label>
                                <input type="text" class="form-control" name="cell_number">
                                <br>
                                <p>
                                    <strong>Notes your should follow to add description</strong>
                                    <mark>
                                        <ul>
                                            <li>You cannot add description only once. If you want to add another try to add after deleting previous title or edit it . </li>
                                        </ul>
                                    </mark>
                                </p>
                            </div>

                            <div class="form-group">
                                <label>Your Address</label>
                                <input type="text" class="form-control" name="address">
                                <br>
                                <p>
                                    <strong>Notes your should follow to add description</strong>
                                    <mark>
                                        <ul>
                                            <li>You cannot add description only once. If you want to add another try to add after deleting previous title or edit it . </li>
                                        </ul>
                                    </mark>
                                </p>
                            </div>

                            <button type="submit" class="btn btn-primary">Add New Information</button>
                        </form>
                    </div>
                </div>


                {{-- social link addition modal form --}}
                <div id="f_social_link" class="modal-demo">
                    <button type="button" class="close" onclick="Custombox.close();">
                        <span>&times;</span><span class="sr-only">Close</span>
                    </button>
                    <br>
                    <h4 class="custom-modal-title">New Social Link Addition Form</h4>
                    <div class="custom-modal-text">
                        <form method="POST" action="{{ route('f_links_create_post') }}">
                            @csrf

                            <div class="form-group">
                                <label>Social Account Service Name</label>
                                <input type="text" class="form-control" name="link_name">
                                <br>
                                <p>
                                    <strong>Notes your should follow to add description</strong>
                                    <mark>
                                        <ul>
                                            <li>You cannot add description only once. If you want to add another try to add after deleting previous title or edit it . </li>
                                        </ul>
                                    </mark>
                                </p>
                            </div>

                            <div class="form-group">
                                <label>Your Social Account Address</label>
                                <input type="text" class="form-control" name="link">
                                <br>
                                <p>
                                    <strong>Notes your should follow to add description</strong>
                                    <mark>
                                        <ul>
                                            <li>You cannot add description only once. If you want to add another try to add after deleting previous title or edit it . </li>
                                        </ul>
                                    </mark>
                                </p>
                            </div>

                            <button type="submit" class="btn btn-primary">Add New Social Account</button>
                        </form>
                    </div>
                </div>
@endsection