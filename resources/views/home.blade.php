@extends('layouts.admin')

@section('admin_content')
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item active"><a href="{{ route('home') }}">Admin Dashboard</a></li>
                                </ol>
                            </div>
                            <h4 class="page-title">Admin Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="card-box mb-4 mt-4">
                    <h3>Portfolio Content's Statistics Here</h3>
                    <div class="row">

                        {{-- total services --}}
                        <div class="col-lg-3 col-md-6">
                            <div class="card-box widget-box-three">
                                <div class="bg-icon pull-left">
                                    <img class="icon-colored" src="{{ asset('dash') }}/assets/images/icons/inspection.svg" title="inspection.svg">
                                </div>
                                <div class="text-right">
                                    <p class="m-t-5 text-uppercase font-14 font-600">Total Services</p>
                                    <h2 class="m-b-10"><span data-plugin="counterup">{{ $services }}</span></h2>
                                </div>
                            </div>
                        </div>

                        {{-- total skills --}}
                        <div class="col-lg-3 col-md-6">
                            <div class="card-box widget-box-three">
                                <div class="bg-icon pull-left">
                                    <img class="icon-colored" src="{{ asset('dash') }}/assets/images/icons/todo_list.svg" title="todo_list.svg">
                                </div>
                                <div class="text-right">
                                    <p class="m-t-5 text-uppercase font-14 font-600">Total Skills</p>
                                    <h2 class="m-b-10"><span data-plugin="counterup">{{ $about_me_skill }}</span></h2>
                                </div>
                            </div>
                        </div>

                        {{-- total milestones  --}}
                        <div class="col-lg-3 col-md-6">
                            <div class="card-box widget-box-three">
                                <div class="bg-icon pull-left">
                                    <img class="icon-colored" src="{{ asset('dash') }}/assets/images/icons/diploma_1.svg" title="diploma_1.svg">
                                </div>
                                <div class="text-right">
                                    <p class="m-t-5 text-uppercase font-14 font-600">Total Milestones</p>
                                    <h2 class="m-b-10"><span data-plugin="counterup">{{ $milestone }}</span></h2>
                                </div>
                            </div>
                        </div>

                        {{-- total portfolios --}}
                        <div class="col-lg-3 col-md-6">
                            <div class="card-box widget-box-three">
                                <div class="bg-icon pull-left">
                                    <img class="icon-colored" src="{{ asset('dash') }}/assets/images/icons/ok.svg" title="ok.svg">
                                </div>
                                <div class="text-right">
                                    <p class="m-t-5 text-uppercase font-14 font-600">Total Portfolios</p>
                                    <h2 class="m-b-10"><span data-plugin="counterup">{{ $portfolios }}</span></h2>
                                </div>
                            </div>
                        </div>

                        {{-- total testimonials --}}
                        <div class="col-lg-3 col-md-6">
                            <div class="card-box widget-box-three">
                                <div class="bg-icon pull-left">
                                    <img class="icon-colored" src="{{ asset('dash') }}/assets/images/icons/approval.svg" title="approval.svg">
                                </div>
                                <div class="text-right">
                                    <p class="m-t-5 text-uppercase font-14 font-600">Total Testimonials</p>
                                    <h2 class="m-b-10"><span data-plugin="counterup">{{ $testimonial }}</span></h2>
                                </div>
                            </div>
                        </div>

                        {{-- total companies --}}
                        <div class="col-lg-3 col-md-6">
                            <div class="card-box widget-box-three">
                                <div class="bg-icon pull-left">
                                    <img class="icon-colored" src="{{ asset('dash') }}/assets/images/icons/department.svg" title="department.svg">
                                </div>
                                <div class="text-right">
                                    <p class="m-t-5 text-uppercase font-14 font-600">Total Companies</p>
                                    <h2 class="m-b-10"><span data-plugin="counterup">{{ $company }}</span></h2>
                                </div>
                            </div>
                        </div>

                        {{-- total blog posts --}}
                        <div class="col-lg-3 col-md-6">
                            <div class="card-box widget-box-three">
                                <div class="bg-icon pull-left">
                                    <img class="icon-colored" src="{{ asset('dash') }}/assets/images/icons/news.svg" title="news.svg">
                                </div>
                                <div class="text-right">
                                    <p class="m-t-5 text-uppercase font-14 font-600">Total Blog Posts</p>
                                    <h2 class="m-b-10"><span data-plugin="counterup">{{ $blog }}</span></h2>
                                </div>
                            </div>
                        </div>


                        {{-- total contact messages  --}}
                        <div class="col-lg-3 col-md-6">
                            <div class="card-box widget-box-three">
                                <div class="bg-icon pull-left">
                                    <img class="icon-colored" src="{{ asset('dash') }}/assets/images/icons/feedback.svg" title="feedback.svg">
                                </div>
                                <div class="text-right">
                                    <p class="m-t-5 text-uppercase font-14 font-600">Total Contact Messages</p>
                                    <h2 class="m-b-10"><span data-plugin="counterup">{{ $contact_message }}</span></h2>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-box mb-4">
                    <h3>Choose Your Portfolio Theme</h3>

                    {{-- flash success -> frontend theme changed  --}}
                    @if(session()->has('theme_changed'))
                        <div class="alert alert-icon alert-white alert-success alert-dismissible fade show"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="false">×</span>
                            </button>
                            <strong>{{ session('theme_changed') }}</strong>
                        </div>
                    @endif

                    <div class="row">
                        @forelse ($CustomFronts as $CustomFront)
                            @if($CustomFront->portfolio_theme == 1)
                                <div class="col-lg-6">
                                    <a href="{{ route('front_customize_to_theme_light', $CustomFront->id) }}" class="btn btn-rounded w-md waves-effect waves-light mt-5 mb-5 ml-5" style="pointer-events: none">Light Theme</a><br>
                                    <img src="{{ asset('dash') }}/portfolio_theme_image/portfolio_light.png" class="img-fluid" alt="Light Image Not Found">
                                </div>

                                <div class="col-lg-6">
                                    <a href="{{ route('front_customize_to_theme_dark', $CustomFront->id) }}" class="btn btn-inverse btn-rounded w-md waves-effect waves-light mt-5 mb-5 ml-5">Dark Theme</a><br>
                                    <img src="{{ asset('dash') }}/portfolio_theme_image/portfolio_dark.png" class="img-fluid" alt="Dark Image Not Found">
                                </div>

                            @elseif($CustomFront->portfolio_theme == 2)
                                <div class="col-lg-6">
                                    <a href="{{ route('front_customize_to_theme_light', $CustomFront->id) }}" class="btn btn-rounded w-md waves-effect waves-light mt-5 mb-5 ml-5">Light Theme</a><br>
                                    <img src="{{ asset('dash') }}/portfolio_theme_image/portfolio_light.png" class="img-fluid" alt="Light Image Not Found">
                                </div>

                                <div class="col-lg-6">
                                    <a href="{{ route('front_customize_to_theme_dark', $CustomFront->id) }}" class="btn btn-inverse btn-rounded w-md waves-effect waves-light mt-5 mb-5 ml-5" style="pointer-events: none">Dark Theme</a><br>
                                    <img src="{{ asset('dash') }}/portfolio_theme_image/portfolio_dark.png" class="img-fluid" alt="Dark Image Not Found">
                                </div>
                            @endif

                            @empty
                                <div class="col-lg-12">
                                    <div class="alert alert-icon alert-white alert-danger alert-dismissible fade show"
                                        role="alert">
                                        <strong>
                                            <p>
                                                You Did not Customize Your Portfolio. Try to customize first and you can set up it later.
                                                By Default, Your Portfolio Is Light Theme.
                                            </p>
                                        </strong>
                                    </div>
                                </div>
                        @endforelse
                    </div>
                </div>
@endsection
