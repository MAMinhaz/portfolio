@extends('layouts.login')

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
                                        <h5 class="text-uppercase font-bold m-b-5 m-t-50">Sign In</h5>
                                        <p class="m-b-0">Login to your Admin account</p>
                                    </div>
                                    <div class="account-content">
                                        <form class="form-horizontal" action="{{ route('custom_login_post') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                            <div class="form-group m-b-20 row">
                                                <div class="col-12">
                                                    @if(session('credential_wrong'))
                                                        <span class="invalid-feedback bg-danger" role="alert">
                                                            <strong>{{ session('credential_wrong') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group m-b-20 row">
                                                <div class="col-12">
                                                    <label for="email">Email address</label>
                                                    <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="john@deo.com">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    <label for="password">Password</label>
                                                    <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Enter your password" required autocomplete="current-password">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    <div class="checkbox checkbox-success">
                                                        <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>

                                                        <label for="remember">
                                                            Remember Me
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row text-center m-t-10">
                                                <div class="col-12">
                                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>

                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>

                                        <div class="row m-t-50">
                                            <div class="col-sm-12 text-center">
                                                <p class="text-muted">Don't have an account? <a href="{{ route('custom_register') }}" class="text-dark m-l-5"><b>Sign Up</b></a></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>


@endsection












