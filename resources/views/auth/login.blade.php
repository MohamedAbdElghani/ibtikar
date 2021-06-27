<?php
if (isset($_GET['lang']) && $_GET['lang'] == 'ar' && Lang::locale() == 'ar') {
    header("Location: https://squad.ibtikar.net.sa/login");
    die();
    // echo '<script>window.location.href = "https://squad.ibtikar.net.sa/login";</script>';
} elseif (isset($_GET['lang']) && $_GET['lang'] == 'en' && Lang::locale() == 'en') {
    header("Location: https://squad.ibtikar.net.sa/login");
    die();
    // echo '<script>window.location.href = "https://squad.ibtikar.net.sa/login";</script>';
} elseif (isset($_GET['lang']) && $_GET['lang'] == 'en' && Lang::locale() != 'en') {
    // header("Location: https://squad.ibtikar.net.sa/locale/en");
    // die();
    echo '<script>window.location.href = "https://squad.ibtikar.net.sa/locale/en";</script>';
} elseif (isset($_GET['lang']) && $_GET['lang'] == 'ar' && Lang::locale() != 'ar') {
    // header("Location: https://squad.ibtikar.net.sa/locale/ar");
    // die();
    echo '<script>window.location.href = "https://squad.ibtikar.net.sa/locale/ar";</script>';
}
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Ibtikar</title>
    <meta charset="UTF-8">
    <meta name="description" content="Ibtikar">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Favicons AND TOUCH ICONS   -->
    <link rel="apple-touch-icon" sizes="57x57" href="images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicons/favicon-16x16.png">
    <link rel="manifest" href="images/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">



    <!-- Fonts used -->
    <link href="https://fonts.googleapis.com/css?family=Tajawal:500,700" rel="stylesheet">
    <link href="font/stylesheet.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap used -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />

    <!-- Carsoul used -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.theme.default.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.carousel.min.css'>

    <link href="css/all.min.css" rel="stylesheet" type="text/css" />


    <link href="css/style.css" rel="stylesheet" type="text/css" />

</head>


<body class="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">


    <img src="images/logo.svg" alt="loading..." class="loadingLogo" />
    <svg id="morph" width="100%" height="100%" viewbox="0 0 1920 900" preserveAspectRatio="none">
        <path width="100%" height="100%" class="morph" fill="#EDFBFB" d="M 0.5 0.5 L 0.5 954 C 213.722 954 426.944 954 640.167 954 C 853.389 954 1066.611 954 1279.833 954 C 1493.056 954 1706.278 954 1919.5 954 L 1919.5 -0.5 Z"></path>
    </svg>



    <div class="innerSquadPage">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark customize-navbar">
                <a class="navbar-brand top-logo d-none d-sm-block" href="#"> <img src="images/logo.svg" alt="logo" /></a>
                <a class="navbar-brand top-logo d-block d-sm-none" href="#"> <img src="images/logoIcon.svg" alt="logo" /></a>

            </nav>

        </div>


        <section class="p-section-small position-relative">

            <div class="iconsBg">

                <svg width="1324px" height="346px" viewBox="0 0 1324 346" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Artboard" transform="translate(-23.000000, -45.000000)" stroke-width="2">
                            <g id="icons" transform="translate(24.000000, 46.000000)">
                                <polygon id="triangle3" stroke="#78D0BA" stroke-linejoin="round" points="505 48 515.969072 12 543 37.4347826"></polygon>
                                <polygon id="triangle2" stroke="#78D0BA" stroke-linejoin="round" transform="translate(1175.000000, 114.500000) rotate(45.000000) translate(-1175.000000, -114.500000) "
                                    points="1163 126 1169.92784 103 1187 119.25"></polygon>
                                <path d="M4.69966551,0.894797961 C4.17413047,1.1579203 3.67966366,1.4739125 3.22323877,1.83580085 C1.25953622,3.39277354 0,5.79929654 0,8.5 C0,13.1944204 3.80557963,17 8.5,17 L8.5,17 C13.1944204,17 17,13.1944204 17,8.5 C17,3.80557963 13.1944204,0 8.5,0"
                                    id="circle2" stroke="#EA688A"></path>
                                <path d="M333.75,109.75 L325,98 L333.75,109.75 L342.5,98 L333.75,109.75 Z M333.75,109.75 L342.5,121.5 L333.75,109.75 L325,121.5 L333.75,109.75 Z"
                                    id="cross2" stroke="#F9DD9C" stroke-linecap="round" transform="translate(333.750000, 109.750000) rotate(-29.000000) translate(-333.750000, -109.750000) "></path>
                                <path d="M1204.75,329.75 L1196,318 L1204.75,329.75 L1213.5,318 L1204.75,329.75 Z M1204.75,329.75 L1213.5,341.5 L1204.75,329.75 L1196,341.5 L1204.75,329.75 Z"
                                    id="cross1" stroke="#F9DD9C" stroke-linecap="round" transform="translate(1204.750000, 329.750000) rotate(-29.000000) translate(-1204.750000, -329.750000) "></path>
                                <rect id="Rectangle1" stroke="#4DC8F2" transform="translate(131.045044, 198.967979) rotate(48.000000) translate(-131.045044, -198.967979) "
                                    x="122.545044" y="190.967979" width="17" height="16"></rect>
                                <rect id="Rectangle2" stroke="#F9DC98" transform="translate(872.186326, 41.428398) rotate(48.000000) translate(-872.186326, -41.428398) "
                                    x="854.686326" y="24.9283976" width="35" height="33"></rect>
                                <polygon id="triangle1" stroke="#78D0BA" stroke-linejoin="round" transform="translate(275.000000, 324.500000) rotate(27.000000) translate(-275.000000, -324.500000) "
                                    points="263 336 269.927835 313 287 329.25"></polygon>
                                <path d="M1303.18772,228.368515 C1302.38396,228.770937 1301.62772,229.254219 1300.92966,229.807695 C1297.92635,232.188948 1296,235.869512 1296,240 C1296,247.179702 1301.8203,253 1309,253 C1316.1797,253 1322,247.179702 1322,240 C1322,232.820298 1316.1797,227 1309,227"
                                    id="circle1" stroke="#EA688A" transform="translate(1309.000000, 240.000000) scale(1, -1) translate(-1309.000000, -240.000000) "></path>
                            </g>
                        </g>
                    </g>
                </svg>

            </div><!-- iconsBg end -->



            <div class="container">

                <div class="row align-items-center">


                        <div class="col-md-7 offset-md-1 order-md-2 text-center">
                                <img src="images/team.svg" class="img-fluid teamImg" alt="" />
                            </div>

                    <div class="col-md-4  order-md-1">
                        <h2 class="largeFont bold  wow fadeInUp animated h2" data-wow-delay="0s">
                            {{ __('login.build_your_squad') }}
                        </h2>

                        <h4 class="wow fadeInUp animated" data-wow-delay="0.2s">
                            {{ __('login.top_notch') }}

                        </h4>

                        <h5 class="mt-5">
                            {{ __('login.sign_in') }}
                        </h5>

                        <ul class="loginBtns">
                          <li class=" text-center">
                            <a class="twitterBtn justify-content-center" href="{{ route('squad.create') }}">
                                <span>{{ __('login.start_now') }}</span>
                            </a>
                        </li>
                            {{-- <li>
                                <a class="twitterBtn" href="{{ url('/auth/redirect/twitter') }}">
                                    <i>
                                        <img src="images/squad/twitterLogin.svg" alt="google" />
                                    </i>
                                    <span>{{ __('login.twitter') }}</span>
                                </a>
                            </li>

                            <li>
                                <a class="googleBtn" href="{{ url('auth/google') }}">
                                    <i>
                                        <img src="images/squad/googleLogin.svg" alt="google" />
                                    </i>
                                    <span>{{ __('login.google') }}</span>
                                </a>
                            </li> --}}

                        </ul>

                    </div>

                </div><!-- row end-->

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



</body>



<!-- Jquery JS-->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>

<script src="js/feather.min.js"></script>
<script src="js/all.js"></script>
<script src="js/wow.min.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/owl.carousel.min.js'></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TimelineMax.min.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js'></script>

<script src="js/anime.min.js"></script>

<script src="js/script.js"></script>


</html>