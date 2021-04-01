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
                        <li class="breadcrumb-item active">Portfolio - About Me Section</li>
                    </ol>
                </div>
                <h4 class="page-title">About Me Section's Content</h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-20 text-xs-center">
                <div class="card-block">
                    <h4 class="card-title">Edit Existing Skill</h4>
                    <form method="POST" action="{{ route('aboutme_skill_edit_post') }}">
                        @csrf
                        <div class="form-group">
                            <label>Skill Name</label>
                            <input type="text" class="form-control" name="skill_name" value="{{ $aboutme_skills->skill_name }}">
                            <input type="hidden" value="{{ $aboutme_skills->id }}" name="value">
                            <br>

                            @error('skill_name')
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

                        <div class="form-group">
                            <label>Skill Percent</label>
                            <input type="text" class="form-control" name="skill_percent" value="{{ $aboutme_skills->skill_percent }}">
                            <br>

                            @error('skill_percent')
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

                        <button type="submit" class="btn btn-inverse btn-rounded w-md waves-effect waves-light">Click To Complete Edit</button>
                    </form>
                        <br>
                    <a href="{{ route('aboutme') }}" class="btn btn-purple btn-rounded w-md waves-effect waves-light">Return Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection