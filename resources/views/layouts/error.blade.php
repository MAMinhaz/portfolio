
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>@yield('title_header')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('dash') }}/assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('dash') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dash') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dash') }}/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dash') }}/assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="bg-accpunt-pages">

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">

                        <div class="wrapper-page">
                            <div class="account-pages">
                                <div class="account-box">

                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="index.html" class="text-success">
                                                <span><img src="{{ asset('dash') }}/assets/images/logo_dark.png" alt="" height="30"></span>
                                            </a>
                                        </h2>
                                    </div>

                                    <div class="account-content">
                                        <h1 class="text-error">@yield('code')</h1>
                                        <h2 class="text-danger m-t-30">
                                            @yield('title')
                                        </h2>
                                        <p class="text-muted m-t-30">@yield('message')
                                            <br>
                                            <a href="#" class="text-primary">
                                                <b>Support</b>
                                            </a>
                                        </p>

                                        <a class="btn btn-md btn-block btn-primary waves-effect waves-light m-t-20" href="{{ route('home') }}"> Return Dashboard</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- END HOME -->




        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('dash') }}/assets/js/jquery.min.js"></script>
        <script src="{{ asset('dash') }}/assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="{{ asset('dash') }}/assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('dash') }}/assets/js/metisMenu.min.js"></script>
        <script src="{{ asset('dash') }}/assets/js/waves.js"></script>
        <script src="{{ asset('dash') }}/assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="{{ asset('dash') }}/assets/js/jquery.core.js"></script>
        <script src="{{ asset('dash') }}/assets/js/jquery.app.js"></script>

    </body>
</html>