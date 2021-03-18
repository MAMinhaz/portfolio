@extends('layouts.admin')

@section('admin_content')

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="{{ url('view') }}">Portfolio</a></li>
                                    <li class="breadcrumb-item"><a href="#">Admin Dashboard</a></li>
                                    <li class="breadcrumb-item active">Portfolio - landview content</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Landview Content</h4>
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
                                    <th>Landview Title</th>
                                    <th>Landview Name</th>
                                    <th>Landview profession name</th>
                                    <th>Landview Display picture</th>
                                    <th>Added by</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($landviews as $landview)
                                    <tr>
                                        <td>{{ $loop->index ++ }}</td>
                                        <td>{{ $landview->title }}</td>
                                        <td>{{ $landview->name }}</td>
                                        <td>{{ $landview->profession_name }}</td>
                                        <td>
                                            <img src="{{ asset('dash') }}/uploads/landview_image/{{ $landview->landview_image }}" class="img-fluid" alt="image not found">
                                        </td>
                                        <td>{{ users()->find($landview->addedby)->name }}</td>
                                        <td>
                                            <a href="{{ route('landview_edit', $landview->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit</a>
                                            <a href="{{ route('landview_hard_delete', $landview->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete</a>
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