<!DOCTYPE html>
<html lang="ar" dir="rtl" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="light" data-toggled="close">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Laravel Bootstrap Responsive Admin Web Dashboard Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="dashboard bootstrap, laravel template, admin panel in laravel, php admin panel, admin panel for laravel, admin template bootstrap 5, laravel admin panel, admin dashboard template, hrm dashboard, vite laravel, admin dashboard, ecommerce admin dashboard, dashboard laravel, analytics dashboard, template dashboard, admin panel template, bootstrap admin panel template">

    <!-- TITLE -->
    <title> {{ config('app.name') }} -الادارة </title>

    <style>
        .logo-icon {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.25rem;
        }

        .logo-text-primary {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #002349 0%, #003d7a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
        }

        .logo-text-secondary {
            font-size: 0.75rem;
            font-weight: 600;
            color: #d49f38;
            letter-spacing: 2px;
            line-height: 1;
        }
    </style>

    <!-- FAVICON -->
    <link rel="icon" href="{{ asset('img/favicon.webp') }}" type="image/x-icon">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('build/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="{{ asset('build/assets/icon-fonts/icons.css') }}" rel="stylesheet">

    <!-- APP SCSS -->
    @vite(['resources/sass/app.scss'])


    @include('admin.layouts.components.styles')

    <!-- MAIN JS -->
    <script src="{{ asset('build/assets/main.js') }}"></script>

    @yield('styles')

</head>

<body>

    <!-- SWITCHER -->

    @include('admin.layouts.components.switcher')

    <!-- END SWITCHER -->

    <!-- LOADER -->
    <div id="loader">
        <img src="{{ asset('build/assets/images/media/loader.svg') }}" alt="">
    </div>
    <!-- END LOADER -->

    <!-- PAGE -->
    <div class="page">

        <!-- HEADER -->

        @include('admin.layouts.components.header')

        <!-- END HEADER -->

        <!-- SIDEBAR -->

        @include('admin.layouts.components.sidebar')

        <!-- END SIDEBAR -->

        <!-- MAIN-CONTENT -->

        <div class="main-content app-content">

            <!-- Flash Messages -->
            <div class="container-fluid">
                @include('admin.layouts.components.flash-messages')
            </div>

            @yield('content')

        </div>
        <!-- END MAIN-CONTENT -->

        <!-- SEARCH-MODAL -->

        @include('admin.layouts.components.search-modal')

        <!-- END SEARCH-MODAL -->

        <!-- FOOTER -->

        @include('admin.layouts.components.footer')

        <!-- END FOOTER -->

    </div>
    <!-- END PAGE-->

    <!-- SCRIPTS -->

    @include('admin.layouts.components.scripts')

    @yield('scripts')

    <!-- STICKY JS -->
    <script src="{{ asset('build/assets/sticky.js') }}"></script>

    <!-- APP JS -->
    @vite('resources/js/app.js')


    <!-- CUSTOM-SWITCHER JS -->
    @vite('resources/assets/js/custom-switcher.js')


    <!-- END SCRIPTS -->

</body>

</html>
