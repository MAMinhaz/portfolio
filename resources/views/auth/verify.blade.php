@extends('layouts.admin')

@section('admin_content')

        <div class="card-box mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card m-b-20">
                        <div class="card-block">
                            <h3 class="card-title">Verify Your Email Address</h3>
                                <p class="card-text">Before proceeding, please check your email for a verification link.</p>
                                <p class="card-text">If you did not receive the email,</p>
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-purple btn-rounded w-md waves-effect waves-light w-sm btn-sm mt-3 mb-3">Click here to request another</button>
                                </form>
                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        <p class="card-text">A fresh verification link has been sent to your email address. </p>
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
