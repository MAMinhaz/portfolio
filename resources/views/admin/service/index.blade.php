@extends('layouts.admin')

@section('admin_content')

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('portoview') }}">Portfolio</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Admin Dashboard</a></li>
                                    <li class="breadcrumb-item active">Portfolio - Service content</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Service Content</h4>
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

                            @if(session()->has('lv_title_dup'))
                                <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>

                                    <strong>{{ session('lv_title_dup') }}</strong>
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

                            @if(session()->has('lv_edited'))
                                <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                    role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="false">×</span>
                                    </button>
                                    <strong>{{ session('lv_edited') }}</strong>
                                </div>
                            @endif

                            @if(session()->has('hard_delete'))
                                <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="mdi mdi-block-helper"></i>
                                    <strong>{{ session('hard_delete') }}</strong>
                                </div>
                            @endif
                        </div>
                        <table id="aaa" class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                            <a href="{{ route('landview_create') }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Add</a>
                            <thead>
                                <tr>
                                    <th>Serial number</th>
                                    <th>Service Title</th>
                                    <th>Added by</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{ $loop->index ++ }}</td>
                                        <td>{{ $service->service_title }}</td>
                                        <td>{{ users()->find($service->addedby)->name }}</td>
                                        <td>
                                            <a href="{{ route('landview_edit', $service->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit</a>
                                            <a href="{{ route('landview_hard_delete', $service->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

@endsection

@section('scripts')
    <script>
            $(document).ready(function() {
                $('#aaa').DataTable();
            });
        </script>
@endsection