@extends('employee.layouts.app')

@section('styles')
<link rel="stylesheet" href="{{url('/')}}/employee/css/intlTelInput.css">
<link rel="stylesheet" href="{{url('/')}}/employee/css/dropzone.min.css">
<link rel="stylesheet" href="{{url('/')}}/employee/css/jquery.fancybox.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css'>
<style>
#phone::-webkit-input-placeholder { /* Edge */
  color: #cecece;
}

#phone:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #cecece;
}

#phone::placeholder {
  color: #cecece;
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
                      aria-valuemin="0" aria-valuemax="100" style="width: 7%;">
                      <span>7%</span>
                    </div>
              </div>

              <div class="step well">

                <h1 class="bold h3 mb-4" data-wow-delay="0s">
                    Create your profile
                </h1>

                <form id="profile_form" method="POST" action="{{ route('employee_profile.compelete.store') }}" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group">
                      <div class="uploadImg">
                        <img src="{{ $user->feature_image ? url('/').'/storage/'.$user->feature_image : '/images/user-big.png' }}" 
                        class="uploadUser" alt="user" />

                        <a data-fancybox data-src="#hidden-content" href="javascript:;" class="cameraIcon">
                            <img src="{{url('/')}}/images/camera.svg" alt="" />
                        </a>
                        <span class="remove-span">&#10005;</span>
                      </div>
                  </div>

                  <div class="mb-3 row">
                      <label class="col-sm-12 col-form-label">Name</label>
                      <div class="col-sm-12">
                        <input id="name" type="text" class="form-control" name="name" 
                        value="{{ $user->name ?? old('name') }}" required>

                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                  </div>

                  <div class="mb-3 row">
                      <label class="col-sm-12 col-form-label">Phone </label>
                      <div class="col-sm-12">
                        <input id="phone" type="tel" class="form-control" name="phone" 
                        value="{{ $user->phone ?? old('phone') }}" required>

                        <span id="valid-msg" class="hide">✓ Valid</span>
                        <span id="error-msg" class="hide"></span>

                        @error('phone')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-sm-12 col-form-label">Birthday</label>
                    <div class="form-group col-sm-12">
                      <div>
                        <div class="input-group date mb-3" data-date-format="dd.mm.yyyy">
                          <input id="birthdate" type="text" class="form-control" name="birthdate" placeholder="dd.mm.yyyy"
                          value="{{ $user->birthdate ?? old('birthdate') }}" required>
                          <span class="input-group-addon input-group-text">
                            <i class="lnir lnir-calendar"></i>
                          </span>
    
                          @error('birthdate')
                            <span class="invalid-feedback d-block" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="mb-3 row">
                      <label class="col-sm-12 col-form-label">Country</label>
                      <div class="col-sm-12">
                        <select class="custom-select" id="country" name="country" value="{{ $user->country ?? old('country') }}" required>
                          @include('items.country_options')
                        </select>

                        @error('country')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                  </div>

                  <div class="mb-3 row">
                    <label class="col-12 col-form-label">Describe yourself </label>
                    <div class="col-md-12">
                      <textarea required class="form-control" id="describe_yourself" name="describe_yourself" rows="3">{{ $user->describe_yourself ?? old('describe_yourself') }}</textarea>
                      @error('describe_yourself')
                          <span class="invalid-feedback d-block" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div><!-- col-md-12 -->
                  </div><!-- row -->

                  <button type="submit" id="submit" class="action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block">Next</button>
                </form>

              </div><!-- step 1-->
          </div>
      </div>
  </div>
</div>

<div style="display: none;" id="hidden-content">
	{{-- <div class="dropzone" id="myAwesomeDropzone"></div> --}}
  <div class="panel panel-default">
    <div class="panel-body">
      <form id="dropzoneForm" class="dropzone" action="{{ route('employee_profile.compelete.storeImg') }}">
        @csrf
        <div class="dz-message">
          <div class="fsp-select-labels">
            <div class="fsp-drop-area__title fsp-text__title"> Select Image to Upload </div> 
            <div class="fsp-drop-area__subtitle fsp-text__subheader"> or Drag and Drop, Copy and Paste Image </div>
          </div>
        </div>
      </form>
      <div class="text-center mt-3">
        <button type="button" class="action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block" id="submit-all">Upload</button>
      </div>
    </div>
  </div>
</div>
{{--  <iframe width="560" height="580" src="https://app.pipefy.com/public/form/w9bg3oER?embedded=true" frameborder="0"></iframe>  --}}
@endsection

@section('scripts')
<script src="{{url('/')}}/employee/js/intlTelInput.js"></script>
<script src="{{url('/')}}/employee/js/dropzone.min.js"></script>
<script src="{{url('/')}}/employee/js/jquery.fancybox.min.js"></script>
<script src='{{url('/')}}/employee/js/bootstrap-datepicker.min.js'></script>
<script>
$('.input-group.date').datepicker({ 
  format: "dd.mm.yyyy", 
  autoclose: true, 
  endDate: new Date(new Date().setDate(new Date().getDate() - (365 * 17)))
});


// dropzone function
Dropzone.options.dropzoneForm = {
  autoProcessQueue : false,
  acceptedFiles : ".png,.jpg,.jpeg",
  maxFiles: 1,
  maxFilesize: 5,
  addRemoveLinks: true,

  init:function(){
    var submitButton = document.querySelector("#submit-all");
    myDropzone = this;

    submitButton.addEventListener('click', function(){
      myDropzone.processQueue();
    });

    this.on("success", function(file, success){
      $('.uploadImg > img').attr('src', success.success);
      $('.profileImg > img').attr('src', success.success);
      if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
      {
        var _this = this;
        _this.removeAllFiles();
      }
      $.fancybox.close();
    });
  }
};
////////////////////////// end dropzone function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

var input = document.querySelector("#phone");
var iti = window.intlTelInput(input, {
      geoIpLookup: function(callback) {
        $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
          var countryCode = (resp && resp.country) ? resp.country : "";
          callback(countryCode);
        });
      },
      hiddenInput: "phone",
      initialCountry: "eg",
      utilsScript: "{{url('/')}}/employee/js/utils.js",
  });



  var input = document.querySelector("#phone"),
  errorMsg = document.querySelector("#error-msg"),
  validMsg = document.querySelector("#valid-msg");

// here, the index maps to the error code returned from getValidationError - see readme
var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

var reset = function() {
  input.classList.remove("error");
  errorMsg.innerHTML = "";
  errorMsg.classList.add("hide");
  validMsg.classList.add("hide");
  input.setCustomValidity("");
};

// on blur: validate
input.addEventListener('blur', function() {
  reset();
  if (input.value.trim()) {
    if (iti.isValidNumber()) {
      validMsg.classList.remove("hide");
      input.setCustomValidity("");
    } else {
      input.classList.add("error");
      var errorCode = iti.getValidationError();
      errorMsg.innerHTML = errorMap[errorCode];
      errorMsg.classList.remove("hide");
      input.setCustomValidity("Invalid phone number.");
    }
  }
});

// on keyup / change flag: reset
input.addEventListener('change', reset);
input.addEventListener('keyup', reset);

    
</script>

@if($user->country)
<script>
  $("#country").val("{{$user->country}}");
</script>
@endif
@endsection