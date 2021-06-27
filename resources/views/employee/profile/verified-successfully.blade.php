@extends('employee.layouts.app')

@section('content')

<div class="container">

  <div class="row login-form justify-content-center">


      <div class="middle-box">
          
              <?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
              <svg class="mb-4" width="119px" height="119px" viewBox="0 0 119 119" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>Group 2</title>
                  <defs>
                      <linearGradient x1="36.8125647%" y1="14.9985454%" x2="43.2324017%" y2="71.4348081%" id="linearGradient-1">
                          <stop stop-color="#EFFAFD" offset="0%"></stop>
                          <stop stop-color="#F5FDFE" offset="100%"></stop>
                      </linearGradient>
                      <linearGradient x1="22.9287027%" y1="85.8751313%" x2="88.1499475%" y2="16.7509191%" id="linearGradient-2">
                          <stop stop-color="#53C9EA" offset="0%"></stop>
                          <stop stop-color="#77D0BC" offset="100%"></stop>
                      </linearGradient>
                      <linearGradient x1="0%" y1="75.5102041%" x2="100%" y2="24.4897959%" id="linearGradient-3">
                          <stop stop-color="#4DC8F2" offset="0%"></stop>
                          <stop stop-color="#78D0BA" offset="100%"></stop>
                      </linearGradient>
                  </defs>
                  <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <g id="profile-step5" transform="translate(-1063.000000, -261.000000)">
                          <path d="M0,1221 L0,-8 L507,-8 L507,-10 L1444.7298,-10 C1473.62484,188.057228 1355.87752,247.398074 1091.48783,168.022538 C694.9033,48.9592327 677.188723,517.449306 668.516686,708.938194 C659.958473,897.913711 814.511367,1188.87875 519.029959,1219.90101 L519,1221 L0,1221 Z" id="Combined-Shape" fill="url(#linearGradient-1)"></path>
                          <g id="icons" transform="translate(56.000000, 24.000000)"></g>
                          <g id="Group-2" transform="translate(1063.000000, 261.000000)">
                              <circle id="Oval" stroke="url(#linearGradient-2)" stroke-width="4" cx="59.5" cy="59.5" r="57.5"></circle>
                              <path d="M44.493716,85 C43.2810802,85 41.9471807,84.5151515 40.977072,83.5454545 L25.5456861,68.5757576 C24.8181046,67.8484848 24.8181046,66.7575758 25.5456861,66.030303 C26.2732677,65.3030303 27.3646399,65.3030303 28.0922215,66.030303 L43.5236073,81 C44.0086617,81.4848485 44.8575068,81.4848485 45.3425611,81 L91.9077785,35.5454545 C92.6353601,34.8181818 93.7267323,34.8181818 94.4543139,35.5454545 C95.1818954,36.2727273 95.1818954,37.3636364 94.4543139,38.0909091 L48.0103601,83.5454545 C47.0402514,84.5151515 45.8276155,85 44.493716,85 Z" id="Path" fill="url(#linearGradient-3)" fill-rule="nonzero"></path>
                          </g>
                      </g>
                  </g>
              </svg>

          <h1 class="bold h3" data-wow-delay="0s">
            Thank you for verifying your email address. You can now continue working on completing and submitting your resume.
          </h1>

          @if ($user->CandidateResume && $user->CandidateResume->cv_file)
            <a class="action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block" 
            href="{{route('employee_resume.build.previewResume')}}">Preview your resume before submitting</a>
          @else
            <a class="action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block" href="{{route('employee_profile.compelete')}}">Compelete your resume now</a>
          @endif


      </div>

  </div><!-- row end-->


</div>
<!--container end-->

@endsection
