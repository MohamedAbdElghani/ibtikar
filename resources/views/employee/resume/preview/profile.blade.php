
<div class="row">
  <div class="col-4 col-lg-12  user-uploadImg d-none d-lg-block">
    <div class="user-image">
      <img src="{{ $user->feature_image ? url('/').'/storage/'.$user->feature_image : '/images/user-big.png' }}" class="uploadUser"/>
      <a data-fancybox data-src="#hidden-content" href="javascript:;" class="cameraIcon">
        <img src="{{url('/')}}/images/camera.svg" alt="" />
      </a>
    </div>
  </div>

  <div class="col-12">
    <div class="mt-lg-5 d-flex ">
      <h5 class="mb-4"> Information</h5>
      <a class="ml-auto blue-btn" data-toggle="modal" data-target="#info-edit">Edit </a>
    </div>

    <ul class="unstyled info-li">
      <li><i class="lnir lnir-map-marker mr-2"></i> <span id="country_text">{{$user->country}}</span></li>
      <li><i class="lnir lnir-phone mr-2"></i> <span id="phone_text">{{$user->phone}}</span></li>
      <li><i class="lnir lnir-envelope mr-2"></i>{{$user->email}}</li>
      <li><i class="lnir lnir-cake mr-2"></i><span id="birthdate_text">{{$user->birthdate}}</span></li>
    </ul>

    <ul class="linkList">
      <li>
        <a id="github_url_text" href="https://github.com/{{$resume->github_url}}" target="_blank" @if(!$resume->github_url) style="display:none;" @endif>
          <?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
          <svg width="30px" height="30px" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>github-original</title>
              <defs>
                  <linearGradient x1="36.8125647%" y1="14.9985454%" x2="43.2324017%" y2="71.4348081%"
                      id="linearGradient-1">
                      <stop stop-color="#EFFAFD" offset="0%"></stop>
                      <stop stop-color="#F5FDFE" offset="100%"></stop>
                  </linearGradient>
                  <rect id="path-2" x="167" y="208" width="1111" height="720" rx="20"></rect>
                  <filter x="-2.0%" y="-3.1%" width="104.1%" height="106.2%" filterUnits="objectBoundingBox"
                      id="filter-4">
                      <feOffset dx="0" dy="0" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                      <feGaussianBlur stdDeviation="7.5" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
                      <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.08 0"
                          type="matrix" in="shadowBlurOuter1"></feColorMatrix>
                  </filter>
                  <rect id="path-5" x="166" y="252" width="284" height="676"></rect>
              </defs>
              <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="profile-view-1" transform="translate(-197.000000, -830.000000)">
                      <path d="M0,1221 L0,-8 L507,-8 L507,-10 L1444.7298,-10 C1473.62484,188.057228 1355.87752,247.398074 1091.48783,168.022538 C694.9033,48.9592327 677.188723,517.449306 668.516686,708.938194 C659.958473,897.913711 814.511367,1188.87875 519.029959,1219.90101 L519,1221 L0,1221 Z"
                          id="Combined-Shape" fill="url(#linearGradient-1)"></path>
                      <mask id="mask-3" fill="white">
                          <use xlink:href="#path-2"></use>
                      </mask>
                      <g id="Mask">
                          <use fill="black" fill-opacity="1" filter="url(#filter-4)"
                              xlink:href="#path-2"></use>
                          <use fill="#FFFFFF" fill-rule="evenodd" xlink:href="#path-2"></use>
                      </g>
                      <mask id="mask-6" fill="white">
                          <use xlink:href="#path-5"></use>
                      </mask>
                      <use id="Mask" fill="#FAFBFF" xlink:href="#path-5"></use>
                      <g id="github-original" mask="url(#mask-6)" fill="#616B82"
                          fill-rule="nonzero">
                          <g transform="translate(197.000000, 830.000000)" id="Path">
                              <path d="M14.7692308,0.378947368 C6.64615385,0.378947368 0,7.15263158 0,15.5368421 C0,22.2157895 4.24615385,27.9 10.1076923,29.9368421 C10.8461538,30.0789474 11.1230769,29.6052632 11.1230769,29.2263158 C11.1230769,28.8947368 11.1230769,27.9 11.0769231,26.6210526 C6.96923077,27.5684211 6.09230769,24.5842105 6.09230769,24.5842105 C5.4,22.8315789 4.43076923,22.4052632 4.43076923,22.4052632 C3.09230769,21.4578947 4.52307692,21.4578947 4.52307692,21.4578947 C6,21.5526316 6.78461538,23.0210526 6.78461538,23.0210526 C8.07692308,25.3421053 10.2461538,24.6789474 11.0769231,24.2526316 C11.2153846,23.2578947 11.5846154,22.5947368 12,22.2157895 C8.76923077,21.8842105 5.30769231,20.5578947 5.30769231,14.7789474 C5.30769231,13.1210526 5.90769231,11.7947368 6.83076923,10.7526316 C6.69230769,10.3736842 6.18461538,8.85789474 6.96923077,6.72631579 C6.96923077,6.72631579 8.21538462,6.3 11.0307692,8.28947368 C12.2307692,7.95789474 13.4769231,7.76842105 14.7230769,7.76842105 C15.9692308,7.76842105 17.2615385,7.91052632 18.4153846,8.28947368 C21.2307692,6.34736842 22.4307692,6.72631579 22.4307692,6.72631579 C23.2153846,8.81052632 22.7538462,10.3736842 22.5692308,10.7526316 C23.4923077,11.7947368 24.0923077,13.1684211 24.0923077,14.7789474 C24.0923077,20.5578947 20.6307692,21.8842105 17.3538462,22.2157895 C17.8615385,22.6894737 18.3692308,23.6368421 18.3692308,25.0105263 C18.3692308,27.0473684 18.3230769,28.6578947 18.3230769,29.1315789 C18.3230769,29.5578947 18.6,29.9842105 19.3384615,29.8421053 C25.2923077,27.8526316 29.5384615,22.1684211 29.5384615,15.4894737 C29.4923077,7.15263158 22.8923077,0.378947368 14.7692308,0.378947368 Z"></path>
                          </g>
                      </g>
                  </g>
              </g>
          </svg>
        </a>
      </li>

      <li>
        <a id="linkedin_url_text" href="https://www.linkedin.com/in/{{$resume->linkedin_url}}" target="_blank" @if(!$resume->linkedin_url) style="display:none;" @endif>
          <?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
          <svg width="30px" height="30px" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>linkedin-original</title>
              <defs>
                  <linearGradient x1="36.8125647%" y1="14.9985454%" x2="43.2324017%" y2="71.4348081%"
                      id="linearGradient-1">
                      <stop stop-color="#EFFAFD" offset="0%"></stop>
                      <stop stop-color="#F5FDFE" offset="100%"></stop>
                  </linearGradient>
                  <rect id="path-2" x="167" y="208" width="1111" height="720" rx="20"></rect>
                  <filter x="-2.0%" y="-3.1%" width="104.1%" height="106.2%" filterUnits="objectBoundingBox"
                      id="filter-4">
                      <feOffset dx="0" dy="0" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                      <feGaussianBlur stdDeviation="7.5" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
                      <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.08 0"
                          type="matrix" in="shadowBlurOuter1"></feColorMatrix>
                  </filter>
                  <rect id="path-5" x="166" y="252" width="284" height="676"></rect>
              </defs>
              <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="profile-view-1" transform="translate(-243.000000, -829.000000)">
                      <path d="M0,1221 L0,-8 L507,-8 L507,-10 L1444.7298,-10 C1473.62484,188.057228 1355.87752,247.398074 1091.48783,168.022538 C694.9033,48.9592327 677.188723,517.449306 668.516686,708.938194 C659.958473,897.913711 814.511367,1188.87875 519.029959,1219.90101 L519,1221 L0,1221 Z"
                          id="Combined-Shape" fill="url(#linearGradient-1)"></path>
                      <mask id="mask-3" fill="white">
                          <use xlink:href="#path-2"></use>
                      </mask>
                      <g id="Mask">
                          <use fill="black" fill-opacity="1" filter="url(#filter-4)"
                              xlink:href="#path-2"></use>
                          <use fill="#FFFFFF" fill-rule="evenodd" xlink:href="#path-2"></use>
                      </g>
                      <mask id="mask-6" fill="white">
                          <use xlink:href="#path-5"></use>
                      </mask>
                      <use id="Mask" fill="#FAFBFF" xlink:href="#path-5"></use>
                      <g id="linkedin-original" mask="url(#mask-6)">
                          <g transform="translate(243.000000, 829.000000)">
                              <circle id="Oval" fill="#616B82" fill-rule="evenodd" cx="15"
                                  cy="15" r="15"></circle>
                              <polygon id="Path" fill="#FFFFFF" fill-rule="nonzero"
                                  points="11.5384615 23.0769231 7.69230769 23.0769231 7.69230769 12.3076923 11.5384615 12.3076923"></polygon>
                              <path d="M9.61538462,10.7692308 C8.56643357,10.7692308 7.69230769,9.8951049 7.69230769,8.84615385 C7.69230769,7.7972028 8.56643357,6.92307692 9.61538462,6.92307692 C10.6643357,6.92307692 11.5384615,7.7972028 11.5384615,8.84615385 C11.5384615,9.93006993 10.6993007,10.7692308 9.61538462,10.7692308 Z"
                                  id="Path" fill="#FFFFFF" fill-rule="nonzero"></path>
                              <path d="M23.8461538,22.3076923 L20.3898129,22.3076923 L20.3898129,17.199211 C20.3898129,15.9911243 20.3534304,14.4033531 18.6070686,14.4033531 C16.8243243,14.4033531 16.533264,15.7495069 16.533264,17.0956607 L16.533264,22.3076923 L13.0769231,22.3076923 L13.0769231,11.7800789 L16.3877339,11.7800789 L16.3877339,13.229783 L16.4241164,13.229783 C16.8970894,12.4013807 18.024948,11.5384615 19.6985447,11.5384615 C23.1912682,11.5384615 23.8461538,13.7130178 23.8461538,16.5779093 L23.8461538,22.3076923 L23.8461538,22.3076923 Z"
                                  id="Path" fill="#FFFFFF" fill-rule="nonzero"></path>
                          </g>
                      </g>
                  </g>
              </g>
          </svg>
        </a>
      </li>

      @if($resume->cv_file)
      <li>
        <a href="{{url('/').'/storage/'.$resume->cv_file}}" target="_blank" id="cv_icon_url">
          <?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
          <svg width="30px" height="30px" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>cv</title>
              <defs>
                  <linearGradient x1="36.8125647%" y1="14.9985454%" x2="43.2324017%" y2="71.4348081%"
                      id="linearGradient-1">
                      <stop stop-color="#EFFAFD" offset="0%"></stop>
                      <stop stop-color="#F5FDFE" offset="100%"></stop>
                  </linearGradient>
                  <rect id="path-2" x="167" y="208" width="1111" height="720" rx="20"></rect>
                  <filter x="-2.0%" y="-3.1%" width="104.1%" height="106.2%" filterUnits="objectBoundingBox"
                      id="filter-4">
                      <feOffset dx="0" dy="0" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                      <feGaussianBlur stdDeviation="7.5" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
                      <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.08 0"
                          type="matrix" in="shadowBlurOuter1"></feColorMatrix>
                  </filter>
                  <rect id="path-5" x="166" y="252" width="284" height="676"></rect>
              </defs>
              <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g id="profile-view-1" transform="translate(-291.000000, -829.000000)">
                      <path d="M0,1221 L0,-8 L507,-8 L507,-10 L1444.7298,-10 C1473.62484,188.057228 1355.87752,247.398074 1091.48783,168.022538 C694.9033,48.9592327 677.188723,517.449306 668.516686,708.938194 C659.958473,897.913711 814.511367,1188.87875 519.029959,1219.90101 L519,1221 L0,1221 Z"
                          id="Combined-Shape" fill="url(#linearGradient-1)"></path>
                      <mask id="mask-3" fill="white">
                          <use xlink:href="#path-2"></use>
                      </mask>
                      <g id="Mask">
                          <use fill="black" fill-opacity="1" filter="url(#filter-4)"
                              xlink:href="#path-2"></use>
                          <use fill="#FFFFFF" fill-rule="evenodd" xlink:href="#path-2"></use>
                      </g>
                      <mask id="mask-6" fill="white">
                          <use xlink:href="#path-5"></use>
                      </mask>
                      <use id="Mask" fill="#FAFBFF" xlink:href="#path-5"></use>
                      <g id="cv" mask="url(#mask-6)">
                          <g transform="translate(291.000000, 829.000000)">
                              <circle id="Oval" fill="#616B82" fill-rule="evenodd" cx="15"
                                  cy="15" r="15"></circle>
                              <path d="M10.2704327,20.2283654 C10.791266,20.2283654 11.2429888,20.166266 11.625601,20.0420673 C12.0082131,19.9178686 12.3577724,19.7455929 12.6742788,19.5252404 C12.9627404,19.3249199 13.2171474,19.0855369 13.4375,18.8070913 C13.6578526,18.5286458 13.8541667,18.213141 14.0264423,17.8605769 L14.0264423,17.8605769 L13.5096154,17.5480769 C13.1490385,18.1650641 12.749399,18.6258013 12.3106971,18.9302885 C11.8719952,19.2347756 11.3721955,19.3870192 10.8112981,19.3870192 C10.4266827,19.3870192 10.0761218,19.3159054 9.75961538,19.1736779 C9.44310897,19.0314503 9.16866987,18.8080929 8.93629808,18.5036058 C8.71995192,18.2111378 8.54467147,17.8255208 8.41045673,17.3467548 C8.27624199,16.8679888 8.20913462,16.2900641 8.20913462,15.6129808 C8.20913462,14.4150641 8.40544872,13.4845753 8.79807692,12.8215144 C9.19070513,12.1584535 9.76362179,11.8269231 10.5168269,11.8269231 C11.1217949,11.8269231 11.6346154,12.0492788 12.0552885,12.4939904 C12.4759615,12.9387019 12.8365385,13.6358173 13.1370192,14.5853365 L13.1370192,14.5853365 L13.6658654,14.5853365 L13.6117788,11.4723558 L13.0889423,11.4723558 L12.7163462,11.8028846 C12.4479167,11.6586538 12.119391,11.5294471 11.7307692,11.4152644 C11.3421474,11.3010817 10.9114583,11.2439904 10.4387019,11.2439904 C9.78565705,11.2439904 9.17267628,11.3551683 8.59975962,11.577524 C8.02684295,11.7998798 7.53605769,12.1133814 7.12740385,12.5180288 C6.71073718,12.9306891 6.38721955,13.4184696 6.15685096,13.9813702 C5.92648237,14.5442708 5.81129808,15.15625 5.81129808,15.8173077 C5.81129808,16.4823718 5.92548077,17.0923478 6.15384615,17.6472356 C6.38221154,18.2021234 6.69471154,18.6678686 7.09134615,19.0444712 C7.49599359,19.4290865 7.97075321,19.7225561 8.515625,19.9248798 C9.06049679,20.1272035 9.64543269,20.2283654 10.2704327,20.2283654 Z M20.5588942,20.0961538 C20.8313301,19.4310897 21.1167869,18.7359776 21.4152644,18.0108173 C21.713742,17.2856571 21.9911859,16.6185897 22.2475962,16.0096154 C22.5360577,15.3325321 22.7924679,14.7285657 23.0168269,14.1977163 C23.2411859,13.666867 23.4154647,13.2632212 23.5396635,12.9867788 C23.6318109,12.7864583 23.7249599,12.6292067 23.8191106,12.515024 C23.9132612,12.4008413 24.0464744,12.2936699 24.21875,12.1935096 C24.3469551,12.1173878 24.4711538,12.0612981 24.5913462,12.0252404 C24.7115385,11.9891827 24.8377404,11.9651442 24.9699519,11.953125 L24.9699519,11.953125 L24.9699519,11.4723558 L21.5144231,11.4723558 L21.5144231,11.953125 C22.0112179,11.9931891 22.3517628,12.0562901 22.5360577,12.1424279 C22.7203526,12.2285657 22.8125,12.3357372 22.8125,12.4639423 C22.8125,12.5761218 22.7794471,12.7433894 22.7133413,12.9657452 C22.6472356,13.188101 22.5641026,13.427484 22.4639423,13.6838942 C22.2596154,14.2127404 22.0232372,14.8217147 21.7548077,15.5108173 C21.4863782,16.1999199 21.1498397,17.0432692 20.7451923,18.0408654 C20.0841346,16.4022436 19.5853365,15.1832933 19.2487981,14.3840144 C18.9122596,13.5847356 18.6798878,13.0088141 18.5516827,12.65625 C18.5236378,12.5721154 18.5026042,12.505008 18.4885817,12.4549279 C18.4745593,12.4048478 18.4675481,12.3577724 18.4675481,12.3137019 C18.4675481,12.2255609 18.5446715,12.1524439 18.6989183,12.094351 C18.8531651,12.036258 19.1466346,11.9811699 19.5793269,11.9290865 L19.5793269,11.9290865 L19.5793269,11.4723558 L14.9579327,11.4723558 L14.9579327,11.9411058 C15.1302083,11.9651442 15.2684295,11.9921875 15.3725962,12.0222356 C15.4767628,12.0522837 15.5969551,12.1053686 15.7331731,12.1814904 C15.9214744,12.2896635 16.0586939,12.3948317 16.1448317,12.4969952 C16.2309696,12.5991587 16.3201122,12.7504006 16.4122596,12.9507212 C16.6486378,13.5036058 17.0572917,14.4891827 17.6382212,15.9074519 C18.2191506,17.3257212 18.7900641,18.7219551 19.3509615,20.0961538 L19.3509615,20.0961538 L20.5588942,20.0961538 Z"
                                  id="CV" fill="#FFFFFF" fill-rule="nonzero"></path>
                          </g>
                      </g>
                  </g>
              </g>
          </svg>
        </a>
      </li>
      @endif
    </ul>

    <div class="d-none d-lg-block">
      <div class="uploadVideo d-flex mt-4 ">
        <a data-toggle="modal" data-target="#video-edit"><img src="{{url('/')}}/employee/images/video.svg"/></a>
        <div class="ml-3">
          <h5 class="mb-0">Know me more</h5>
          <a class="editLink ml-auto blue-btn" data-toggle="modal" data-target="#video-upload" > Upload your video </a>
          <p class="hintText text-success" style="display: none;" id="video_success">Video uploaded successfully.</p>
        </div>
      </div>
    </div><!-- video uploadVideo-->
  </div>
</div>