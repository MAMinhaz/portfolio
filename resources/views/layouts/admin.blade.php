<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Codewriter portfolio admin panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{asset('dash')}}/assets/images/favicon.ico">

        @include('layouts.components.h_styles')

    </head>


    <body>


        <!-- Navigation Bar-->
        <header id="topnav">
            @include('layouts.components.topbar')

            @include('layouts.components.navbar')
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">


                @yield('admin_content')

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        2017 © Adminox - Coderthemes.com
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->

        @include('layouts.components.f_styles')

        @yield('scripts')
    </body>
</html>