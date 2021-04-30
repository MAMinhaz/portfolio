            <div class="topbar-main">
                <div class="container">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <a href="index.html" class="logo">
                        <!--Adminox-->
                        </a>
                        <!-- Image Logo -->
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{ asset('uploads/portfolio_logo') }}/{{ logo() }}" alt="" height="30" class="logo-lg">
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="list-inline float-right mb-0">

                            <li class="menu-item list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="{{asset('dash')}}/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="text-overflow"><small>Welcome ! {{ Auth::user()->name }}</small> </h5>
                                    </div>

                                    <!-- item-->
                                    <a href="{{ route('landview') }}" class="dropdown-item notify-item">
                                        <i class="zmdi zmdi-account-circle"></i> <span>Hero's Info</span>
                                    </a>

                                    <!-- item-->
                                    <a href="{{ route('front_customize_index') }}" class="dropdown-item notify-item">
                                        <i class="zmdi zmdi-settings"></i> <span>Portfolio Site Settings</span>
                                    </a>

                                    <!-- item-->
                                        <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="zmdi zmdi-power"></i> <span>Logout</span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>

                                </div>
                            </li>

                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->
