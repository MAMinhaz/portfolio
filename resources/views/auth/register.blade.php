@extends('layouts.register')

@section('content')

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="index.html" class="text-success">
                                                <span><img src="{{ asset('dash') }}/assets/images/logo_dark.png" alt="" height="30"></span>
                                            </a>
                                        </h2>
                                        <h5 class="text-uppercase font-bold m-b-5 m-t-50">Register</h5>
                                        <p class="m-b-0">Get access to our admin panel</p>
                                    </div>
                                    <div class="account-content">
                                        <form class="form-horizontal" action="{{ route('custom_register_post') }}" method="POST">
                                        @csrf

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    <label for="name">Full Name</label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus required>

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    <label for="email">Email address</label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    <label for="password">Password</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    <label for="password">Confirm Password</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                                    {{-- @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror --}}
                                                </div>
                                            </div>

                                            <div class="form-group row text-center m-t-10">
                                                <div class="col-12">
                                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign Up</button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="row m-t-50">
                                            <div class="col-12 text-center">
                                                <p class="text-muted">Already have an account?  <a href="{{ route('custom_login') }}" class="text-dark m-l-5"><b>Sign In</b></a></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- end card-box-->
                            </div>


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->
@endsection
