            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="{{ route('portfolio') }}"><i class="fi-air-play"></i>Portfolio</a>
                            </li>

                            <li class="has-submenu">
                                <a href="{{ route('home') }}"><i class="fi-content-right"></i>Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="fi-paper-stack"></i>Portfolio Contents</a>
                                {{-- <a href="#"><i class="fi-layout"></i>Site Setting</a> --}}
                                <ul class="submenu">
                                    <li>
                                        <a href="{{ url('/portfolio/services') }}">Service Block</a>
                                    </li>

                                    <li class="has-submenu">
                                        <a href="{{ route('aboutme') }}">About Me Block</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('aboutme') }}#about_me_des">About Me Description</a></li>
                                            <li><a href="{{ route('aboutme') }}#about_me_skill">About Me Skills</a></li>
                                            <li><a href="{{ route('aboutme') }}#about_me_ms">About Me Milestontes</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-submenu">
                                        <a href="{{ route('portfolio_index') }}">Portfolio Block</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('portfolio_index') }}#porfolio_category">Portfolio Category</a></li>
                                            <li><a href="{{ route('portfolio_index') }}#portfolio_details">Portfolios Details</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-submenu">
                                        <a href="{{ route('testimonial_index') }}">Testmonial Block</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('testimonial_index') }}#testimonials">Testimonials</a></li>
                                            <li><a href="{{ route('testimonial_index') }}#company">Companies</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-submenu">
                                        <a href="{{ route('blog_index') }}">News Feed Block</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('blog_index') }}">Blog Posts</a></li>
                                            <li><a href="{{ route('blog_cats_index') }}">Blog Post Categories</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="{{ route('contact_index') }}">Get In Touch Block</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="fi-cog"></i>Site Setting</a>
                                {{-- <a href="#"><i class="fi-layout"></i>Site Setting</a> --}}
                                <ul class="submenu">

                                    <li>
                                        <a href="{{ route('admin_index') }}">Portfoilio Admin</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('landview') }}">Portfoilio Hero Info</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('front_customize_index') }}">Customize Your Site</a>
                                    </li>

                                    <li class="has-submenu">
                                        <a href="{{ route('f_contactinfo_index') }}">Your Contact Information's</a>
                                        <ul class="submenu">
                                            <a href="{{ route('f_contactinfo_index') }}#main_contact_information">Customize Contact Informations</a>
                                            <a href="{{ route('f_contactinfo_index') }}#social_links">Customize Social Links</a>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="{{ route('custom_logout') }}"><i class="fi-power"></i>Log Out</a>
                            </li>
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
