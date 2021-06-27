<!------------------------ Change profile image modal ---------------------------->
<div style="display: none;" id="hidden-content">
  <div class="panel panel-default">
    <div class="panel-body">
      <form id="dropzoneFormProfileImage" class="dropzone" action="{{ route('employee_profile.compelete.storeImg') }}">
        @csrf
        <div class="dz-message">
          <div class="fsp-select-labels">
            <div class="fsp-drop-area__title fsp-text__title"> Select Image to Upload </div> 
            <div class="fsp-drop-area__subtitle fsp-text__subheader"> or Drag and Drop, Copy and Paste Image </div>
          </div>
        </div>
      </form>
      <div class="text-center mt-3">
        <button type="button" class="action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block" id="submit_profile_image">Upload</button>
      </div>
    </div>
  </div>
</div>
<!------------------------ End Change profile image modal ---------------------------->


<!------------------------ Change cv modal ---------------------------->
<div style="display: none;" id="cv-hidden-content">
  <div class="panel panel-default">
    <div class="panel-body">
      <form id="dropzoneFormCv" class="dropzone" action="{{ route('employee_resume.build.online_presence.storeFile') }}">
        @csrf
        <div class="dz-message">
          <div class="fsp-select-labels">
            <div class="fsp-drop-area__title fsp-text__title"> Select File to Upload </div> 
            <div class="fsp-drop-area__subtitle fsp-text__subheader"> or Drag and Drop, Copy and Paste File </div>
          </div>
        </div>
      </form>
      <div class="text-center mt-3">
        <button type="button" class="action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block" id="submit_cv_file">Upload</button>
      </div>
    </div>
  </div>
</div>
<!------------------------ End Change cv modal ---------------------------->


<!----------------------- Edit information modal ------------------------->
<div class="modal fade" id="info-edit" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Edit Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="lnil lnil-close"></i></button>
      </div>
      <form id="ajax_profile_form">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="col-form-label">Country</label>
              <select class="custom-select" id="country" name="country" value="{{ $user->country ?? old('country') }}" required>
                @include('items.country_options')
              </select>
              <span class="invalid-feedback d-block" role="alert" id="country_error"></span>
            </div>
            <div class="col-md-6 mb-3">
              <label class="col-form-label">Email</label>
              <input type="text" class="form-control" value="{{$user->email}}" disabled>
            </div>
            <div class="col-md-6 mb-3">
              <label class="col-form-label">Phone </label>
              <input id="phone" name="phone" type="tel" class="form-control" value="{{$user->phone}}" name="phone">
              <span id="valid-msg" class="hide">✓ Valid</span>
              <span id="error-msg" class="hide"></span>
              <span class="invalid-feedback d-block" role="alert" id="phone_error"></span>
            </div>
            <div class="col-md-6 mb-3">
              <label class="col-form-label">Birthday</label>
              <div class="form-group">
                <div id="filterDate2">
                  <div class="input-group date mb-3" data-date-format="dd.mm.yyyy">
                    <input id="birthdate" type="text" class="form-control" name="birthdate" placeholder="dd.mm.yyyy"
                    value="{{ $user->birthdate }}" required>
                    <span class="input-group-addon input-group-text" id="basic-addon2">
                      <i class="lnir lnir-calendar"></i>
                    </span>
                    <span class="invalid-feedback d-block" role="alert" id="birthdate_error"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="mb-3 row align-items-center">
            <div class="col-12 mt-4">
              <h5 class="bold mb-4">
                Boost your profile
              </h5>
            </div>

            <div class="col-12">                    
              <a class="uploadCv mb-2 d-flex " data-fancybox data-src="#cv-hidden-content" href="javascript:;">
                <img src="{{url('/')}}/employee/images/add.svg" class="mr-2"/>
                <div class="pl-2">
                    Change your CV <br>
                    <p class="hintText">
                      Allowed extensions are .pdf and .docx and size cannot exceed 5 Megabytes<br>
                      <span class="text-success w-100" role="alert" id="cv_success"></span>
                    </p>
                </div>
              </a>
              
            </div>

            <div class="col-sm-1">
              <?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
              <svg class="mt-4" width="30px" height="30px" viewBox="0 0 30 30" version="1.1"
                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
                          <g id="github-original" mask="url(#mask-6)" fill="#616B82" fill-rule="nonzero">
                              <g transform="translate(197.000000, 830.000000)" id="Path">
                                  <path d="M14.7692308,0.378947368 C6.64615385,0.378947368 0,7.15263158 0,15.5368421 C0,22.2157895 4.24615385,27.9 10.1076923,29.9368421 C10.8461538,30.0789474 11.1230769,29.6052632 11.1230769,29.2263158 C11.1230769,28.8947368 11.1230769,27.9 11.0769231,26.6210526 C6.96923077,27.5684211 6.09230769,24.5842105 6.09230769,24.5842105 C5.4,22.8315789 4.43076923,22.4052632 4.43076923,22.4052632 C3.09230769,21.4578947 4.52307692,21.4578947 4.52307692,21.4578947 C6,21.5526316 6.78461538,23.0210526 6.78461538,23.0210526 C8.07692308,25.3421053 10.2461538,24.6789474 11.0769231,24.2526316 C11.2153846,23.2578947 11.5846154,22.5947368 12,22.2157895 C8.76923077,21.8842105 5.30769231,20.5578947 5.30769231,14.7789474 C5.30769231,13.1210526 5.90769231,11.7947368 6.83076923,10.7526316 C6.69230769,10.3736842 6.18461538,8.85789474 6.96923077,6.72631579 C6.96923077,6.72631579 8.21538462,6.3 11.0307692,8.28947368 C12.2307692,7.95789474 13.4769231,7.76842105 14.7230769,7.76842105 C15.9692308,7.76842105 17.2615385,7.91052632 18.4153846,8.28947368 C21.2307692,6.34736842 22.4307692,6.72631579 22.4307692,6.72631579 C23.2153846,8.81052632 22.7538462,10.3736842 22.5692308,10.7526316 C23.4923077,11.7947368 24.0923077,13.1684211 24.0923077,14.7789474 C24.0923077,20.5578947 20.6307692,21.8842105 17.3538462,22.2157895 C17.8615385,22.6894737 18.3692308,23.6368421 18.3692308,25.0105263 C18.3692308,27.0473684 18.3230769,28.6578947 18.3230769,29.1315789 C18.3230769,29.5578947 18.6,29.9842105 19.3384615,29.8421053 C25.2923077,27.8526316 29.5384615,22.1684211 29.5384615,15.4894737 C29.4923077,7.15263158 22.8923077,0.378947368 14.7692308,0.378947368 Z"></path>
                              </g>
                          </g>
                      </g>
                  </g>
              </svg>
            </div>
            <div class="col-sm-11">
              <label class="col-sm-12 col-form-label">Github ID</label>
              <input id="github_url" type="text" class="form-control" name="github_url" 
                  value="{{ $resume->github_url }}">
                <span class="invalid-feedback d-block" role="alert" id="github_url_error"></span>
            </div>
          </div>

          <div class="mb-3 row align-items-center">
            <div class="col-sm-1">
              <?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
              <svg class="mt-4" width="30px" height="30px" viewBox="0 0 30 30" version="1.1"
                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
                                  <circle id="Oval" fill="#616B82" fill-rule="evenodd" cx="15" cy="15"
                                      r="15"></circle>
                                  <polygon id="Path" fill="#FFFFFF" fill-rule="nonzero" points="11.5384615 23.0769231 7.69230769 23.0769231 7.69230769 12.3076923 11.5384615 12.3076923"></polygon>
                                  <path d="M9.61538462,10.7692308 C8.56643357,10.7692308 7.69230769,9.8951049 7.69230769,8.84615385 C7.69230769,7.7972028 8.56643357,6.92307692 9.61538462,6.92307692 C10.6643357,6.92307692 11.5384615,7.7972028 11.5384615,8.84615385 C11.5384615,9.93006993 10.6993007,10.7692308 9.61538462,10.7692308 Z"
                                      id="Path" fill="#FFFFFF" fill-rule="nonzero"></path>
                                  <path d="M23.8461538,22.3076923 L20.3898129,22.3076923 L20.3898129,17.199211 C20.3898129,15.9911243 20.3534304,14.4033531 18.6070686,14.4033531 C16.8243243,14.4033531 16.533264,15.7495069 16.533264,17.0956607 L16.533264,22.3076923 L13.0769231,22.3076923 L13.0769231,11.7800789 L16.3877339,11.7800789 L16.3877339,13.229783 L16.4241164,13.229783 C16.8970894,12.4013807 18.024948,11.5384615 19.6985447,11.5384615 C23.1912682,11.5384615 23.8461538,13.7130178 23.8461538,16.5779093 L23.8461538,22.3076923 L23.8461538,22.3076923 Z"
                                      id="Path" fill="#FFFFFF" fill-rule="nonzero"></path>
                              </g>
                          </g>
                      </g>
                  </g>
              </svg>
            </div>
            <div class="col-sm-11">
              <label class="col-sm-12 col-form-label">Linkedin ID</label>
              <input id="linkedin_url" type="text" class="form-control" name="linkedin_url" 
                value="{{ $resume->linkedin_url }}">
              <span class="invalid-feedback d-block" role="alert" id="linkedin_url_error"></span>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-bp btn-dark">Save changes</button>
          <button class="btn btn-bp btn-cancel" data-dismiss="modal">Close</button>
        </div>
        <div class="form-group text-center my-4 w-100">
          <span class="text-success" id="success-message"> </span>
        </div>
      </form>
    </div>
  </div>
</div>