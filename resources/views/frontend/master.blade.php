<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('frontend/vendor/font-awesome/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendor/swiper/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendor/splide/splide.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendor/slim-select/slimselect.css') }}" />
    <link href="https://fonts.maateen.me/charukola-ultra-light/font.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">

    <title>@yield('title')</title>

    @if (isset(generalSettings()->favicon))
        <link rel="icon" href="{{ asset('storage/' . generalSettings()->favicon) }}" type="image/x-icon">
    @else
        <link rel="icon" href="{{ asset('images/demo_logo.png') }}" type="image/x-icon">
    @endif

    <!-- tailwind css -->
    <link href="{{ asset('frontend/css/output.css') }}" rel="stylesheet" />

    <!-- custom css -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />

    <style>
        * {
            font-family: 'SolaimanLipi', sans-serif;
        }
    </style>
    @stack('styles')
</head>

<body>
    @php
        $setting = generalSettings();
    @endphp
    <!-- overlay -->
    <div class="et-overlay group">
        <div
            class="opacity-0 pointer-events-none group-[.active]:opacity-100 group-[.active]:pointer-events-auto transition ease-linear duration-300  bg-etBlack/80 fixed inset-0 z-[60]">
        </div>
    </div>
    <!-- overlay -->

    <!-- sidebar -->
    <div class="et-sidebar group">
        <div
            class=" group-[.active]:translate-x-0 translate-x-[100%] transition-transform ease-linear duration-300 fixed right-0 w-full max-w-[25%] xl:max-w-[30%] lg:max-w-[40%] md:max-w-[50%] sm:max-w-[60%] xxs:max-w-full bg-[#18377e] h-full z-[100] overflow-auto p-[50px] lg:p-[30px] space-y-[40px]">
            <!-- heading -->
            <div class="et-sidebar-heading">
                <div class="logo flex justify-between items-center">
                    <a href="{{ route('home') }}">
                        @if (isset($setting->logo))
                            <img src="{{ asset('storage/' . $setting->logo) }}" alt="logo"
                                style="max-height: 60px;">
                        @else
                            <img src="{{ asset('frontend/img/logo-white.png') }}" alt="logo">
                        @endif
                    </a>

                    <button type="button"
                        class="et-sidebar-close-btn border border-white/50 w-[45px] aspect-square shrink-0 text-white text-[22px] rounded-full hover:text-etBlue hover:bg-white"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <!-- mobile menu -->
            <div class="et-header-nav-in-mobile"></div>
        </div>
    </div>

    @include('frontend.section.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.section.footer')

    <!-- JS FILES -->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/splide/splide.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/slim-select/slimselect.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/fslightbox/fslightbox.js') }}"></script>
    <script src="{{ asset('frontend/vendor/splide/splide-extension-auto-scroll.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/lenis/lenis.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/splittype/index.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/gsap/gsap.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/gsap/gsap-scroll-trigger.min.js') }}"></script>


    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/countdown.js') }}"></script>
    @stack('scripts')
</body>

</html>
