@extends('layouts.portfolio')

@section('portfolio_title')
    Posts Of "{{ $category_name }}"
@endsection

@section('portfolio_content')

    <section class="blog-block pd-t-105 pd-b-90" id="blog-block" style="">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h2 class="title-main">All Posts Of "{{ $category_name }}"</h2>
                        <div class="title-border">
                            <span class="small-border bg-black"></span>
                            <span class="large-border bg-deep-cerise"></span>
                            <span class="small-border bg-black"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-md-4">
                        <div class="post-item dark" data-animate="hg-fadeInUp">
                            <article class="post">
                                <figure class="post-thumb">
                                    <div class="entry-date">{{ $blog->created_at->diffForHumans() }}</div>
                                    <a href="">
                                        <img src="{{asset('uploads')}}/blog/blog_thumbnail_image/{{ $blog->blog_thumbnail_image }}" alt="Post Thumb" class="img-fluid" />
                                    </a>
                                </figure>
                                <div class="post-detail">
                                    <h2 class="entry-title" style="color: purple"><a href="{{ route('show_blog', $blog->id) }}">{{ $blog->title }}</a></h2>
                                    <div class="entry-cat">
                                        <a href="">{{ $blog->blog_category->category_name }}</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection