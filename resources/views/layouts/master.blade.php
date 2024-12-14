<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="description"
        content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google." />
    <meta name="keywords"
        content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard" />
    <meta name="author" content="ThemeSelect" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" href="{{asset('dist/')}}/assets/images/favicon/apple-touch-icon-152x152.png" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dist/')}}/assets/images/favicon/favicon-32x32.png" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dist/')}}/assets/vendors/vendors.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('dist/')}}/assets/vendors/animate-css/animate.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('dist/')}}/assets/vendors/chartist-js/chartist.min.css" />
    <link rel="stylesheet" type="text/css"
        href="{{asset('dist/')}}/assets/vendors/chartist-js/chartist-plugin-tooltip.css" />
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{asset('dist/')}}/assets/css/themes/vertical-modern-menu-template/materialize.css" />
    <link rel="stylesheet" type="text/css"
        href="{{asset('dist/')}}/assets/css/themes/vertical-modern-menu-template/style.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('dist/')}}/assets/css/pages/dashboard-modern.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('dist/')}}/assets/css/pages/intro.css" />
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dist/')}}/assets/css/custom/custom.css" />
    <!-- END: Custom CSS-->
    {{-- Data Tables CSS --}}
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dist/') }}/assets/vendors/data-tables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dist/') }}/assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dist/') }}/assets/vendors/data-tables/css/select.dataTables.min.css">
    @stack('css')
    @livewireStyles

    {{-- Alpine js --}}
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<!-- END: Head-->

<body
    class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns"
    data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">
    <!-- BEGIN: Header-->

    <livewire:layout.navigation />
    {{--
    <x-top-bar /> --}}

    <x-navigation-menu />
    <!-- END: SideNav-->

    <x-notification />

    <div id="main">
        <div class="row">
            <div class="content-wrapper-before"
                style="--angle: 45deg; background: linear-gradient(var(--angle), oklab(25.2% 0 0), oklab(38.7% 0 0), oklab(51% 0 0))">
            </div>
            <div class="col s12">
                <div class="container">
                    {{ $slot }}
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>

    <footer class="page-footer footer footer-static footer-dark ggradient-shadow navbar-border navbar-shadow" style="
        background: linear-gradient(107.2deg, rgb(150, 15, 15) 10.6%, rgb(247, 0, 0) 91.1%);
        ">
        <div class="footer-copyright">
            <div class="container">
                <span>&copy; 2024
                    <a href="#" target="_blank">Analysis</a>
                    All rights reserved.</span>
            </div>
        </div>
    </footer>

    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('dist/')}}/assets/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('dist/')}}/assets/vendors/chartjs/chart.min.js"></script>
    <script src="{{asset('dist/')}}/assets/vendors/chartist-js/chartist.min.js"></script>
    <script src="{{asset('dist/')}}/assets/vendors/chartist-js/chartist-plugin-tooltip.js"></script>
    <script src="{{asset('dist/')}}/assets/vendors/chartist-js/chartist-plugin-fill-donut.min.js">
    </script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{asset('dist/')}}/assets/js/plugins.js"></script>
    <script src="{{asset('dist/')}}/assets/js/search.js"></script>
    <script src="{{asset('dist/')}}/assets/js/custom/custom-script.js"></script>
    <script src="{{asset('dist/')}}/assets/js/scripts/customizer.js"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    {{-- <script src="{{asset('dist/')}}/assets/js/scripts/dashboard-modern.js"></script> --}}
    {{-- <script src="{{asset('dist/')}}/assets/js/scripts/intro.js"></script> --}}
    <!-- END PAGE LEVEL JS-->

    {{-- Data Tables --}}
    <script src="{{ asset('dist/') }}/assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('dist/') }}/assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js">
    </script>
    <script src="{{ asset('dist/') }}/assets/vendors/data-tables/js/dataTables.select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    @stack('jsLibrary')
    @stack('js')
    @livewireScripts
</body>

</html>