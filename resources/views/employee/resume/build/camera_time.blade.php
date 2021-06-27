@extends('employee.layouts.app')

@section('styles')
<link rel="stylesheet" href="{{url('/')}}/employee/css/dropzone.min.css">
<link rel="stylesheet" href="{{url('/')}}/employee/css/jquery.fancybox.min.css">
<style>
.fancybox-content {
    background: #eee;
}
.dropzone {
    border: 1px dashed #BDBDBD;
    background-color: #EEE;
    padding: 100px 0;
}
.fsp-select-labels {
    -webkit-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
    background-image: url(/employee/images/icon-add-files-grey.svg);
    background-repeat: no-repeat;
    background-position: 50% 0;
}
.fsp-drop-area__title.fsp-text__title {
    margin-top: 75px;
    color: #444;
    font-size: 20px;
    font-weight: 400;
}
.dropzone .dz-message {
    margin: 0;
    transition: .4s;
}
.dropzone.dz-started {
    background: #fff;
    text-align: center;
}
.fsp-select-labels {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    flex-direction: column;
}
.fsp-drop-area__subtitle.fsp-text__subheader {
    color: #9E9E9E;
    line-height: 20px;
    font-size: 13px;
    font-weight: 400;
}
.dz-message:hover .fsp-select-labels {
    background-image: url(/employee/images/icon-add-files-grey.svg);
}
.dropzone:hover {
    background: #fff;
}
.dropzone:hover .fsp-select-labels {
    background-image: url(/employee/images/icon-add-files-blue.svg);
}
.cv-box img {
    max-width: 75px;
}
.cv-box {
    overflow: hidden;
    max-height: 0;
    height: auto;
    transition: .4s;
}
.cv-box.cv-active {
    max-height: 120px;
    padding-bottom: 20px;
}
.panel.panel-default{
  width: 600px;
}


@media only screen and (max-width: 768px){
  .panel.panel-default {
    width: 100%;
}

.fancybox-content {
    padding: 15px;
}

.panel-body {
    padding: 0 15px 15px;
}

.dropzone {
    padding: 50px 10px;
}
}
</style>
@endsection

@section('content')

<div class="container">

  <div class="row login-form justify-content-center">
    <div class="middle-box">
      <div>
        <div class="progress">
          <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
              aria-valuemin="0" aria-valuemax="100" style="width: 93%;">
              <span>93%</span>
          </div>
        </div>

        <div class="step well">

          <h1 class="bold h3 mb-4" data-wow-delay="0s">
              Camera Time!
          </h1>

          <p>
              Introduce yourself in a brief video in 2 mins summarizing your experience and education
              journey and your hobbies too, we would love to know more about you!
          </p>

          <a class="uploadCv mb-4" data-fancybox data-src="#hidden-content" href="javascript:;" >
            <?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
            <svg width="30px" height="30px" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>add</title>
                <defs>
                    <linearGradient x1="36.8125647%" y1="14.9985454%" x2="43.2324017%" y2="71.4348081%"
                        id="linearGradient-1">
                        <stop stop-color="#EFFAFD" offset="0%"></stop>
                        <stop stop-color="#F5FDFE" offset="100%"></stop>
                    </linearGradient>
                    <rect id="path-2" x="0" y="0" width="581" height="603" rx="20"></rect>
                    <filter x="-3.9%" y="-3.7%" width="107.7%" height="107.5%" filterUnits="objectBoundingBox"
                        id="filter-4">
                        <feOffset dx="0" dy="0" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
                        <feGaussianBlur stdDeviation="7.5" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
                        <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.08 0"
                            type="matrix" in="shadowBlurOuter1"></feColorMatrix>
                    </filter>
                </defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="profile-step5" transform="translate(-472.000000, -383.000000)">
                        <path d="M0,1221 L0,-8 L507,-8 L507,-10 L1444.7298,-10 C1473.62484,188.057228 1355.87752,247.398074 1091.48783,168.022538 C694.9033,48.9592327 677.188723,517.449306 668.516686,708.938194 C659.958473,897.913711 814.511367,1188.87875 519.029959,1219.90101 L519,1221 L0,1221 Z"
                            id="Combined-Shape" fill="url(#linearGradient-1)"></path>
                        <g id="Group" transform="translate(430.000000, 209.000000)">
                            <mask id="mask-3" fill="white">
                                <use xlink:href="#path-2"></use>
                            </mask>
                            <g id="Mask">
                                <use fill="black" fill-opacity="1" filter="url(#filter-4)"
                                    xlink:href="#path-2"></use>
                                <use fill="#FFFFFF" fill-rule="evenodd" xlink:href="#path-2"></use>
                            </g>
                            <g id="add" mask="url(#mask-3)" fill="#616B82" fill-rule="nonzero">
                                <g transform="translate(42.000000, 174.000000)">
                                    <path d="M15,0 C6.72849609,0 0,6.72849609 0,15 C0,23.2715039 6.72849609,30 15,30 C23.2715039,30 30,23.270332 30,15 C30,6.72966797 23.2715039,0 15,0 Z M15,27.6762305 C8.01123047,27.6762305 2.32376953,21.9899414 2.32376953,15 C2.32376953,8.01005859 8.01123047,2.32376953 15,2.32376953 C21.9887695,2.32376953 27.6762305,8.01005859 27.6762305,15 C27.6762305,21.9899414 21.9899414,27.6762305 15,27.6762305 Z"
                                        id="Shape"></path>
                                    <path d="M20.8333137,13.8333137 L16.1666863,13.8333137 L16.1666863,9.16668628 C16.1666863,8.52268487 15.6451781,8 15,8 C14.3548219,8 13.8333137,8.52268487 13.8333137,9.16668628 L13.8333137,13.8333137 L9.16668628,13.8333137 C8.52150818,13.8333137 8,14.3559986 8,15 C8,15.6440014 8.52150818,16.1666863 9.16668628,16.1666863 L13.8333137,16.1666863 L13.8333137,20.8333137 C13.8333137,21.4773151 14.3548219,22 15,22 C15.6451781,22 16.1666863,21.4773151 16.1666863,20.8333137 L16.1666863,16.1666863 L20.8333137,16.1666863 C21.4784918,16.1666863 22,15.6440014 22,15 C22,14.3559986 21.4784918,13.8333137 20.8333137,13.8333137 Z"
                                        id="Path"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
            Upload your Video
          </a>

          <div class="cv-box {{$resume->camera_time ? 'cv-active' : ''}}">
            <a href="{{url('/').'/storage/'.$resume->camera_time}}" target="_blank">
              <img src="{{url('/')}}/employee/images/video-icon.png">
            </a>
          </div>
        </div><!-- step 1-->

        <div class="text-center">
          <a href="{{route('employee_resume.build.online_presence')}}" style="color: #fff !important;" class="action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block">Next</a>
          <a href="{{route('employee_resume.build.preferred_salary')}}" class="action back btn btn-info mt-3" style="font-size: 12px;">Back</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div style="display: none;" id="hidden-content">
  <div class="panel panel-default">
    <div class="panel-body">
      <form id="dropzoneForm" class="dropzone" action="{{ route('employee_resume.build.camera_time.store') }}">
        @csrf
        <div class="dz-message">
          <div class="fsp-select-labels">
            <div class="fsp-drop-area__title fsp-text__title"> Select Video to Upload </div> 
            <div class="fsp-drop-area__subtitle fsp-text__subheader"> or Drag and Drop Video. Accepted files .mp4,.mov,.avi and .flv </div>
          </div>
        </div>
      </form>
      <div class="text-center mt-3">
        <button type="button" class="action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block" id="submit-all">Upload</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="{{url('/')}}/employee/js/dropzone.min.js"></script>
<script src="{{url('/')}}/employee/js/jquery.fancybox.min.js"></script>
<script>
// dropzone function
Dropzone.options.dropzoneForm = {
  autoProcessQueue : false,
  acceptedFiles : ".mp4,.mov,.avi,.flv",
  maxFiles: 1,
  maxFilesize: 80,
  addRemoveLinks: true,

  init:function(){
    var submitButton = document.querySelector("#submit-all");
    myDropzone = this;

    submitButton.addEventListener('click', function(){
      myDropzone.processQueue();
    });

    this.on("success", function(file, success){
      $('.cv-box > a').attr('href', success.success);
      $('#cv_file').val(success.success);
      if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) 
        {
          var _this = this;
          _this.removeAllFiles();
        }
        $.fancybox.close();
        $('.cv-box').addClass('cv-active');
    });
  }
};
////////////////////////// end dropzone function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
</script>
@endsection