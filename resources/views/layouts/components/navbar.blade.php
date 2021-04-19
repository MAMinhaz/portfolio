            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="{{ route('portfolio') }}"><i class="fi-air-play"></i>Portfolio</a>
                            </li>

                            <li class="has-submenu">
                                <a href="{{ route('home') }}"><i class="fi-air-play"></i>Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="fi-box"></i>Portfolio Contents</a>
                                <ul class="submenu">
                                    <li>
                                        <a href="{{ route('landview') }}">Landing Hero Block</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('service') }}">Service Block</a>
                                    </li>

                                    <li class="has-submenu">
                                        <a href="{{ route('aboutme') }}">About Me Block</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('aboutme') }}">About Me Description</a></li>
                                            <li><a href="{{ route('aboutme') }}">About Me Skills</a></li>
                                            <li><a href="{{ route('aboutme') }}">About Me Milestontes</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-submenu">
                                        <a href="{{ route('portfolio_index') }}">Portfolio Block</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('portfolio_index') }}">About Me Description</a></li>
                                            <li><a href="{{ route('portfolio_index') }}">About Me Skills</a></li>
                                            <li><a href="{{ route('portfolio_index') }}">About Me Milestontes</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-submenu">
                                        <a href="{{ route('testimonial_index') }}">Testmonial Block</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('testimonial_index') }}">Testimonials</a></li>
                                            <li><a href="{{ route('testimonial_index') }}">Companies</a></li>
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
                                <a href="#"><i class="fi-box"></i>Customize Frontend</a>
                                <ul class="submenu">

                                    <li>
                                        <a href="{{ route('front_customize_index') }}">Customize Frontend</a>
                                    </li>

                                    <li class="has-submenu">
                                        <a href="#">Customize Your Contact Information</a>
                                        <ul class="submenu">
                                            <a href="{{ route('f_contactinfo_index') }}">Customize Your Contact Information</a>
                                            <a href="{{ route('f_contactinfo_index') }}">Customize Your Social Links</a>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
