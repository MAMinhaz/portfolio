{{-- @php
    error_reporting(0);
@endphp --}}
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


                {{-- about me milestone block start --}}
                <div class="card m-b-20 card-block mt-3 mb-3">
                    <h4 class="card-title">Portfolio's Data</h4>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- portofolio flash message start --}}
                            <div>
                                {{-- flash error start --}}
                                @error('milestone_name')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong> 
                                    </div>
                                @enderror

                                @error('milestone_digit')
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

                                {{-- flash warning -> about me milestone name field is blank start --}}
                                @if(session()->has('aboutme_ms_blank_name'))
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('aboutme_ms_blank_name') }}</strong>
                                    </div>
                                @endif
                                {{-- flash warning -> about me milestone name field is blank end --}}

                                {{-- flash warning -> about me milestone digit field is blank start --}}
                                @if(session()->has('aboutme_ms_blank_digit'))
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('aboutme_ms_blank_digit') }}</strong>
                                    </div>
                                @endif
                                {{-- flash warning -> about me milestone digit field is blank end --}}

                                {{-- flash success -> about me milestone added start --}}
                                @if(session()->has('aboutme_ms_added'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('aboutme_ms_added') }}</strong>
                                    </div>
                                @endif
                                {{-- flash success -> about me milestone added end --}}

                                {{-- flash success -> about me milestone edited start --}}
                                @if(session()->has('aboutme_milestone_edited'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('aboutme_milestone_edited') }}</strong>
                                    </div>
                                @endif
                                {{-- flash success -> about me milestone edited end --}}

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
                            <table id="aaa" class="table m-0 table-colored-bordered table-bordered-inverse" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Serial number</th>
                                        <th>Portfolio Title</th>
                                        <th>Portfolio Description</th>
                                        <th>Portfolio Date</th>
                                        <th>Clients</th>
                                        <th>Category</th>
                                        <th>Added by</th>
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
                                            <td>{{ $portfo->category_id }}</td>
                                            <td>{{ users()->find($portfo->addedby)->name }}</td>
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
                                                <a href="{{ route('aboutme_ms_edit', $portfo->id) }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm">Edit Milestone</a>
                                                <a href="{{ route('aboutme_ms_hard_delete', $portfo->id) }}" class="btn btn-danger btn-rounded w-md waves-effect waves-light w-sm btn-sm">Delete Milestone</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- about me skills table end --}}
                        </div>
                    </div>
                </div>
                {{-- about me milestone block end --}}
@endsection








