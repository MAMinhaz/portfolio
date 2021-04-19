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
                                    <li class="breadcrumb-item active">Customize Your Portfolio</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Portfolio Customization</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                {{-- Custoize frontend portfolio - Background Contents block --}}
                <div class="card m-b-20 card-block mt-3 mb-3">
                    <h4 class="card-title">Portfolio Customization</h4>
                    <div class="row">
                        <div class="col-md-12">
                            {{-- customize frontend flash message start --}}
                            <div>
                                @error('job_title')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                @error('mockup_image')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                @error('hire_me_image')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                @error('testimonial_image')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                @error('get_in_touch_image')
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                {{-- flash success -> frontend customized  --}}
                                @if(session()->has('front_customized'))
                                    <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                                        role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="false">×</span>
                                        </button>
                                        <strong>{{ session('front_customized') }}</strong>
                                    </div>
                                @endif

                                {{-- flash warning -> mock-up field blank --}}
                                @if(session()->has('get_in_touch_not_selected'))
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('get_in_touch_not_selected') }}</strong>
                                    </div>
                                @endif

                                {{-- flash warning -> hire me field blank --}}
                                @if(session()->has('testimonial_not_selected'))
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('testimonial_not_selected') }}</strong>
                                    </div>
                                @endif

                                {{-- flash warning -> testimonial field blank --}}
                                @if(session()->has('hire_me_not_selected'))
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('hire_me_not_selected') }}</strong>
                                    </div>
                                @endif

                                {{-- flash warning -> get in touch field blank --}}
                                @if(session()->has('mock_up_not_selected'))
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('mock_up_not_selected') }}</strong>
                                    </div>
                                @endif
                                {{-- flash warning -> get in touch field blank --}}

                                @if(session()->has('customized_before'))
                                    <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('customized_before') }}</strong>
                                    </div>
                                @endif

                                {{-- flash danger -> old frontend customization removed --}}
                                @if(session()->has('customized_removed'))
                                    <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{ session('customized_removed') }}</strong>
                                    </div>
                                @endif
                            </div>

                            {{-- customized forntend datas --}}
                            <button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="modal" data-target="#customize_form">Customize Frontend</button>
                            <hr>

                            <div class="card-box">
                                <form class="form-horizontal" role="form">
                                    @csrf
                                    @foreach($custom_f as $custom)
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Your Job Title</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="job_title" value="{{ $custom->job_title }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Mock-up Image</label>
                                            <div class="col-9">
                                                <img src="{{ asset('uploads') }}/mockup_image/{{ $custom->mockup_image }}" class="img-fluid" alt="Mock-up image not found">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Hire Me block Background Image</label>
                                            <div class="col-9">
                                                <img src="{{ asset('uploads') }}/hire_me_image/{{ $custom->hire_me_image }}" class="img-fluid" alt="Hire Me Block image not found">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Testimonial block Background Image</label>
                                            <div class="col-9">
                                                <img src="{{ asset('uploads') }}/testimonial_image/{{ $custom->testimonial_image }}" class="img-fluid" alt="Testimonial image not found">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Get In Touch block Background Image</label>
                                            <div class="col-9">
                                                <img src="{{ asset('uploads') }}/get_in_touch_image/{{ $custom->get_in_touch_image }}" class="img-fluid" alt="Get In Touch image not found">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Frontend Customized by</label>
                                            <div class="col-6">
                                                <div class="card-box widget-user">
                                                    <div>
                                                        <img src="{{ asset('dash') }}/assets/images/users/avatar-2.jpg" class="img-responsive rounded-circle" alt="user">
                                                        <div class="wid-u-info">
                                                            <h5 class="m-t-20 m-b-5">{{ users()->find($custom->addedby)->name }}</h5>
                                                            <p class="text-muted m-b-0 font-14">{{ users()->find($custom->addedby)->email }}</p>
                                                            <div class="user-position">
                                                                <span class="text-info font-secondary">User</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="form-group m-b-0 row">
                                        <div class="offset-3 col-9">
                                            @if(!empty($custom))
                                                <a href="{{ route('front_customize_hard_delete', $custom->id) }}" class="btn btn-info waves-effect waves-light">Remove Customization</a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <div id="customize_form" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div class="modal-body">
                                <form action="{{ route('front_customize_create_post') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                <div class="p-10 task-detail">
                                    <h4 class="font-600 m-b-20">Code HTML email template for welcome email</h4>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Your Job Title</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="job_title">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Mock-up Image</label>
                                            <div class="col-9">
                                                <input type="file" name="mockup_image" id="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Hire Me block Background Image</label>
                                            <div class="col-9">
                                                <input type="file" name="hire_me_image" id="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Testimonial block Background Image</label>
                                            <div class="col-9">
                                                <input type="file" name="testimonial_image" id="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Get In Touch block Background Image</label>
                                            <div class="col-9">
                                                <input type="file" name="get_in_touch_image" id="">
                                            </div>
                                        </div>
                                </div>
                            </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Customize</button>
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
@endsection