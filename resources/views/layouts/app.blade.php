<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Ibtikar">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons AND TOUCH ICONS   -->
    <link rel="apple-touch-icon" sizes="57x57" href="/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/images/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('/js/app.js') }}" defer></script>
    --}}

    <!-- Fonts used -->
    <link href="https://fonts.googleapis.com/css?family=Tajawal:500,700" rel="stylesheet">
    <link href="/font/stylesheet.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap used -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />

    <!-- Carsoul used -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.theme.default.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.carousel.min.css'>

    <link href="/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/style.css" rel="stylesheet" type="text/css" />
    @php
    if(app()->getLocale() == 'en'){
    echo '
    <link href="/css/style-en.css" rel="stylesheet" type="text/css" />';
    }
    @endphp
<style>
fieldset.calendly-box .row.fieldsetrow {
    overflow-y: auto;
}
.calendly-box .leftSide.lastSide {
    height: 100%;
}
fieldset.calendly-box input.previous.action-button {
    bottom: 30px !important;
    left: 20px !important;
}
.calendly-box .stepForm {
    z-index: 999;
    background: #fff;
    position: relative;
    margin-bottom: 90px;
}
</style>
</head>

<body class="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">
    <img src="/images/logo.svg" alt="loading..." class="loadingLogo" />
    <svg id="morph" width="100%" height="100%" viewbox="0 0 1920 900" preserveAspectRatio="none">
        <path width="100%" height="100%" class="morph" fill="#EDFBFB"
            d="M 0.5 0.5 L 0.5 954 C 213.722 954 426.944 954 640.167 954 C 853.389 954 1066.611 954 1279.833 954 C 1493.056 954 1706.278 954 1919.5 954 L 1919.5 -0.5 Z">
        </path>
    </svg>
    <div class="innerPage">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-dark customize-navbar squadNav dashboardNav">
                <a class="navbar-brand top-logo d-none d-sm-block" href="/"> <img src="/images/logo.svg"
                        alt="logo" /></a>
                <a class="navbar-brand top-logo d-block d-sm-none" href="/"> <img src="/images/logoIcon.svg"
                        alt="logo" /></a>
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="menuIcon" data-feather="menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarsExample05">
                    <ul class="navbar-nav ">
                        <li class="nav-item active">
                            <a class="nav-link" href="/squad/create">{{ __('app.mysquad') }} <span
                                    class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
                <div class="lang-menu">
                    @if (app()->getLocale() == 'en')
                        <a class="nav-link" href="{{ url('locale/ar') }}">عربي</a>
                    @else
                        <a class="nav-link" href="{{ url('locale/en') }}">English</a>
                    @endif
                </div>
                {{--  <div class="dropdown profileDropdown">
                    <a class="dropdown-toggle profileImg d-none d-md-block" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/images/default-profile.jpg"
                            alt="user" />
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="/profile">{{ __('app.my_profile') }}</a>
                        <a class="dropdown-item" href="/logout" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('app.sign_out') }}
                        </a>

                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>  --}}
            </nav>
        </div>
        <section class="p-section-small position-relative">
            <div class="iconsBg innerIconsBg">
                <svg width="1324px" height="346px" viewBox="0 0 1324 346" version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Artboard" transform="translate(-23.000000, -45.000000)" stroke-width="2">
                            <g id="icons" transform="translate(24.000000, 46.000000)">
                                <polygon id="triangle3" stroke="#78D0BA" stroke-linejoin="round"
                                    points="505 48 515.969072 12 543 37.4347826"></polygon>
                                <polygon id="triangle2" stroke="#78D0BA" stroke-linejoin="round"
                                    transform="translate(1175.000000, 114.500000) rotate(45.000000) translate(-1175.000000, -114.500000) "
                                    points="1163 126 1169.92784 103 1187 119.25"></polygon>
                                <path
                                    d="M4.69966551,0.894797961 C4.17413047,1.1579203 3.67966366,1.4739125 3.22323877,1.83580085 C1.25953622,3.39277354 0,5.79929654 0,8.5 C0,13.1944204 3.80557963,17 8.5,17 L8.5,17 C13.1944204,17 17,13.1944204 17,8.5 C17,3.80557963 13.1944204,0 8.5,0"
                                    id="circle2" stroke="#EA688A"></path>
                                <path
                                    d="M333.75,109.75 L325,98 L333.75,109.75 L342.5,98 L333.75,109.75 Z M333.75,109.75 L342.5,121.5 L333.75,109.75 L325,121.5 L333.75,109.75 Z"
                                    id="cross2" stroke="#F9DD9C" stroke-linecap="round"
                                    transform="translate(333.750000, 109.750000) rotate(-29.000000) translate(-333.750000, -109.750000) ">
                                </path>
                                <path
                                    d="M1204.75,329.75 L1196,318 L1204.75,329.75 L1213.5,318 L1204.75,329.75 Z M1204.75,329.75 L1213.5,341.5 L1204.75,329.75 L1196,341.5 L1204.75,329.75 Z"
                                    id="cross1" stroke="#F9DD9C" stroke-linecap="round"
                                    transform="translate(1204.750000, 329.750000) rotate(-29.000000) translate(-1204.750000, -329.750000) ">
                                </path>
                                <rect id="Rectangle1" stroke="#4DC8F2"
                                    transform="translate(131.045044, 198.967979) rotate(48.000000) translate(-131.045044, -198.967979) "
                                    x="122.545044" y="190.967979" width="17" height="16"></rect>
                                <rect id="Rectangle2" stroke="#F9DC98"
                                    transform="translate(872.186326, 41.428398) rotate(48.000000) translate(-872.186326, -41.428398) "
                                    x="854.686326" y="24.9283976" width="35" height="33"></rect>
                                <polygon id="triangle1" stroke="#78D0BA" stroke-linejoin="round"
                                    transform="translate(275.000000, 324.500000) rotate(27.000000) translate(-275.000000, -324.500000) "
                                    points="263 336 269.927835 313 287 329.25"></polygon>
                                <path
                                    d="M1303.18772,228.368515 C1302.38396,228.770937 1301.62772,229.254219 1300.92966,229.807695 C1297.92635,232.188948 1296,235.869512 1296,240 C1296,247.179702 1301.8203,253 1309,253 C1316.1797,253 1322,247.179702 1322,240 C1322,232.820298 1316.1797,227 1309,227"
                                    id="circle1" stroke="#EA688A"
                                    transform="translate(1309.000000, 240.000000) scale(1, -1) translate(-1309.000000, -240.000000) ">
                                </path>
                            </g>
                        </g>
                    </g>
                </svg>
            </div><!-- iconsBg end -->

            <!------------------ Page Content ---------------------->
            @yield('content')
            <!------------------ Page Content ---------------------->


            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h6 class="text-center mt-5">
                            {{ __('app.all_rights') }}
                            <a href="">{{ __('app.ibtkar_tec') }}</a>
                        </h6>
                    </div>
                </div>
            </div>
            <!--container end-->
        </section>
    </div><!-- introSection end -->

    <!-- Jquery JS-->
    <script src="/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/popper.min.js"></script>

    <script src="/js/feather.min.js"></script>
    <script src="/js/all.js"></script>
    <script src="/js/wow.min.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/owl.carousel.min.js'></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TimelineMax.min.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js'></script>

    <script src="/js/anime.min.js"></script>

    <script src="/js/script.js"></script>
    <!-- jQuery easing plugin -->
    <script src="/js/jquery.easing.min.js" type="text/javascript"></script>


    @yield('scripts')

</body>

</html>
