
<!doctype html>
<html lang="en">

<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Specific Meta
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Personal Portfolio is a modern presentation HTML5 Portfolio HTML Template.">
    <meta name="keywords" content="HTML5, Template, Design, portfolio, Personal Portfolio, Single portfolio" />
    <meta name="author" content="HTMLguru">

    <!-- Titles
    ================================================== -->
    <title>Personal Portfolio</title>

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ asset('front') }}/assets/images/site-icon.png">
    <link rel="apple-touch-icon" href="{{ asset('front') }}/assets/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('front') }}/assets/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('front') }}/assets/images/apple-touch-icon-114x114.png">

    <!-- Custom Font
    ================================================== -->
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/simple-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/odometer-theme-default.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('front') }}/assets/css/style.css">

    <script src="{{asset('front')}}/assets/js/modernizr.min.js"></script>
</head>

<body>
    <!-- Preloader
    ================================================== --> 
    {{-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div><!-- /preloader-icon -->
        </div><!-- /preloader-inner -->
    </div><!-- /preloader --> --}}

    <!-- Header
    ================================================== --> 
    <header class="site-header sticky-header">
        <div class="container-fluid pd-0">
            <div class="row no-gutters">
                <div class="col-lg-7">
                    <div class="header-left-block dark">  
                        <!-- Site Branding -->
                        <div class="site-branding">
                            <a href="index.html"><img src="{{asset('front')}}/assets/images/logo.png" alt="Site Logo" /></a>
                        </div><!--  /.site-branding -->
                        
                        <!-- Site Navigation -->
                        <div class="site-navigation">
                            <div class="hamburger-menus">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <nav class="navigation">
                                <div class="overlaybg"></div><!--  /.overlaybg -->
                                <!-- Main Menu -->
                                <div class="menu-wrapper">
                                    <div class="menu-content">
                                        <ul class="mainmenu">         
                                            <li>
                                                <a href="#service-block">Service</a>
                                            </li>
                                            <li>
                                                <a href="#about-block">About</a>
                                            </li>                                    
                                            <li>
                                                <a href="#portfolio-block">Works</a>
                                            </li>
                                            <li>
                                                <a href="#blog-block">Blog</a>
                                            </li>
                                            <li>
                                                <a href="#contact-block">Contact</a>
                                            </li>
                                        </ul> <!-- /.menu-list -->
                                    </div> <!-- /.hours-content-->
                                </div><!-- /.menu-wrapper --> 
                            </nav>
                        </div><!--  /.site-navigation -->
                    </div><!--  /.header-left-block -->
                </div><!--  /.col-lg-7 -->

                <div class="col-lg-5">
                    <div class="header-right-block bg-midnight-express dark">
                        <div class="mail-block">
                            <a href="mailto:example@domain.com"><i class="fas fa-envelope"></i><span>example@domain.com</span></a>
                        </div><!--  /.mail-block -->
                        <div class="call-block">
                            <a href="tel:008969854756"><i class="fas fa-phone"></i><span>008969854756</span></a>
                        </div><!--  /.call-block -->
                        <div class="social-block">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div><!--  /.social-block -->
                    </div><!--  /.header-right-block -->
                </div><!--  /.col-lg-5 -->
            </div><!--  /.row -->
        </div><!--  /.container-fluid -->
    </header><!-- /.site-header -->

    <!-- Hero Block
    ================================================== -->
    <section class="hero-block" id="hero-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-9">
                    <div class="horizontal-border"></div><!--  /.horizontal-border -->
                    @isset($landviews)
                        @foreach($landviews as  $landview)
                            <h2 class="hero-subheading">{{ $landview->title }}</h2>
                            <h2 class="hero-title">{{ $landview->name }}</h2><!--  /.hero-title -->
                        @endforeach
                    @endisset
                        <ul class="hero-designation">
                            @isset($landviews)
                                @foreach($landviews as $landview)
                                    <li>{{ $landview->profession_name }}</li>
                                @endforeach
                            @endisset
                        </ul><!--  /.hero-designation -->
                    <a href="https://player.vimeo.com/video/4760972" class="hero-video-btn video-popup">
                        <i class="fas fa-play"></i>
                        <span class="video-title">About Me</span>
                    </a>
                </div><!--  /.col-lg-8 -->
            </div><!--  /.row -->
        </div><!--  /.container-fluid -->
        <div class="hg-background">
            <div class="hg-background-image" data-bg-image="{{ asset('front') }}/assets/images/banner/hero-banner-2.jpg"></div><!--  /.hg-background-image -->
        </div><!--  /.hg-background -->
    </section><!--  /.hero-block -->

    <!-- Service Block
    ================================================== -->
    <section class="service-block bg-midnight-express pd-t-105 pd-b-120" id="service-block">
        <div class="container">
            <!-- Title Row -->
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title dark">
                        <h2 class="title-counter">01</h2><!--  /.title-counter -->
                        <h2 class="title-main">Services</h2><!-- /.title-main -->
                        <div class="title-border">
                            <span class="small-border bg-white"></span>
                            <span class="large-border bg-deep-cerise"></span>
                            <span class="small-border bg-white"></span>
                        </div><!--  /.title-border -->
                    </div><!--  /.section-title -->
                </div><!--  /.col-12 -->
            </div><!--  /.row -->
            
            <!-- Content Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="service-carousel owl-carousel" data-owl-items="3" data-owl-margin="30" data-owl-dots="1" data-owl-loop="1" data-owl-center="1" data-animate="hg-fadeInUp">

                        @foreach($services as $value)
                            <div class="item">
                                <div class="service-card dark">
                                    <div class="service-icon color-deep-cerise">
                                        <i class="fas fa-marker"></i>
                                    </div><!--  /.service-icon -->
                                    <h2 class="service-title">
                                        {{ $value->service_title }}
                                    </h2><!--  /.service-title -->
                                    <ul class="service-list">
                                        <li>{{ $value->service_list_1 }}</li>
                                        <li>{{ $value->service_list_2 }}</li>
                                        <li>{{ $value->service_list_3 }}</li>
                                        <li>{{ $value->service_list_4 }}</li>
                                        <li>{{ $value->service_list_5 }}</li>
                                        <li>{{ $value->service_list_6 }}</li>
                                    </ul><!--  /.service-list -->
                                </div><!--  /.service-card -->
                            </div><!--  /.item --> 
                        @endforeach
                    </div><!--  /.owl-carousel -->
                </div><!--  /.col-lg-12 -->
            </div><!--  /.row -->
        </div><!--  /.container -->
    </section><!--  /.service-block -->

    <!-- About Block
    ================================================== -->
    <section class="about-block pd-t-105 bg-black-russian-3" id="about-block">
        <div class="container">
            <!-- Title Row -->
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title dark">
                        <h2 class="title-counter">02</h2><!--  /.title-counter -->
                        <h2 class="title-main">About Me</h2><!-- /.title-main -->
                        <div class="title-border">
                            <span class="small-border bg-white"></span>
                            <span class="large-border bg-deep-cerise"></span>
                            <span class="small-border bg-white"></span>
                        </div><!--  /.title-border -->
                    </div><!--  /.section-title -->
                </div><!--  /.col-12 -->
            </div><!--  /.row -->

            <!-- Content Row -->
            <div class="row justify-content-md-center mrb-75">
                <div class="col-lg-10 pd-l-60 pd-r-60">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="xl-title mrb-30 color-white">About My Business &amp; Skills</h2>
                            @foreach($about_me_des as $value)
                            <p class="description mrb-75 fts-18 w-500 color-silver">{{ $value->about_me_des }}</p>
                            @endforeach
                        </div><!--  /.col-lg-12 -->
                    </div><!--  /.row -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="skill-progress dark">
                                <div class="skill-bar" data-percentage="94%">
                                    <h4 class="progress-title-holder">
                                        <span class="progress-title">Strategy</span>
                                        <span class="progress-wrapper">
                                            <span class="progress-mark">
                                                <span class="percent">94%</span>
                                            </span>
                                        </span>
                                    </h4>
                                    <div class="progress-outter">
                                        <div class="progress-content"></div>
                                    </div>
                                </div><!-- /.skill-bar -->

                                <div class="skill-bar" data-percentage="85%">
                                    <h4 class="progress-title-holder">
                                        <span class="progress-title">Marketing</span>
                                        <span class="progress-wrapper">
                                            <span class="progress-mark">
                                                <span class="percent">85%</span>
                                            </span>
                                        </span>
                                    </h4>
                                    <div class="progress-outter">
                                        <div class="progress-content"></div>
                                    </div>
                                </div><!-- /.skill-bar -->
                            </div>
                        </div><!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="skill-progress dark">
                                <div class="skill-bar" data-percentage="88%">
                                    <h4 class="progress-title-holder">
                                        <span class="progress-title">Design</span>
                                        <span class="progress-wrapper">
                                            <span class="progress-mark">
                                                <span class="percent">88%</span>
                                            </span>
                                        </span>
                                    </h4>
                                    <div class="progress-outter">
                                        <div class="progress-content"></div>
                                    </div>
                                </div><!-- /.skill-bar -->

                                <div class="skill-bar" data-percentage="90%">
                                    <h4 class="progress-title-holder">
                                        <span class="progress-title">Developing</span>
                                        <span class="progress-wrapper">
                                            <span class="progress-mark">
                                                <span class="percent">90%</span>
                                            </span>
                                        </span>
                                    </h4>
                                    <div class="progress-outter">
                                        <div class="progress-content"></div>
                                    </div>
                                </div><!-- /.skill-bar -->
                            </div>
                        </div><!-- /.col-lg-6 -->
                    </div><!--  /.row -->
                </div><!--  /.col-lg-10 -->
            </div><!--  /.row -->
            
            <!-- Mock Up Content Row -->
            {{-- <div class="row justify-content-md-center">
                <div class="col-lg-11">
                    <div class="mock-up-block ml-b-135" data-animate="hg-fadeInUp">
                        <img src="{{asset('front')}}/assets/images/author-mockup-dark.png" alt="Author Mock Up" />
                    </div><!--  /.mock-up-block -->
                </div><!--  /.col-lg-10 -->
            </div><!--  /.row --> --}}
        </div><!--  /.container -->
    </section><!--  /.about-block -->

    <!-- Fun Fact Block
    ================================================== -->
    <section class="fun-facts-block bg-midnight-express pd-t-235 pd-b-120">
        <div class="container hg-promo-numbers">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="tg-promo-number text-center">
                        <div class="odometer" data-odometer-final="117">0</div><!--  /.odometer -->
                        <h4 class="promo-title">Happy Client</h4><!--  /.promo-title -->
                    </div><!--  /.tg-promo-number -->
                </div><!--  /.col-sm-6 -->
                <div class="col-sm-6 col-lg-3">
                    <div class="tg-promo-number text-center">
                        <div class="odometer" data-odometer-final="20">0</div><!--  /.odometer -->
                        <h4 class="promo-title">Years Experience</h4><!--  /.promo-title -->
                    </div><!--  /.tg-promo-number -->
                </div><!--  /.col-sm-6 -->                
                <div class="col-sm-6 col-lg-3">
                    <div class="tg-promo-number text-center">
                        <div class="odometer" data-odometer-final="16">0</div><!--  /.odometer -->
                        <h4 class="promo-title">Award Winer</h4><!--  /.promo-title -->
                    </div><!--  /.tg-promo-number -->
                </div><!--  /.col-sm-6 -->                
                <div class="col-sm-6 col-lg-3">
                    <div class="tg-promo-number text-center">
                        <div class="odometer" data-odometer-final="156">0</div><!--  /.odometer -->
                        <h4 class="promo-title">Project Complete</h4><!--  /.promo-title -->
                    </div><!--  /.tg-promo-number -->
                </div><!--  /.col-sm-6 -->
            </div><!--  /.row -->
        </div><!--  /.container -->
    </section><!--  /.fun-facts-block -->

    <!-- Our Work Step
    ================================================== -->
    <section class="call-to-action pd-t-105 pd-b-120">
        <div class="container">
            <h2 class="call-to-title">Let's Work On Your Next Projects</h2><!--  /.call-to-title -->
            <a href="#" class="btn btn-call-to mrt-30">Hire Me Know</a>
        </div><!--  /.container -->

        <div class="hg-background hg-overlay dark" data-bg-parallax="scroll" data-bg-parallax-speed="3">
            <div class="hg-background-image hg-parallax-element" data-bg-image="{{asset('front')}}/assets/images/step-bg.jpg"></div><!--  /.hg-background-image -->
        </div><!--  /.hg-background -->
    </section><!--  /.our-work-step -->

    <!-- Portfolio Block
    ================================================== -->
    <section class="portfolio-block bg-midnight-express pd-t-105 pd-b-90" id="portfolio-block">
        <div class="container">
            <!-- Title Row -->
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title dark">
                        <h2 class="title-counter">03</h2><!--  /.title-counter -->
                        <h2 class="title-main">Portfolio</h2><!-- /.title-main -->
                        <div class="title-border">
                            <span class="small-border bg-white"></span>
                            <span class="large-border bg-deep-cerise"></span>
                            <span class="small-border bg-white"></span>
                        </div><!--  /.title-border -->
                    </div><!--  /.section-title -->
                </div><!--  /.col-12 -->
            </div><!--  /.row -->

            <!-- Content Row -->
            <div class="row portfolio-grid">
                <div class="col-md-6 col-lg-4 app item">
                    <div class="portfolio-item" data-animate="hg-fadeInUp">
                        <figure class="portfolio-thumb">
                            <img src="{{asset('front')}}/assets/images/portfolio/portfolio-dark-1.jpg" alt="Portfolio Item">
                            <div class="overlay-wrapper">
                                <div class="overlay"></div><!--  /.overlay -->
                                <div class="popup">
                                    <div class="popup-inner">
                                        <a href="{{asset('front')}}/assets/images/portfolio/portfolio-dark-1.jpg" class="popup-image"><i class="fa fa-search"></i></a>
                                    </div><!--  /.popup-inner -->
                                </div><!--  /.popup -->
                            </div><!--  /.overlay-wrapper -->
                        </figure><!-- /.portfolio-thumb -->
                        <div class="content">
                            <h3><a href="portfolio-single-dark.html">Branding Abstract Design</a></h3>
                            <div class="cate"><a href="#">Branding</a></div>
                        </div>                      
                    </div><!--  /.portfolio-item -->
                </div><!-- /.col-lg-4 -->               

                <div class="col-md-6 col-lg-4 illustration item">
                    <div class="portfolio-item" data-animate="hg-fadeInUp">
                        <figure class="portfolio-thumb">
                            <img src="{{asset('front')}}/assets/images/portfolio/portfolio-dark-2.jpg" alt="Portfolio Item">
                            <div class="overlay-wrapper">
                                <div class="overlay"></div><!--  /.overlay -->
                                <div class="popup">
                                    <div class="popup-inner">
                                        <a href="{{asset('front')}}/assets/images/portfolio/portfolio-dark-2.jpg" class="popup-image"><i class="fa fa-search"></i></a>
                                    </div><!--  /.popup-inner -->
                                </div><!--  /.popup -->
                            </div><!--  /.overlay-wrapper -->
                        </figure><!-- /.portfolio-thumb -->
                        <div class="content">
                            <h3><a href="portfolio-single-dark.html">Branding Abstract Design</a></h3>
                            <div class="cate"><a href="#">Branding</a></div>
                        </div>                      
                    </div><!--  /.portfolio-item -->
                </div><!-- /.col-lg-4 -->

                <div class="col-md-6 col-lg-4 design item">
                    <div class="portfolio-item" data-animate="hg-fadeInUp">
                        <figure class="portfolio-thumb">
                            <img src="{{asset('front')}}/assets/images/portfolio/portfolio-dark-3.jpg" alt="Portfolio Item">
                            <div class="overlay-wrapper">
                                <div class="overlay"></div><!--  /.overlay -->
                                <div class="popup">
                                    <div class="popup-inner">
                                        <a href="{{asset('front')}}/assets/images/portfolio/portfolio-dark-3.jpg" class="popup-image"><i class="fa fa-search"></i></a>
                                    </div><!--  /.popup-inner -->
                                </div><!--  /.popup -->
                            </div><!--  /.overlay-wrapper -->
                        </figure><!-- /.portfolio-thumb -->
                        <div class="content">
                            <h3><a href="portfolio-single-dark.html">Branding Abstract Design</a></h3>
                            <div class="cate"><a href="#">Branding</a></div>
                        </div>                      
                    </div><!--  /.portfolio-item -->
                </div><!-- /.col-lg-4 -->

                <div class="col-md-6 col-lg-4 illustration item">
                    <div class="portfolio-item" data-animate="hg-fadeInUp">
                        <figure class="portfolio-thumb">
                            <img src="{{asset('front')}}/assets/images/portfolio/portfolio-dark-4.jpg" alt="Portfolio Item">
                            <div class="overlay-wrapper">
                                <div class="overlay"></div><!--  /.overlay -->
                                <div class="popup">
                                    <div class="popup-inner">
                                        <a href="{{asset('front')}}/assets/images/portfolio/portfolio-dark-4.jpg" class="popup-image"><i class="fa fa-search"></i></a>
                                    </div><!--  /.popup-inner -->
                                </div><!--  /.popup -->
                            </div><!--  /.overlay-wrapper -->
                        </figure><!-- /.portfolio-thumb -->
                        <div class="content">
                            <h3><a href="portfolio-single-dark.html">Branding Abstract Design</a></h3>
                            <div class="cate"><a href="#">Branding</a></div>
                        </div>                      
                    </div><!--  /.portfolio-item -->
                </div><!-- /.col-lg-4 -->

                <div class="col-md-6 col-lg-4 app item">
                    <div class="portfolio-item" data-animate="hg-fadeInUp">
                        <figure class="portfolio-thumb">
                            <img src="{{asset('front')}}/assets/images/portfolio/portfolio-dark-5.jpg" alt="Portfolio Item">
                            <div class="overlay-wrapper">
                                <div class="overlay"></div><!--  /.overlay -->
                                <div class="popup">
                                    <div class="popup-inner">
                                        <a href="{{asset('front')}}/assets/images/portfolio/portfolio-dark-5.jpg" class="popup-image"><i class="fa fa-search"></i></a>
                                    </div><!--  /.popup-inner -->
                                </div><!--  /.popup -->
                            </div><!--  /.overlay-wrapper -->
                        </figure><!-- /.portfolio-thumb -->
                        <div class="content">
                            <h3><a href="portfolio-single-dark.html">Branding Abstract Design</a></h3>
                            <div class="cate"><a href="#">Branding</a></div>
                        </div>                      
                    </div><!--  /.portfolio-item -->
                </div><!-- /.col-lg-4 -->

                <div class="col-md-6 col-lg-4 design item">
                    <div class="portfolio-item" data-animate="hg-fadeInUp">
                        <figure class="portfolio-thumb">
                            <img src="{{asset('front')}}/assets/images/portfolio/portfolio-dark-6.jpg" alt="Portfolio Item">
                            <div class="overlay-wrapper">
                                <div class="overlay"></div><!--  /.overlay -->
                                <div class="popup">
                                    <div class="popup-inner">
                                        <a href="{{asset('front')}}/assets/images/portfolio/portfolio-dark-6.jpg" class="popup-image"><i class="fa fa-search"></i></a>
                                    </div><!--  /.popup-inner -->
                                </div><!--  /.popup -->
                            </div><!--  /.overlay-wrapper -->
                        </figure><!-- /.portfolio-thumb -->
                        <div class="content">
                            <h3><a href="portfolio-single-dark.html">Branding Abstract Design</a></h3>
                            <div class="cate"><a href="#">Branding</a></div>
                        </div>                      
                    </div><!--  /.portfolio-item -->
                </div><!-- /.col-lg-4 -->

                <div class="col-md-6 col-lg-4 app item">
                    <div class="portfolio-item" data-animate="hg-fadeInUp">
                        <figure class="portfolio-thumb">
                            <img src="{{asset('front')}}/assets/images/portfolio/portfolio-dark-8.jpg" alt="Portfolio Item">
                            <div class="overlay-wrapper">
                                <div class="overlay"></div><!--  /.overlay -->
                                <div class="popup">
                                    <div class="popup-inner">
                                        <a href="{{asset('front')}}/assets/images/portfolio/portfolio-dark-8.jpg" class="popup-image"><i class="fa fa-search"></i></a>
                                    </div><!--  /.popup-inner -->
                                </div><!--  /.popup -->
                            </div><!--  /.overlay-wrapper -->
                        </figure><!-- /.portfolio-thumb -->
                        <div class="content">
                            <h3><a href="portfolio-single-dark.html">Branding Abstract Design</a></h3>
                            <div class="cate"><a href="#">Branding</a></div>
                        </div>                      
                    </div><!--  /.portfolio-item -->
                </div><!-- /.col-lg-4 -->

                <div class="col-md-6 col-lg-4 illustration item">
                    <div class="portfolio-item" data-animate="hg-fadeInUp">
                        <figure class="portfolio-thumb">
                            <img src="{{asset('front')}}/assets/images/portfolio/portfolio-dark-9.jpg" alt="Portfolio Item">
                            <div class="overlay-wrapper">
                                <div class="overlay"></div><!--  /.overlay -->
                                <div class="popup">
                                    <div class="popup-inner">
                                        <a href="{{asset('front')}}/assets/images/portfolio/portfolio-dark-9.jpg" class="popup-image"><i class="fa fa-search"></i></a>
                                    </div><!--  /.popup-inner -->
                                </div><!--  /.popup -->
                            </div><!--  /.overlay-wrapper -->
                        </figure><!-- /.portfolio-thumb -->
                        <div class="content">
                            <h3><a href="portfolio-single-dark.html">Branding Abstract Design</a></h3>
                            <div class="cate"><a href="#">Branding</a></div>
                        </div>                      
                    </div><!--  /.portfolio-item -->
                </div><!-- /.col-lg-4 -->

                <div class="col-md-6 col-lg-4 design item">
                    <div class="portfolio-item" data-animate="hg-fadeInUp">
                        <figure class="portfolio-thumb">
                            <img src="{{asset('front')}}/assets/images/portfolio/portfolio-dark-7.jpg" alt="Portfolio Item">
                            <div class="overlay-wrapper">
                                <div class="overlay"></div><!--  /.overlay -->
                                <div class="popup">
                                    <div class="popup-inner">
                                        <a href="{{asset('front')}}/assets/images/portfolio/portfolio-dark-7.jpg" class="popup-image"><i class="fa fa-search"></i></a>
                                    </div><!--  /.popup-inner -->
                                </div><!--  /.popup -->
                            </div><!--  /.overlay-wrapper -->
                        </figure><!-- /.portfolio-thumb -->
                        <div class="content">
                            <h3><a href="portfolio-single-dark.html">Branding Abstract Design</a></h3>
                            <div class="cate"><a href="#">Branding</a></div>
                        </div>                      
                    </div><!--  /.portfolio-item -->
                </div><!-- /.col-lg-4 -->
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
                        <div class="item">
                            <div class="client-testimonial dark">
                                <div class="client-thumb">
                                    <img src="{{asset('front')}}/assets/images/testimonials/client-1.png" alt="Zohan Smith" />
                                </div><!--  /.client-thumb -->
                                <div class="testimonial-details">
                                    <div class="client-area">
                                        <div class="client-detail">
                                            <h4 class="client-name">Zohan Smith</h4><!--  /.client-name -->
                                        </div><!--  /.client-detail -->
                                    </div><!--  /.client-area -->
                                    <div class="details">
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when established fact that a reader will be looking at its layout.</p>
                                    </div><!--  /.details -->
                                </div><!--  /.testimonial-details -->
                            </div><!--  /.client-testimonial -->
                        </div><!--  /.item -->

                        <div class="item">
                            <div class="client-testimonial dark">
                                <div class="client-thumb">
                                    <img src="{{asset('front')}}/assets/images/testimonials/client-1.png" alt="Jahid Smith" />
                                </div><!--  /.client-thumb -->
                                <div class="testimonial-details">
                                    <div class="client-area">
                                        <div class="client-detail">
                                            <h4 class="client-name">Jahid Smith</h4><!--  /.client-name -->
                                        </div><!--  /.client-detail -->
                                    </div><!--  /.client-area -->
                                    <div class="details">
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when established fact that a reader will be looking at its layout.</p>
                                    </div><!--  /.details -->
                                </div><!--  /.testimonial-details -->
                            </div><!--  /.client-testimonial -->
                        </div><!--  /.item -->

                        <div class="item">
                            <div class="client-testimonial dark">
                                <div class="client-thumb">
                                    <img src="{{asset('front')}}/assets/images/testimonials/client-1.png" alt="Zohan Smith" />
                                </div><!--  /.client-thumb -->
                                <div class="testimonial-details">
                                    <div class="client-area">
                                        <div class="client-detail">
                                            <h4 class="client-name">Zohan Smith</h4><!--  /.client-name -->
                                        </div><!--  /.client-detail -->
                                    </div><!--  /.client-area -->
                                    <div class="details">
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when established fact that a reader will be looking at its layout.</p>
                                    </div><!--  /.details -->
                                </div><!--  /.testimonial-details -->
                            </div><!--  /.client-testimonial -->
                        </div><!--  /.item -->
                    </div><!--  /.owl-carousel -->
                </div><!--  /.col-md-10 -->
            </div><!--  /.row -->
        </div><!--  /.container -->
        
        <!-- Background Block -->
        <div class="hg-background hg-overlay dark" data-bg-parallax="scroll" data-bg-parallax-speed="3">
            <div class="hg-background-image hg-parallax-element" data-bg-image="{{asset('front')}}/assets/images/contact-bg.jpg"></div><!--  /.hg-background-image -->
        </div><!--  /.hg-background -->
    </section><!--  /.testimonial-block -->

    <!-- Brand Block
    ================================================== -->
    <div class="work-for-brand bg-black-russian-3 pd-t-120 pd-b-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <a href="#"><img src="{{asset('front')}}/assets/images/company/logo-1.png" alt="Company" /></a>
                </div><!--  /.col -->                
                <div class="col">
                    <a href="#"><img src="{{asset('front')}}/assets/images/company/logo-2.png" alt="Company" /></a>
                </div><!--  /.col -->                
                <div class="col">
                    <a href="#"><img src="{{asset('front')}}/assets/images/company/logo-3.png" alt="Company" /></a>
                </div><!--  /.col -->               
                <div class="col">
                    <a href="#"><img src="{{asset('front')}}/assets/images/company/logo-4.png" alt="Company" /></a>
                </div><!--  /.col -->                
                <div class="col">
                    <a href="#"><img src="{{asset('front')}}/assets/images/company/logo-5.png" alt="Company" /></a>
                </div><!--  /.col -->
            </div><!--  /.row -->
        </div><!--  /.container -->
    </div><!--  /.work-for-brand -->

    <!-- Blog Block
    ================================================== -->
    <section class="blog-block bg-midnight-express pd-t-105 pd-b-90" id="blog-block">
        <div class="container">
            <!-- Title Row -->
            <div class="row">
                <div class="col-12 text-center">
                    <div class="section-title dark">
                        <h2 class="title-counter">05</h2><!--  /.title-counter -->
                        <h2 class="title-main">News Feed</h2><!-- /.title-main -->
                        <div class="title-border">
                            <span class="small-border bg-white"></span>
                            <span class="large-border bg-deep-cerise"></span>
                            <span class="small-border bg-white"></span>
                        </div><!--  /.title-border -->
                    </div><!--  /.section-title -->
                </div><!--  /.col-12 -->
            </div><!--  /.row -->
            
            <!-- Content Row -->
            <div class="row">
                <div class="col-md-4">
                    <div class="post-item dark" data-animate="hg-fadeInUp">
                        <article class="post">
                            <figure class="post-thumb">
                                <div class="entry-date">Dec 25, 2018</div><!--  /.entry-date -->
                                <a href="blog-single-dark.html">
                                    <img src="{{asset('front')}}/assets/images/blog/blog-post-dark-1.jpg" alt="Post Thumb" />
                                </a>
                            </figure><!--  /.post-thumb -->
                            <div class="post-detail">
                                <h2 class="entry-title"><a href="blog-single-dark.html">Finding the Right Model for a job</a></h2><!--  /.entry-title -->
                                <div class="entry-cat">
                                    <a href="#">Web Developing</a> ,
                                    <a href="#">Designing</a>
                                </div><!--  /.entry-cat -->
                            </div><!--  /.post-detail -->
                        </article><!--  /.post -->
                    </div><!--  /.post-item -->
                </div><!--  /.col-md-4 -->

                <div class="col-md-4">
                    <div class="post-item dark" data-animate="hg-fadeInUp">
                        <article class="post">
                            <figure class="post-thumb">
                                <div class="entry-date">Dec 25, 2018</div><!--  /.entry-date -->
                                <a href="blog-single-dark.html">
                                    <img src="{{asset('front')}}/assets/images/blog/blog-post-dark-2.jpg" alt="Post Thumb" />
                                </a>
                            </figure><!--  /.post-thumb -->
                            <div class="post-detail">
                                <h2 class="entry-title"><a href="blog-single-dark.html">It's Better to Remain Unseen</a></h2><!--  /.entry-title -->
                                <div class="entry-cat">
                                    <a href="#">Web Developing</a> ,
                                    <a href="#">Designing</a>
                                </div><!--  /.entry-cat -->
                            </div><!--  /.post-detail -->
                        </article><!--  /.post -->
                    </div><!--  /.post-item -->
                </div><!--  /.col-md-4 -->                

                <div class="col-md-4">
                    <div class="post-item dark" data-animate="hg-fadeInUp">
                        <article class="post">
                            <figure class="post-thumb">
                                <div class="entry-date">Dec 25, 2018</div><!--  /.entry-date -->
                                <a href="blog-single-dark.html">
                                    <img src="{{asset('front')}}/assets/images/blog/blog-post-dark-3.jpg" alt="Post Thumb" />
                                </a>
                            </figure><!--  /.post-thumb -->
                            <div class="post-detail">
                                <h2 class="entry-title"><a href="blog-single-dark.html">Finding the Right Model for a job</a></h2><!--  /.entry-title -->
                                <div class="entry-cat">
                                    <a href="#">Web Developing</a> ,
                                    <a href="#">Designing</a>
                                </div><!--  /.entry-cat -->
                            </div><!--  /.post-detail -->
                        </article><!--  /.post -->
                    </div><!--  /.post-item -->
                </div><!--  /.col-md-4 -->
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
                        <h2 class="title-counter color-dim-gray-im">05</h2><!--  /.title-counter -->
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
                                    <p class="info-detail">example@domain.com</p>
                                </div><!--  /.details -->
                            </div><!--  /.contact-item -->                            

                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-phone"></i>
                                </div><!--  /.icon -->
                                <div class="details">
                                    <h3 class="info-title">Mail</h3><!--  /.info-title -->
                                    <p class="info-detail">example@domain.com</p>
                                </div><!--  /.details -->
                            </div><!--  /.contact-item -->                    

                            <div class="contact-item">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div><!--  /.icon -->
                                <div class="details">
                                    <h3 class="info-title">Address</h3><!--  /.info-title -->
                                    <p class="info-detail">Sydney - Australia 92- 25th Street,<br> Office 18, Australia </p>
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

                            <form method="post" class="contact-form dark-theme" method="POST" action="{{ route('contact_create_post') }}" enctype="multipart/form-data">
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
        <div class="hg-background hg-overlay dark" data-bg-parallax="scroll" data-bg-parallax-speed="3">
            <div class="hg-background-image hg-parallax-element" data-bg-image="{{asset('front')}}/assets/images/contact-bg.jpg"></div><!--  /.hg-background-image -->
        </div><!--  /.hg-background -->
    </section><!--  /.contact-block -->

    <!-- Footer
    ================================================== -->
    <footer class="site-footer bg-midnight-express pd-t-75 pd-b-75">
        <div class="container text-center">
            <!-- Scroll Top -->
            <div class="row">
                <div class="col-12">
                    <a href="#top" class="back-to-top dark">
                        <span class="text">Back <br>To Top</span>
                        <i class="fas fa-angle-up"></i>
                    </a>
                </div><!--  /.col-12 -->
            </div><!--  /.row -->

            <!-- Social Link -->
            <div class="row">
                <div class="col-12">
                    <ul class="footer-social dark mrt-30 mrb-30">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Pintarest</a></li>
                        <li><a href="#">Behance</a></li>
                        <li><a href="#">Dribble</a></li>
                    </ul><!--  /.footer-social -->
                </div><!--  /.col-12 -->
            </div><!--  /.row -->

            <!-- Copy Right -->
            <div class="row">
                <div class="col-12">
                    <p class="copyright-text color-gainsboro">Htmlguru <i class="fas fa-heart"></i> 2018. All rights reserved</p>
                </div><!--  /.col-12 -->
            </div><!--  /.row -->
        </div><!--  /.container -->
    </footer><!--  /.site-footer -->

    <!-- All The JS Files
    ================================================== --> 
    <script src="{{asset('front')}}/assets/js/jquery.js"></script>
    <script src="{{asset('front')}}/assets/js/popper.min.js"></script>
    <script src="{{asset('front')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{asset('front')}}/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset('front')}}/assets/js/jquery.validate.min.js"></script>
    <script src="{{asset('front')}}/assets/js/jquery-validate.bootstrap-tooltip.min.js"></script>
    <script src="{{asset('front')}}/assets/js/owl.carousel.min.js"></script>
    <script src="{{asset('front')}}/assets/js/isotope.pkgd.min.js"></script>
    <script src="{{asset('front')}}/assets/js/jquery.fitvids.js"></script>
    <script src="{{asset('front')}}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('front')}}/assets/js/simple-scrollbar.min.js"></script>
    <script src="{{asset('front')}}/assets/js/scrolla.jquery.min.js"></script>
    <script src="{{asset('front')}}/assets/js/odometer.min.js"></script>
    <script src="{{asset('front')}}/assets/js/isInViewport.jquery.js"></script>
    <script src="{{asset('front')}}/assets/js/main.js"></script><!-- main-js -->
</body>
</html>