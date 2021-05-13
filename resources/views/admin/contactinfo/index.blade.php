@extends('layouts.admin')

@section('title')
    | Contact Informations and Social Links
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
                        <li class="breadcrumb-item active">Portfolio - Portfolio Customization</li>
                    </ol>
                </div>
                <h4 class="page-title">Contact Information and Social Links</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->


    {{-- Contact Information block --}}
    <div id="main_contact_information" class="card m-b-20 card-block mt-3 mb-3">
        <h4 class="card-title">Contact Informations </h4>
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

                    {{-- flash warning -> contact information showing to top limit --}}
                    @if(session()->has('f_contactinfo_shown_to_top_again'))
                        <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('f_contactinfo_shown_to_top_again') }}</strong>
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
                @if($countContactInfo === 1)
                    <a href="#f_contact_info" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm" data-animation="contentscale" data-plugin="custommodal"
                    data-overlaySpeed="100" data-overlayColor="#36404a">Add New Contact Information</a>
                    <hr>
                @endif
                <table id="aaa" class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                    <thead>
                        <tr>
                            <th>Serial number</th>
                            <th>Email Address</th>
                            <th>Contact Number</th>
                            <th>Your Address</th>
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
                                    <a href="{{ route('f_contactinfo_edit', $contact->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit Contact Info</a>
                                    <a href="{{ route('f_contactinfo_hard_delete', $contact->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Contact Info</a>
                                    @if($countContactInfo === 1)
                                        <a href="{{ route('f_contactinfo_show', $contact->id) }}" class="btn btn-inverse btn-rounded w-md waves-effect waves-light w-sm btn-sm">Pin Contact Info To Topbar</a>
                                    @else
                                        @if($contact->show_status == 2)
                                            <a href="{{ route('f_contactinfo_hide', $contact->id) }}" class="btn btn-primary btn-rounded w-md waves-effect waves-light w-sm btn-sm">Remove Pinned Contact Info from Topbar</a>
                                        @elseif($contact->show_status == 1)
                                            <a href="{{ route('f_contactinfo_show', $contact->id) }}" class="btn btn-inverse btn-rounded w-md waves-effect waves-light w-sm btn-sm disabled">Pin Contact Info Info To Topbar</a>
                                        @endif
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
        <h4 class="card-title">Social Links</h4>
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

                    {{-- flash success -> social link shown on topbar--}}
                    @if(session()->has('link_shown'))
                        <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="false">×</span>
                            </button>
                            <strong>{{ session('link_shown') }}</strong>
                        </div>
                    @endif

                    {{-- flash warning -> social link hidden --}}
                    @if(session()->has('link_hidden'))
                        <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('link_hidden') }}</strong>
                        </div>
                    @endif

                    {{-- flash warning -> social link shown before on topbar --}}
                    @if(session()->has('link_shown_before'))
                        <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>{{ session('link_shown_before') }}</strong>
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
                @if($countSocialLinkInfo === 1)
                    <a href="#f_social_link" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm" data-animation="contentscale" data-plugin="custommodal"
                    data-overlaySpeed="100" data-overlayColor="#36404a">Add New Social Link</a>
                    <hr>
                @endif
                <table id="aaa" class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                    <thead>
                        <tr>
                            <th>Serial number</th>
                            <th>Social Link Name</th>
                            <th>Social Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sociallink as $link)
                            <tr>
                                <td>{{ $loop->index ++ }}</td>
                                <td>{{ $link->link_name }}</td>
                                <td><a href="{{ $link->link }}">{{ $link->link }}</a></td>
                                <td>
                                    <a href="{{ route('f_links_edit', $link->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit Social Link</a>
                                    <a href="{{ route('f_links_hard_delete', $link->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Social Link</a>
                                    @if($countSocialLinkInfo === 1)
                                        @if($link->show_status == 2)
                                            <a href="{{ route('f_link_hide', $link->id) }}" class="btn btn-primary btn-rounded w-md waves-effect waves-light w-sm btn-sm">Remove Pinned Social Link From Topbar</a>
                                        @elseif($link->show_status == 1)
                                            <a href="{{ route('f_link_show', $link->id) }}" class="btn btn-inverse btn-rounded w-md waves-effect waves-light w-sm btn-sm">Pin Social Link To Topbar</a>
                                        @endif
                                    @else
                                        @if($link->show_status == 2)
                                            <a href="{{ route('f_link_hide', $link->id) }}" class="btn btn-primary btn-rounded w-md waves-effect waves-light w-sm btn-sm">Remove Pinned Social Link From Topbar</a>
                                        @elseif($link->show_status == 1)
                                            <a href="{{ route('f_link_show', $link->id) }}" class="btn btn-inverse btn-rounded w-md waves-effect waves-light w-sm btn-sm disabled">Pin Social Link To Topbar</a>
                                        @endif
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
        <h4 class="custom-modal-title">Add New Contact</h4>
        <div class="custom-modal-text">
            <form method="POST" action="{{ route('f_contactinfo_create_post') }}">
                @csrf

                <div class="form-group">
                    <label  style="font-size: 150%">Your Email Address</label>
                    <input type="email" class="form-control" name="email" required>
                    <br>
                    <p>
                        <strong>Notes your should follow to add contact information</strong>
                        <mark>
                            <ul>
                                <li>You can add contact email address three times.</li>
                                <li>Your contact email address should be unique.</li>
                            </ul>
                        </mark>
                    </p>
                </div>

                <div class="form-group">
                    <label  style="font-size: 150%">Your Contact number</label>
                    <input type="text" class="form-control" name="cell_number" required>
                    <br>
                    <p>
                        <strong>Notes your should follow to add new contact number</strong>
                        <mark>
                            <ul>
                                <li>You can add contact number three times.</li>
                                <li>Your contact number should be unique.</li>
                            </ul>
                        </mark>
                    </p>
                </div>

                <div class="form-group">
                    <label style="font-size: 150%">Your Address</label>
                    <input type="text" class="form-control" name="address" required>
                    <br>
                    <p>
                        <strong>Notes your should follow to add new address</strong>
                        <mark>
                            <ul>
                                <li>You can add contact address three times.</li>
                                <li>Your contact address should be unique.</li>
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
        <h4 class="custom-modal-title">Add Social Links</h4>
        <div class="custom-modal-text">
            <form method="POST" action="{{ route('f_links_create_post') }}">
                @csrf

                <div class="form-group">
                    <label style="font-size: 150%">Social Account Service Name</label>
                    <input type="text" class="form-control" name="link_name" required>
                    <br>
                    <p>
                        <strong>Notes your should follow to add socials links</strong>
                        <mark>
                            <ul>
                                <li>You can add your social links seven times.</li>
                                <li>Your social links should be unique.</li>
                            </ul>
                        </mark>
                    </p>
                </div>

                <div class="form-group">
                    <label style="font-size: 150%">Your Social Account Address Link</label>
                    <input type="text" class="form-control" name="link" required>
                    <br>
                    <p>
                        <strong>Notes your should follow to add description</strong>
                        <mark>
                            <ul>
                                <li>Your social links should be valid.</li>
                                <li>Your link should be unique.</li>
                            </ul>
                        </mark>
                    </p>
                </div>

                <button type="submit" class="btn btn-primary">Add New Social Account</button>
            </form>
        </div>
    </div>
@endsection