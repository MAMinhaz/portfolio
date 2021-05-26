@extends('layouts.portfolio_light')

@section('portfolio_title')
    {{ siteTitle() != null ? siteTitle() : ' Portfolio' }}
@endsection

@section('portfolio_content')
    <!-- Hero Block
    ================================================== -->
    <section class="hero-block" id="hero-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-9">
                    <div class="horizontal-border"></div><!--  /.horizontal-border -->
                        @isset($heros)
                            @forelse($heros as $hero)
                                <h2 class="hero-subheading">{{ jobTitle() }}</h2>
                                <h2 class="hero-title">{{ $hero->name }}</h2><!--  /.hero-title -->
                                @php
                                    $landview_id = $hero->id;
                                    $landview_image = $hero->landview_image;
                                @endphp
                                @empty
                                <h2 class="hero-subheading">Your Job Name</h2>
                                <h2 class="hero-title">Your Name</h2><!--  /.hero-title -->
                            @endforelse
                        @endisset
                    <ul class="hero-designation">
                        @isset($hero)
                            @forelse($hero->heroProfessions->whereNotNull('landview_id', $landview_id) as $profession)
                                @if($profession->profession_name != null)
                                    <li>{{ $profession->profession_name }}</li>
                                @endif
                                @empty
                                    <li>Your Professions 1</li>
                                    <li>Your Professions 2</li>
                                    <li>Your Professions 3</li>
                            @endforelse
                        @endisset
                    </ul><!--  /.hero-designation -->
                </div><!--  /.col-lg-8 -->
            </div><!--  /.row -->
        </div><!--  /.container-fluid -->
        <div class="hg-background">
            @isset($landview_image)
                <div class="hg-background-image" data-bg-image="{{ $landview_image != null ? asset('uploads/landview_image').'/'.$landview_image : asset('uploads/landview_image/landview_image_default.jpg') }}"></div><!--  /.hg-background-image -->
            @endisset
        </div><!--  /.hg-background -->
    </section><!--  /.hero-block -->

    <!-- Service Block
    ================================================== -->
    <section class="service-block bg-snow pd-t-105 pd-b-120" id="service-block">
        <div class="container">
            <!-- Title Row -->
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h2 class="title-counter">01</h2><!--  /.title-counter -->
                        <h2 class="title-main">Services</h2><!-- /.title-main -->
                        <div class="title-border">
                            <span class="small-border bg-black"></span>
                            <span class="large-border bg-deep-cerise"></span>
                            <span class="small-border bg-black"></span>
                        </div><!--  /.title-border -->
                    </div><!--  /.section-title -->
                </div><!--  /.col-12 -->
            </div><!--  /.row -->
            
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-12">                
                    <div class="service-carousel owl-carousel" data-owl-items="3" data-owl-margin="30" data-owl-dots="1" data-owl-loop="1" data-owl-center="1" data-animate="hg-fadeInUp">

                        @forelse($services as $service)
                        <div class="item">
                            <div class="service-card">
                                <div class="service-icon color-deep-cerise">
                                    <i class="fas fa-marker"></i>
                                </div><!--  /.service-icon -->
                                <h2 class="service-title">
                                    {{ $service->service_title }}
                                </h2><!--  /.service-title -->
                                <ul class="service-list">
                                    <li>{{ $service->service_list_1 }}</li>
                                    <li>{{ $service->service_list_2 }}</li>
                                    <li>{{ $service->service_list_3 }}</li>
                                    <li>{{ $service->service_list_4 }}</li>
                                    <li>{{ $service->service_list_5 }}</li>
                                    <li>{{ $service->service_list_6 }}</li>
                                </ul><!--  /.service-list -->
                            </div><!--  /.service-card -->
                        </div><!--  /.item --> 
                        @empty
                        <div class="item">
                            <div class="service-card">
                                <h2 class="service-title">Author did not add any service to show.</h2><!--  /.service-title -->
                            </div><!--  /.service-card -->
                        </div><!--  /.item -->
                        @endforelse
                    </div><!--  /.owl-carousel -->
                </div><!--  /.col-lg-12 -->
            </div><!--  /.row -->
        </div><!--  /.container -->
    </section><!--  /.service-block -->

    <!-- About Block
    ================================================== -->
    <section class="about-block pd-t-105" id="about-block">
        <div class="container">
            <!-- Title Row -->
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h2 class="title-counter">02</h2><!--  /.title-counter -->
                        <h2 class="title-main">About Me</h2><!-- /.title-main -->
                        <div class="title-border">
                            <span class="small-border bg-black"></span>
                            <span class="large-border bg-deep-cerise"></span>
                            <span class="small-border bg-black"></span>
                        </div><!--  /.title-border -->
                    </div><!--  /.section-title -->
                </div><!--  /.col-12 -->
            </div><!--  /.row -->

            <!-- Content Row -->
            <div class="row justify-content-md-center mrb-75">
                <div class="col-lg-10 pd-l-60 pd-r-60">            
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="xl-title mrb-30">About My Business &amp; Skills</h2>
                                @forelse($AboutMeDes as $AboutMeDess)
                                    <p class="description mrb-75 fts-18 w-500 color-silver">{{ $AboutMeDess->about_me_des }}</p>
                                @empty
                                    <p class="description mrb-75 fts-18 w-500 color-silver">This is your portofolio's about me description .</p>
                                @endforelse
                        </div><!--  /.col-lg-12 -->
                    </div><!--  /.row -->

                    <div class="row">
                        @php
                            $i = 1;
                        @endphp
                        @forelse($about_me_skills as $about_me_skill)
                            @if(checkEvenOrOdd($i) == 0)
                                <div class="col-lg-6">
                                    <div class="skill-progress">
                                            <div class="skill-bar" data-percentage="{{ $about_me_skill->skill_percent }}%">
                                            <h4 class="progress-title-holder">
                                                <span class="progress-title">{{ $about_me_skill->skill_name }}</span>
                                                <span class="progress-wrapper">
                                                    <span class="progress-mark">
                                                        <span class="percent">{{ $about_me_skill->skill_percent }}%</span>
                                                    </span>
                                                </span>
                                            </h4>
                                            <div class="progress-outter">
                                                <div class="progress-content"></div>
                                            </div>
                                        </div><!-- /.skill-bar -->

                                    </div>
                                </div><!-- /.col-lg-6 -->
                            @else
                                <div class="col-lg-6">
                                    <div class="skill-progress">

                                            <div class="skill-bar" data-percentage="{{ $about_me_skill->skill_percent }}%">
                                            <h4 class="progress-title-holder">
                                                <span class="progress-title">{{ $about_me_skill->skill_name }}</span>
                                                <span class="progress-wrapper">
                                                    <span class="progress-mark">
                                                        <span class="percent">{{ $about_me_skill->skill_percent }}%</span>
                                                    </span>
                                                </span>
                                            </h4>
                                            <div class="progress-outter">
                                                <div class="progress-content"></div>
                                            </div>
                                        </div><!-- /.skill-bar -->
                                    </div>
                                </div><!-- /.col-lg-6 -->
                            @endif
                            @php
                                $i++;
                            @endphp
                        @empty
                            <div class="col-lg-12">
                                <h3 style="color: white">Author did not add his skills yet. Stay tuned with author.</h3>
                            </div><!-- /.col-lg-6 -->
                        @endforelse
                    </div><!--  /.row -->
                </div><!--  /.col-lg-10 -->
            </div><!--  /.row -->
            
            <!-- Mock Up Content Row -->
            <div class="row justify-content-md-center">
                <div class="col-lg-11">
                    <div class="mock-up-block ml-b-135" data-animate="hg-fadeInUp">
                            <img src="{{ asset('uploads') }}/mockup_image/{{ mockUpImage() }}" alt="Author Mock Up" />
                    </div><!--  /.mock-up-block -->
                </div><!--  /.col-lg-10 -->
            </div><!--  /.row -->
        </div><!--  /.container -->
    </section><!--  /.about-block -->

    <!-- Fun Fact Block
    ================================================== -->
    <section class="fun-facts-block bg-black-russian pd-t-235 pd-b-120">
        <div class="container hg-promo-numbers">
            <div class="row">
                @forelse($milestones as $milestone)
                    <div class="col-sm-6 col-lg-3">
                        <div class="tg-promo-number text-center">
                            <div class="odometer" data-odometer-final="{{ $milestone->milestone_digit }}"></div><!--  /.odometer -->
                                <h4 class="promo-title">{{ $milestone->milestone_name }}</h4><!--  /.promo-title -->
                        </div><!--  /.tg-promo-number -->
                    </div><!--  /.col-sm-6 -->
                @empty
                    <div class="col-md-12">
                        <div>
                            <h1 style="color: purple">Author did not completed any milestone. Stay tuned with Author.</h1>
                        </div><!--  /.col -->
                    </div><!--  /.col-md-4 -->
                @endforelse
            </div><!--  /.row -->
        </div><!--  /.container -->
    </section><!--  /.fun-facts-block -->

    <!-- Our Work Step
    ================================================== -->
    <section class="call-to-action pd-t-105 pd-b-120">
        <div class="container">
            <h2 class="call-to-title">Let's Work On Your Next Projects</h2><!--  /.call-to-title -->
            <a href="#contact-block" class="btn btn-call-to mrt-30">Hire Me Know</a>
        </div><!--  /.container -->

        <div class="hg-background hg-overlay" data-bg-parallax="scroll" data-bg-parallax-speed="3">
            <div class="hg-background-image hg-parallax-element" data-bg-image="{{ asset('uploads') }}/hire_me_image/{{ hireMeImage() }}">
        </div><!--  /.hg-background -->
    </section><!--  /.our-work-step -->

    <!-- Portfolio Block
    ================================================== -->
    <section class="portfolio-block pd-t-105 pd-b-90" id="portfolio-block">
        <div class="container">
            <!-- Title Row -->
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h2 class="title-counter">03</h2><!--  /.title-counter -->
                        <h2 class="title-main">Portfolio</h2><!-- /.title-main -->
                        <div class="title-border">
                            <span class="small-border bg-black"></span>
                            <span class="large-border bg-deep-cerise"></span>
                            <span class="small-border bg-black"></span>
                        </div><!--  /.title-border -->
                    </div><!--  /.section-title -->
                </div><!--  /.col-12 -->
            </div><!--  /.row -->

            <!-- Content Row -->
            <div class="row portfolio-grid">
                @forelse($portfolio as $portfolios)
                    <div class="col-md-6 col-lg-4 app item">
                        <div class="portfolio-item" data-animate="hg-fadeInUp">
                            <figure class="portfolio-thumb">
                                <img src="{{asset('uploads')}}/portfolios/thumbnail_image/{{ $portfolios->thumbnail_image }}" alt="Portfolio Item">
                                <div class="overlay-wrapper">
                                    <div class="overlay"></div><!--  /.overlay -->
                                    <div class="popup">
                                        <div class="popup-inner">
                                            <a href="{{asset('uploads')}}/portfolios/thumbnail_image/{{ $portfolios->thumbnail_image }}" class="popup-image">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </div><!--  /.popup-inner -->
                                    </div><!--  /.popup -->
                                </div><!--  /.overlay-wrapper -->
                            </figure><!-- /.portfolio-thumb -->
                            <div class="content">
                                <h3><a href="{{ route('portfolio_details', $portfolios->id) }}">{{ $portfolios->title }}</a></h3>
                                <div class="cate"><a href="{{ route('show_portfolios_category', $portfolios->category_id) }}">{{ $portfolios->PortfolioCats->category_name }}</a></div>
                            </div>
                        </div><!--  /.portfolio-item -->
                    </div><!-- /.col-lg-4 -->
                @empty
                    <div class="col-md-6 col-lg-4 app item">
                        <h3>Admin Did not add his porfolios</h3>
                    </div><!-- /.col-lg-4 -->
                @endforelse
            </div><!--  /.row -->
        </div><!--  /.container -->
    </section><!--  /.portfolio-block -->

    <!-- Testimonial Block
    ================================================== -->
    <section class="testimonial-block pd-t-105 pd-b-120">
        <div class="container">
            <!-- Title Row -->
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title-counter color-dim-gray-im">04</h2><!--  /.title-counter -->
                        <h2 class="title-main color-white-im">Testimonial</h2><!-- /.title-main -->
                        <div class="title-border">
                            <span class="small-border bg-white"></span>
                            <span class="large-border bg-deep-cerise"></span>
                            <span class="small-border bg-white"></span>
                        </div><!--  /.title-border -->
                    </div><!--  /.section-title -->
                </div><!--  /.col-12 -->
            </div><!--  /.row -->

            <!-- Content Row -->
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="testimonial-carousel owl-carousel" data-owl-items="1" data-owl-dots="1" data-owl-margin="30" data-animate="hg-fadeInUp">
                        @forelse($testimonials as $testimonial)
                            <div class="item">
                                <div class="client-testimonial">
                                    <div class="client-thumb">
                                        <img src="{{asset('uploads')}}/testimonial/testimonial_image/{{ $testimonial->testimonial_image }}" alt="Image not found" />
                                    </div><!--  /.client-thumb -->
                                    <div class="testimonial-details">
                                        <div class="client-area">
                                            <div class="client-detail">
                                                <h4 class="client-name">{{ $testimonial->testimonial_given }}</h4><!--  /.client-name -->
                                            </div><!--  /.client-detail -->
                                        </div><!--  /.client-area -->
                                        <h2 class="client-name">{{ $testimonial->designation }}</h2><!--  /.client-name -->
                                        <div class="details">
                                            <p>{{ $testimonial->testimonial }}</p>
                                        </div><!--  /.details -->
                                    </div><!--  /.testimonial-details -->
                                </div><!--  /.client-testimonial -->
                            </div><!--  /.item -->
                        @empty
                            <div class="item">
                                <div class="client-testimonial">
                                    <div class="testimonial-details">
                                        <div class="details">
                                            <p>Author did not get any testimonial from any client.</p>
                                        </div><!--  /.details -->
                                    </div><!--  /.testimonial-details -->
                                </div><!--  /.client-testimonial -->
                            </div><!--  /.item -->
                        @endforelse
                    </div><!--  /.owl-carousel -->
                </div><!--  /.col-md-10 -->
            </div><!--  /.row -->
        </div><!--  /.container -->
        
        <!-- Background Block -->
        <div class="hg-background hg-overlay" data-bg-parallax="scroll" data-bg-parallax-speed="3">
            <div class="hg-background-image hg-parallax-element" data-bg-image="{{ asset('uploads') }}/testimonial_image/{{ testimonialImage() }}"></div><!--  /.hg-background-image -->
        </div><!--  /.hg-background -->
    </section><!--  /.testimonial-block -->

    <!-- Brand Block
    ================================================== -->
    <div class="work-for-brand bg-black-russian-2 pd-t-120 pd-b-120">
        <div class="container">
            <div class="row align-items-center">
                @forelse($companies as $company)
                    <div class="col">
                        <a href="#"><img src="{{asset('uploads')}}/company_logo/{{ $company->company_logo }}" alt="Company" /></a>
                    </div><!--  /.col -->
                @empty
                    <div class="col">
                        <h1 style="color: rgb(253, 3, 253)">Author does not work with any company.</h1>
                    </div><!--  /.col -->
                @endforelse
            </div><!--  /.row -->
        </div><!--  /.container -->
    </div><!--  /.work-for-brand -->

    <!-- Blog Block
    ================================================== -->
    <section class="blog-block pd-t-105 pd-b-90" id="blog-block">
        <div class="container">
            <!-- Title Row -->
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h2 class="title-counter">05</h2><!--  /.title-counter -->
                        <h2 class="title-main">News Feed</h2><!-- /.title-main -->
                        <div class="title-border">
                            <span class="small-border bg-black"></span>
                            <span class="large-border bg-deep-cerise"></span>
                            <span class="small-border bg-black"></span>
                        </div><!--  /.title-border -->
                    </div><!--  /.section-title -->
                </div><!--  /.col-12 -->
            </div><!--  /.row -->
            
            <!-- Content Row -->
            <div class="row">

                @forelse($blogs as $blog)
                    <div class="col-md-4">
                        <div class="post-item" data-animate="hg-fadeInUp">
                            <article class="post">
                                <figure class="post-thumb">
                                    <div class="entry-date">{{ $blog->created_at->diffForHumans() }}</div><!--  /.entry-date -->
                                    <a href="{{ route('show_categories', $blog->category_id) }}">
                                        <img src="{{asset('uploads')}}/blog/blog_thumbnail_image/{{ $blog->blog_thumbnail_image }}" alt="Post Thumb" class="img-fluid" />
                                    </a>
                                </figure><!--  /.post-thumb -->
                                <div class="post-detail">
                                    <h2 class="entry-title"><a href="{{ route('show_blog', $blog->id) }}">{{ $blog->title }}</a></h2><!--  /.entry-title -->
                                    <div class="entry-cat">
                                        <a href="{{ route('show_categories', $blog->category_id) }}">{{ $blog->blog_category->category_name }}</a>
                                    </div><!--  /.entry-cat -->
                                </div><!--  /.post-detail -->
                            </article><!--  /.post -->
                        </div><!--  /.post-item -->
                    </div><!--  /.col-md-4 -->
                @empty
                    <div class="col-md-12">
                        <div>
                            <h1 style="color: purple">Author did not write any blog. Stay tuned with Author.</h1>
                        </div><!--  /.col -->
                    </div><!--  /.col-md-4 -->
                @endforelse
            </div><!--  /.row -->
        </div><!--  /.container -->
    </section><!--  /.blog-block -->

    <!-- Contact Block
    ================================================== -->    
    <section class="contact-block pd-t-105 pd-b-120" id="contact-block">
        <div class="container">
            <!-- Title Row -->
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <h2 class="title-counter color-dim-gray-im">06</h2><!--  /.title-counter -->
                        <h2 class="title-main color-white-im">Get In Touch</h2><!-- /.title-main -->
                        <div class="title-border">
                            <span class="small-border bg-white"></span>
                            <span class="large-border bg-deep-cerise"></span>
                            <span class="small-border bg-white"></span>
                        </div><!--  /.title-border -->
                    </div><!--  /.section-title -->
                </div><!--  /.col-12 -->
            </div><!--  /.row -->

            <!-- Content Row -->
            <div class="row justify-content-md-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div><!--  /.icon -->
                                <div class="details">
                                    <h3 class="info-title">Mail</h3><!--  /.info-title -->
                                    @forelse($contact_infos as $contact_info)
                                        <p class="info-detail">{{ $contact_info->email }}</p>
                                        @empty
                                        <p class="info-detail">Author did not add his contact email. Stay tunded with author.</p>
                                    @endforelse
                                </div><!--  /.details -->
                            </div><!--  /.contact-item -->

                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-phone"></i>
                                </div><!--  /.icon -->
                                <div class="details">
                                        <h3 class="info-title">Cell Phone Number</h3><!--  /.info-title -->
                                    @forelse($contact_infos as $contact_info)
                                             <p class="info-detail">{{ $contact_info->cell_number }}</p>
                                        @empty
                                            <p class="info-detail">Author did not add his contact cellphone number. Stay tunded with author.</p>
                                    @endforelse
                                </div><!--  /.details -->
                            </div><!--  /.contact-item -->

                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div><!--  /.icon -->
                                <div class="details">
                                    <h3 class="info-title">Address</h3><!--  /.info-title -->
                                    @forelse($contact_infos as $contact_info)
                                        <p class="info-detail">{{ $contact_info->address }}</p>
                                        @empty
                                        <p class="info-detail">Author did not add his contact address. Stay tunded with author.</p>
                                    @endforelse
                                </div><!--  /.details -->
                            </div><!--  /.contact-item -->
                        </div><!--  /.col-md-4 -->

                        <div class="col-md-8">
                            {{-- confirmation alert --}}
                            @if(session()->has('contact_created'))
                                <div class="alert alert-light alert-dismissible fade show" role="alert">
                                    <strong>{{ session('contact_created') }}</strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form method="post" class="contact-form white-theme hg-form-email" method="POST" action="{{ route('contact_create_post') }}" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Your Name </label>
                                            <input name="contact_name" type="text" class="form-control" />
                                            @error('contact_name')
                                                <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                                                    role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <strong>{{ $message }}</strong> 
                                                </div>
                                            @enderror
                                        </div><!--  /.col-md-6 -->

                                        <div class="col-md-6">
                                            <label>Your Email </label>
                                            <input name="contact_email" type="email" class="form-control" />
                                            @error('contact_email')
                                                <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                                                    role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <strong>{{ $message }}</strong> 
                                                </div>
                                            @enderror
                                        </div><!--  /.col-md-6 -->

                                        <div class="col-md-12">
                                            <label>Subject</label>
                                            <input name="contact_subject" type="text" class="form-control" />
                                            @error('contact_subject')
                                                <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                                                    role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <strong>{{ $message }}</strong> 
                                                </div>
                                            @enderror
                                        </div><!--  /.col-md-12 -->

                                        <div class="col-md-12">
                                            <label>Your Message</label>
                                            <textarea name="contact_message" cols="30" rows="10" class="form-control"></textarea>
                                            @error('contact_message')
                                                <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                                                    role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <strong>{{ $message }}</strong> 
                                                </div>
                                            @enderror
                                        </div><!--  /.col-md-12 -->

                                        <div class="col-md-12">
                                            <label>Attachment</label>
                                            <input name="contact_attachment" type="file" class="form-control" />
                                            <small class="text-white bg-dark">
                                                <ol>
                                                    <li>
                                                        You can attach file if you want.
                                                    </li>
                                                    <li>
                                                        Do not submit blank file.
                                                    </li>
                                                </ol>
                                            </small>
                                            @error('contact_attachment')
                                                <div class="alert alert-icon alert-white alert-warning alert-dismissible fade show"
                                                    role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <strong>{{ $message }}</strong> 
                                                </div>
                                            @enderror
                                        </div><!--  /.col-md-12 -->
                                        <br><br><br>

                                        <div class="col-md-12 mt-3">
                                            <button type="submit" class="btn btn-default btn-contact">Send A Message</button>
                                        </div><!--  /.col-md-12 -->
                                    </div><!--  /.row -->
                            </form><!--  /.contact-form -->
                        </div><!--  /.col-md-8 -->
                    </div><!--  /.row -->
                </div><!--  /.col-lg-10 -->
            </div><!--  /.row -->
        </div><!--  /.container -->

        <!-- Background Block -->
        <div class="hg-background hg-overlay" data-bg-parallax="scroll" data-bg-parallax-speed="3">
            <div class="hg-background-image hg-parallax-element" data-bg-image="{{ asset('uploads') }}/get_in_touch_image/{{ getInTouchImage() }}"></div><!--  /.hg-background-image -->
        </div><!--  /.hg-background -->
    </section><!--  /.contact-block -->

@endsection