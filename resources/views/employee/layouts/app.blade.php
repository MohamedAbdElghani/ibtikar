<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Ibtikar">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons AND TOUCH ICONS   -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{url('/')}}/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{url('/')}}/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{url('/')}}/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('/')}}/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{url('/')}}/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{url('/')}}/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{url('/')}}/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{url('/')}}/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('/')}}/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{{url('/')}}/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('/')}}/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{url('/')}}/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/')}}/images/favicons/favicon-16x16.png">
    {{-- <link rel="manifest" href="{{url('/')}}/images/favicons/manifest.json"> --}}
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{url('/')}}/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ibtikar') }}</title>

    <!-- Fonts used -->
    <link href="https://fonts.googleapis.com/css?family=Tajawal:500,700" rel="stylesheet">
    <link href="{{url('/')}}/font/stylesheet.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap used -->
    <link href="{{url('/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/css/all.min.css" rel="stylesheet" type="text/css" />

    {{-- icons --}}
    <link href="{{url('/')}}/employee/font-css/LinIconsPro-Light.css" rel="stylesheet">
    <link href="{{url('/')}}/employee/font-css/LineIcons.css" rel="stylesheet">

    <link href="{{url('/')}}/employee/css/style.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/employee/css/style-en.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/employee/css/custom-styles.css" rel="stylesheet" type="text/css" />
<style>
.profileImg img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
body .dropzone .dz-preview .dz-error-message {top: -90px;}
.dropzone .dz-preview .dz-progress .dz-upload {
    background: #45C7F4 !important;
}
body .dropzone .dz-preview .dz-error-message:after {
    top: 100%;
    border-bottom: 0;
    border-top: 6px solid #be2626;
}
#other_role:checked + label:after {
    top: 16px;
}
button.blockedEdit {
    opacity: .4;
    pointer-events: none;
}
</style>
@yield('styles')

</head>

<body class="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">

  @if(auth()->user() && !auth()->user()->hasVerifiedEmail())
  <div class="alert alert-warning mb-0" role="alert">
    <div class="text-center">
      Verify Your Email Address. please check your email for a verification link. If you did not receive the email, 
      <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
      </form>.
    </div>
  </div>
  @endif

  {{--  @if(!request()->is('talent/resume*') && !request()->is('talent/profile/compelete*'))  --}}
  @if(request()->is('talent'))
  <img src="{{url('/')}}/images/logo.svg" alt="loading..." class="loadingLogo" />
  <svg id="morph" width="100%" height="100%" viewbox="0 0 1920 900" preserveAspectRatio="none">
      <path width="100%" height="100%" class="morph" fill="#EDFBFB" d="M 0.5 0.5 L 0.5 954 C 213.722 954 426.944 954 640.167 954 C 853.389 954 1066.611 954 1279.833 954 C 1493.056 954 1706.278 954 1919.5 954 L 1919.5 -0.5 Z"></path>
  </svg>
  @endif

  <div class="innerSquadPage login-container-flex">
    <div class="container" style="z-index: 99;">
        <nav class="navbar navbar-expand-lg navbar-dark customize-navbar">
          <a class="navbar-brand top-logo d-none d-sm-block" href="{{route('employee.dashboard')}}"> <img src="{{url('/')}}/images/logo.svg" alt="logo" /></a>
          <a class="navbar-brand top-logo d-block d-sm-none" href="{{route('employee.dashboard')}}">
            <img src="{{url('/')}}/images/logoIcon.svg" alt="logo" />
          </a>

          @if(auth()->user())
             <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarsExample05"
                aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="menuIcon" data-feather="menu"></span>
            </button> 

            <div class="collapse navbar-collapse justify-content-center" id="navbarsExample05">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        @if(auth()->user()->CandidateResume &&  auth()->user()->CandidateResume->cv_file)
                            <a class="nav-link" href="{{route('employee_resume.build.previewResume')}}">Profile</a>
                        @else
                            <a class="nav-link" href="{{route('employee_profile.compelete')}}">Profile</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('employee_profile.logincredintials')}}">Settings </a>
                    </li>
                    <li class="nav-item d-md-none">
                    <a class="dropdown-item" href="{{route('employee_profile.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                      {{ __('app.sign_out') }}
                    </a>
                    <form id="logout-form" action="{{route('employee_profile.logout')}}" method="POST" style="display: none;">
                      @csrf
                    </form>
                    </li>
                    <li class="nav-item" <?php echo auth()->user()->id; ?>>
                        <a class="nav-link" href="{{route('employee.invite.show')}}"> Invite </a>
                    </li>
                    
                    {{--  <li class="nav-item d-xs-block  d-md-none">
                        <a class="nav-link" href="#"> Profile </a>
                    </li>

                    <li class="nav-item d-xs-block  d-md-none">
                        <a class="nav-link" href="#">Sign Out</a>
                    </li>  --}}
                </ul>
            </div>




            <div class="dropdown profileDropdown">
                <a class="dropdown-toggle profileImg d-none d-md-block" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ auth()->user()->feature_image ? url('/').'/storage/'.auth()->user()->feature_image : url('/').'/images/user-big.png' }}" alt="user" />
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('employee_profile.logincredintials')}}">Log In Credentials</a>
                    <a class="dropdown-item" href="{{route('employee_profile.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                      {{ __('app.sign_out') }}
                    </a>
                    <form id="logout-form" action="{{route('employee_profile.logout')}}" method="POST" style="display: none;">
                      @csrf
                    </form>
                </div>
            </div>

          @endif
        </nav>
    </div>

    <section class="p-section-small position-relative d-none d-md-block">
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
      </section>

      @yield('content')

      <div class="container mt-auto">
        <div class="row">
            <div class="col-12">
                <h6 class="text-md-center mt-5 mb-3">
                    All rights reserved to <a href="">Ibtikar Technologies </a>
                </h6>
            </div>
        </div>
      </div>
  <!--container end-->

</div><!-- introSection end -->

  <!-- Jquery JS-->
  <script src="{{url('/')}}/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="{{url('/')}}/js/bootstrap.min.js"></script>



<script src="{{url('/')}}/js/feather.min.js"></script>
<script src="{{url('/')}}/js/all.js"></script>
<script src="{{url('/')}}/js/wow.min.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/owl.carousel.min.js'></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TimelineMax.min.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js'></script>

<script src="{{url('/')}}/js/anime.min.js"></script>

<script src="{{url('/')}}/js/script-en.js"></script>

  @yield('scripts')

</body>

</html>
