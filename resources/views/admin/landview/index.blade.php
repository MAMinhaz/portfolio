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
                                    <li class="breadcrumb-item active">Portfolio - Hero Block</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Hero Block Content</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-md-12">
                        <div>
                            @if(session()->has('lv_saved'))
                                <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                    role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="false">×</span>
                                    </button>
                                    <strong>{{ session('lv_saved') }}</strong>
                                </div>
                            @endif

                            @if(session()->has('lv_name_dup'))
                                <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>{{ session('lv_name_dup') }}</strong>
                                </div>
                            @endif

                            @if(session()->has('lv_deleted'))
                                <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="mdi mdi-block-helper"></i>
                                    <strong>{{ session('lv_deleted') }}</strong>
                                </div>
                            @endif
                        </div>

                        <table id="aaa" class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                            <a href="{{ route('landview_create') }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Add Hero Information</a>
                            <thead>
                                <tr>
                                    <th>Serial number</th>
                                    <th>Hero's Name</th>
                                    <th>Hero's professions</th>
                                    <th>Hero's Display picture</th>
                                    <th>Added by</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($landviews as $landview)
                                    <tr>
                                        <td>{{ $loop->index ++ }}</td>
                                        <td>{{ $landview->name }}</td>
                                        <td>
                                            @foreach($landview->heroProfessions as $pro)
                                                <span>{{ $pro->profession_name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <img src="{{ asset('dash') }}/uploads/landview_image/{{ $landview->landview_image }}" class="img-fluid" alt="image not found">
                                        </td>
                                        <td>{{ users()->find($landview->addedby)->name }}</td>
                                        <td>
                                            <a href="{{ route('landview_hard_delete', $landview->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Hero Info</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

@endsection