@extends('layouts.portfolio')

@section('portfolio_title')
    Portfolios Of "{{ $category_name }}"
@endsection

@section('portfolio_content')
    <section class="blog-block pd-t-105 pd-b-90" id="blog-block" style="">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h2 class="title-main">All Portfolio's Of "{{ $category_name }}"</h2>
                        <div class="title-border">
                            <span class="small-border bg-black"></span>
                            <span class="large-border bg-deep-cerise"></span>
                            <span class="small-border bg-black"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row portfolio-grid">
                @foreach($portfolios as $portfolio)
                    <div class="col-md-6 col-lg-4 app item">
                        <div class="portfolio-item" data-animate="hg-fadeInUp">
                            <figure class="portfolio-thumb">
                                <img src="{{asset('uploads')}}/portfolios/thumbnail_image/{{ $portfolio->thumbnail_image }}" alt="Portfolio Item">
                                <div class="overlay-wrapper">
                                    <div class="overlay"></div><!--  /.overlay -->
                                    <div class="popup">
                                        <div class="popup-inner">
                                            <a href="{{asset('uploads')}}/portfolios/thumbnail_image/{{ $portfolio->thumbnail_image }}" class="popup-image">
                                            <i class="fa fa-search"></i>
                                            </a>
                                        </div><!--  /.popup-inner -->
                                    </div><!--  /.popup -->
                                </div><!--  /.overlay-wrapper -->
                            </figure><!-- /.portfolio-thumb -->
                            <div class="content">
                                <h3><a href="{{ route('portfolio_details', $portfolio->id) }}">{{ $portfolio->title }}</a></h3>
                                <div class="cate"><a href="{{ route('show_portfolios_category', $portfolio->id) }}">{{ $portfolio->PortfolioCats->category_name }}</a></div>
                            </div>
                        </div><!--  /.portfolio-item -->
                    </div><!-- /.col-lg-4 -->
                @endforeach
            </div><!--  /.row -->
        </div>
    </section>
@endsection