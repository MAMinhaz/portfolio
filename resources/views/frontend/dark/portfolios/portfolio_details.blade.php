@extends('layouts.portfolio')

@section('portfolio_title')
    {{ $portfolio->title }}
@endsection

@section('portfolio_content')
    <section class="blog-page-block bg-black-russian-3 pd-t-220 pd-b-120">
        <div class="container">
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="portfolio-details dark">
                        <h2 class="portfolio-title">{{ $portfolio->title }}</h2>
                        <!--  /.portfolio-title -->
                        <div class="portfolio-content">
                            <p>
                                {{ $portfolio->description }}
                            </p>
                        </div><!--  /.portfolio-content -->
                        <h4 class="more-info">Info</h4><!--  /.more-info -->
                        <ul class="portfolio-meta">
                            <li><strong>Date :</strong> <span>{{ $portfolio->date }}</span></li>
                            <li><strong>Client :</strong> <span>{{ $portfolio->clients }}</span></li>
                            <li><strong>Category :</strong> <span>{{ $portfolio->PortfolioCats->category_name }}</span></li>
                        </ul>
                    </div><!--  /.portfolio-details -->
                </div><!--  /.col-lg-4 -->
                <div class="col-lg-8">
                    <figure>
                        <a class="popup-image" href="{{ asset('uploads') }}/portfolios/thumbnail_image/{{ $portfolio->thumbnail_image }}">
                            <img src="{{ asset('uploads') }}/portfolios/thumbnail_image/{{ $portfolio->thumbnail_image }}" alt="Thumbnail Image Not Found">
                        </a>
                    </figure>
                    <figure>
                        @foreach($portfolio->portfolio_image as $portfolio_multiple_image)
                            <a class="popup-image" href="{{ asset('uploads') }}/portfolios/portfo_image/{{ $portfolio_multiple_image->portfo_image }}">
                                <img src="{{ asset('uploads') }}/portfolios/portfo_image/{{ $portfolio_multiple_image->portfo_image }}" alt="Portfolio Images Not Found">
                            </a>
                        @endforeach
                    </figure>
                </div><!--  /.col-lg-8 -->
            </div><!--  /.row -->
        </div><!--  /.container -->
    </section>
@endsection