@extends('layouts.admin')

@section('title')
    | Portfolio Admins
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
                                    <li class="breadcrumb-item active">Site Setting</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Admin Account Details</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                {{-- admin information and password update block --}}
                <div class="card m-b-20">
                    <img class="card-img-top img-fluid" src="{{ asset('dash/assets/images/admin_dash/administration.jpg') }}" alt="Card image cap" height="150" width="250">
                    <div class="card-block">
                        <div class="card-box">
                            <h4 class="m-t-0 m-b-30 header-title">Edit Genaral Settings</h4>
                            <div>
                                @if(session()->has('admin_general_info_changed'))
                                    <div class="form-group row">
                                        <div class="col-12">
                                            {{-- flash success -> admin general info changed--}}
                                            <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                                role="alert">
                                                <strong>{{ session('admin_general_info_changed') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <form class="form-horizontal" method="POST" action="{{ route('info_update_post') }}">
                                @csrf
                                @foreach($users as $user)
                                    <div class="form-group row">
                                        <label for="name" class="col-3 col-form-label">Admin's Name</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-3 col-form-label">Admin's Email</label>
                                        <div class="col-9">
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    @php
                                        $created_at = $user->created_at;
                                        $updated_at = $user->updated_at;
                                    @endphp
                                @endforeach

                                <div class="form-group m-b-0 row">
                                    <div class="offset-3 col-9">
                                        <button type="submit" class="btn btn-inverse waves-effect waves-light">Edit General Info</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card-box">
                            <h4 class="m-t-0 m-b-30 header-title">Edit Password</h4>
                            <div>
                                {{-- success-password changed --}}
                                @if(session()->has('password_change_success'))
                                    <div class="form-group row">
                                        <div class="col-12">
                                            {{-- flash success -> portfolio category added start --}}
                                            <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                                role="alert">
                                                <strong>{{ session('password_change_success') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                {{-- error-tried old password --}}
                                @if(session()->has('error_reenter_old'))
                                    <div class="form-group row">
                                        <div class="col-12">
                                        {{-- flash success -> portfolio category added start --}}
                                            <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                                                <strong>{{ session('error_reenter_old') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                {{-- error-password unmatched --}}
                                @if(session()->has('error_password_hash_unmatched'))
                                    <div class="form-group row">
                                        <div class="col-12">
                                        {{-- flash success -> portfolio category added start --}}
                                            <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                                                <strong>{{ session('error_password_hash_unmatched') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                {{-- error message field-old password --}}
                                @error('old_password')
                                    <div class="form-group row">
                                        <div class="col-12">
                                            {{-- flash success -> portfolio category added start --}}
                                            <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                @enderror

                                {{-- error message field-new password --}}
                                @error('password')
                                    <div class="form-group row">
                                        <div class="col-12">
                                            {{-- flash success -> portfolio category added start --}}
                                            <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                @enderror

                                {{-- error message field-confirm new password --}}
                                @error('password_confirmation')
                                    <div class="form-group row">
                                        <div class="col-12">
                                            {{-- flash success -> portfolio category added start --}}
                                            <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                @enderror
                            </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('password_update_post') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="password" class="col-3 col-form-label">Old Password</label>
                                    <div class="col-9">
                                        <input id="password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-3 col-form-label">New Password</label>
                                    <div class="col-9">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-3 col-form-label">Confirm Password</label>
                                    <div class="col-9">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group m-b-0 row">
                                    <div class="offset-3 col-9">
                                        <button type="submit" class="btn btn-inverse waves-effect waves-light">Change Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <p class="card-text">
                            <small class="text-muted">Last Updated {{ $updated_at == null ? $created_at->diffForHumans() : $updated_at->diffForHumans() }}</small>
                        </p>
                    </div>
                </div>
@endsection