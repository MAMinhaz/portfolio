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
    <title>@yield('portfolio_title')</title>

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ asset('uploads/portfolio_logo') }}/{{ logo() }}">

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
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div><!-- /preloader-icon -->
        </div><!-- /preloader-inner -->
    </div><!-- /preloader -->

    <!-- Header
    ================================================== --> 
    <header class="site-header sticky-header">
        <div class="container-fluid pd-0">
            <div class="row no-gutters">
                <div class="col-xl-7">
                    <div class="header-left-block">  
                        <!-- Site Branding -->
                        <div class="site-branding">
                            <a href="{{ route('portfolio') }}"><img src="{{ asset('uploads/portfolio_logo') }}/{{ logo() }}" alt="Site Logo" /></a>
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
                </div><!--  /.col-xl-7 -->

                <div class="col-xl-5">
                    <div class="header-right-block bg-white">
                        <div class="mail-block">
                            @isset($contact_infos_topbar)
                                <a href="mailto:{{ $contact_infos_topbar->email }}"><i class="fas fa-envelope"></i><span>{{ $contact_infos_topbar->email }}</span></a>
                            @endisset
                        </div><!--  /.mail-block -->
                        <div class="call-block">
                            @isset($contact_infos_topbar)
                                <a href="tel:{{ $contact_infos_topbar->cell_number }}"><i class="fas fa-phone"></i><span>{{ $contact_infos_topbar->cell_number }}</span></a>
                            @endisset
                        </div><!--  /.call-block -->
                        <div class="social-block">
                            <ul>
                                @isset($social_links_topbar)
                                    @forelse($social_links_topbar as $social_links_top)
                                        <li><a href="{{ $social_links_top->link }}">{{ $social_links_top->link_name }}</a></li>
                                        @empty
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    @endforelse
                                @endisset
                            </ul>
                        </div><!--  /.social-block -->
                    </div><!--  /.header-right-block -->
                </div><!--  /.col-lg-5 -->
            </div><!--  /.row -->
        </div><!--  /.container-fluid -->
    </header><!-- /.site-header -->

    @yield('portfolio_content')

    <!-- Footer
    ================================================== -->
    <footer class="site-footer pd-t-75 pd-b-75">
        <div class="container text-center">
            <!-- Scroll Top -->
            <div class="row">
                <div class="col-12">
                    <a href="#top" class="back-to-top">
                        <span class="text">Back <br>To Top</span>
                        <i class="fas fa-angle-up"></i>
                    </a>
                </div><!--  /.col-12 -->
            </div><!--  /.row -->

            <!-- Social Link -->
            <div class="row">
                <div class="col-12">
                    <ul class="footer-social mrt-30 mrb-30">
                        @forelse($social_links as $social_link)
                            <li><a href="{{ $social_link->link }}">{{ $social_link->link_name }}</a></li>
                            @empty
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        @endforelse
                    </ul><!--  /.footer-social -->
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