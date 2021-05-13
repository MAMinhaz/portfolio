@extends('layouts.portfolio')

@section('portfolio_title')
    {{ $blog->title }}
@endsection

@section('portfolio_content')
    
    <!-- Blog Page Block
    ================================================== -->
    <div class="blog-page-block bg-snow pd-t-220 pd-b-105">
        <div class="container">

            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Items -->
                    <div class="blog-latest-items blog-single-page">
                        <article class="post">
                            <figure class="post-thumb">
                                <a href="#">
                                    <img src="{{ asset('uploads') }}/blog/blog_thumbnail_image/{{ $blog->blog_thumbnail_image }}" alt="Blog Thumbnail Picture Not Found" class="img-fluid">
                                </a>
                            </figure><!--  /.post-thumb -->
                            <div class="post-details">
                                <ul class="entry-meta remove-broswer-defult">
                                    <li class="entry-date"><i class="fa fa-calendar"></i> Published {{ $blog->created_at->diffForHumans() }}</li>
                                    <li class="entry-category"><i class="fa fa-sitemap"></i> <a href="{{ route('show_categories', $blog->id) }}">{{ $blog->blog_category->category_name }}</a></li>
                                </ul>
                                <h2 class="entry-title"><a href="#">{{ $blog->title }}</a></h2><!--  /.entry-title -->
                                <div class="entry-content">
                                    @php
                                        echo $blog->description
                                    @endphp
                                </div><!--  /.entry-content -->
                                <div class="entry-tag mrt-15">
                                    <a href="#">{{ $blog->blog_category->category_name }}</a>
                                </div><!--  /.entry-tag -->
                            </div><!--  /.post-details -->
                        </article><!--  /.post -->
                        {{-- {{ $blog }} --}}
                    </div><!--  /.blog-latest-items -->
                </div><!--  /.col-lg-8 -->

                <div class="col-lg-4">
                    <!-- Sidebar Items -->
                    <div class="sidebar-items">
                        <div class="widget widget_categories">
                            <h4 class="widget-title">
                                <span class="text">Categories</span>
                                <span class="large-border bg-deep-cerise"></span>
                                <span class="small-border bg-black"></span>
                                <span class="small-border bg-black"></span>
                            </h4><!--  /.widget-title -->
                            <ul>
                                @foreach($blog_category as $b_category)
                                    <li><a href="{{ route('show_categories', $b_category->id) }}">{{ $b_category->category_name }} <span class="count">{{ everyCategoryCount($b_category->id) }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="widget widget_gallery">
                            <h4 class="widget-title">
                                <span class="text">Our Gallery</span>
                                <span class="large-border bg-deep-cerise"></span>
                                <span class="small-border bg-black"></span>
                                <span class="small-border bg-black"></span>
                            </h4><!--  /.widget-title -->

                            <div class="gallery-content">
                                <div class="row">
                                    @foreach($thumbnail_pictures as $thumbnail_picture)
                                        <div class="col-6">
                                            <a href="{{ route('show_blog', $thumbnail_picture->id) }}">
                                                <img src="{{ asset('uploads') }}/blog/blog_thumbnail_image/{{ $thumbnail_picture->blog_thumbnail_image }}" alt="Galary Image" class="img-fluid">
                                            </a>
                                        </div><!--  /.col-6 -->
                                    @endforeach
                                </div><!--  /.row -->
                            </div><!--  /.gallery -->
                        </div><!--  /.widget -->
                    </div><!--  /.sidebar-items -->
                </div><!--  /.col-lg-4 -->
            </div><!--  /.row -->
        </div><!--  /.container -->
    </div><!--  /.blog-page-block -->

@endsection