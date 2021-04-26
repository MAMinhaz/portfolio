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

                <div class="card-box mb-4">
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
                    </div>
                </div>

                <div class="card-box mb-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <button >Light Theme</button>
                        </div>
                        <div class="col-lg-6">
                            <button >Dark Theme</button>
                        </div>
                    </div>
                </div>
@endsection
