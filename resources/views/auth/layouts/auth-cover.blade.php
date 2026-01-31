<!DOCTYPE html>
<html lang="ar" dir="rtl" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="light" data-toggled="close">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- TITLE -->
    <title>@yield('title', 'إيواء')</title>

    <!-- FAVICON -->
    <link rel="icon" href="{{ asset('img/favicon.webp') }}" type="image/x-icon">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('build/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="{{ asset('build/assets/icon-fonts/icons.css') }}" rel="stylesheet">

    <!-- APP SCSS -->
    @vite(['resources/sass/app.scss'])

    <!-- NODE WAVES CSS -->
    <link href="{{ asset('build/assets/libs/node-waves/waves.min.css') }}" rel="stylesheet">

    <!-- SIMPLEBAR CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/libs/simplebar/simplebar.min.css') }}">

    <!-- COLOR PICKER CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

    <!-- CHOICES CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

    <!-- SWIPER CSS -->
    <link rel="stylesheet" href="{{ asset('build/assets/libs/swiper/swiper-bundle.min.css') }}">

    <!-- IZITOAST CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">

    @yield('styles')
</head>

<body style="background-color: #fbfbfa">

    <div class="row authentication mx-0">
        <div class="col-xxl-7 col-xl-7 col-lg-12">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-7 col-sm-8 col-12">
                    <div class="p-1">
                        <div class="mb-3">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('img/logo.png') }}" style="height: 90px;" alt="EIWAA"
                                    class="authentication-brand desktop-logo">
                                <img src="{{ asset('img/logo.png') }}" style="height: 90px;" alt="EIWAA"
                                    class="authentication-brand desktop-dark">
                            </a>
                        </div>

                        @yield('content')

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-5 col-xl-5 col-lg-5 d-xl-block d-none px-0">
            <div class="authentication-cover">
                <div class="aunthentication-cover-content rounded">
                    <div class="swiper keyboard-control">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div
                                    class="text-fixed-white text-center p-5 d-flex align-items-center justify-content-center">
                                    <div>
                                        <div class="mb-5">
                                            <img src="{{ asset('img/login2.png') }}" class="authentication-image"
                                                alt="">
                                        </div>
                                        <h6 class="fw-semibold text-fixed-white">نظام إدارة متكامل</h6>
                                        <p class="fw-normal fs-14 op-7">إدارة احترافية للعقارات والشقق المفروشة مع
                                            أدوات متقدمة لتسهيل عملك اليومي وتحسين الكفاءة التشغيلية</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="text-fixed-white text-center p-5 d-flex align-items-center justify-content-center">
                                    <div>
                                        <div class="mb-5">
                                            <img src="{{ asset('img/login3.png') }}" class="authentication-image"
                                                alt="">
                                        </div>
                                        <h6 class="fw-semibold text-fixed-white">إدارة الحجوزات والعقود</h6>
                                        <p class="fw-normal fs-14 op-7">نظام حجوزات ذكي مع تقويم تفاعلي وإدارة كاملة
                                            للعقود والمستأجرين بكل سهولة ويسر</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div
                                    class="text-fixed-white text-center p-5 d-flex align-items-center justify-content-center">
                                    <div>
                                        <div class="mb-5">
                                            <img src="{{ asset('img/login2.png') }}" class="authentication-image"
                                                alt="">
                                        </div>
                                        <h6 class="fw-semibold text-fixed-white">تقارير شاملة ومفصلة</h6>
                                        <p class="fw-normal fs-14 op-7">تقارير مالية وإحصائية تفصيلية تساعدك على اتخاذ
                                            القرارات الصحيحة وتحسين الأداء</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SCROLL-TO-TOP -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>

    <!-- MAIN JS -->
    <script src="{{ asset('build/assets/main.js') }}"></script>

    <!-- POPPER JS -->
    <script src="{{ asset('build/assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('build/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- NODE WAVES JS -->
    <script src="{{ asset('build/assets/libs/node-waves/waves.min.js') }}"></script>

    <!-- SIMPLEBAR JS -->
    <script src="{{ asset('build/assets/libs/simplebar/simplebar.min.js') }}"></script>
    @vite('resources/assets/js/simplebar.js')

    <!-- COLOR PICKER JS -->
    <script src="{{ asset('build/assets/libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

    <!-- CHOICES JS -->
    <script src="{{ asset('build/assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- SWIPER JS -->
    <script src="{{ asset('build/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('build/assets/show-password.js') }}"></script>

    <!-- STICKY JS -->
    <script src="{{ asset('build/assets/sticky.js') }}"></script>

    <!-- APP JS -->
    @vite('resources/js/app.js')

    <!-- CUSTOM-SWITCHER JS -->
    @vite('resources/assets/js/custom-switcher.js')

    <!-- SWIPER INITIALIZATION -->
    @vite('resources/assets/js/authentication.js')

    <!-- IZITOAST JS -->
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>

    @yield('scripts')
</body>

</html>
