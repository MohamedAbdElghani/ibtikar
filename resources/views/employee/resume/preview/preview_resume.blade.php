@extends('employee.layouts.app')

@section('styles')
<link rel="stylesheet" href="{{url('/')}}/employee/css/intlTelInput.css">
<link rel="stylesheet" href="{{url('/')}}/employee/css/jquery.fancybox.min.css">
<link rel="stylesheet" href="{{url('/')}}/employee/css/dropzone.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<style>
.unselectedItems ul li {
    padding: 0;
}
.opacity-0{
  opacity: 0;
  position: absolute;
}
.unselectedItems ul li label {
    padding: 2px 10px;
}
.bootstrap-select .dropdown-menu .inner.show {
    max-height: 200px !important;
}
.bootstrap-select > .dropdown-menu {
    transform: translate3d(0px, 46px, 0px) !important;
}
.delete-form-multiple {
    position: absolute;
    top: 15px;
    right: 20px;
}
.editBox {
    position: relative;
}
</style>
@endsection

@section('content')
  <div class="container text-left">
    <div class="row login-form justify-content-center">
      <div class="col-md-12 alertBox">
        <i class="mr-2" data-feather="alert-circle"></i>
        @if($resume->pipefy_id)
          <p>Thanks for submitting your profile.</p> 
        @else
          <p>This is a preview of your profile. Please verify your information before submitting.</p> 
        @endif

        @if(is_null($user->email_verified_at))
          <a href="#" class="disabled btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn ml-auto flex-shrink-0">Verify email to submit</a>
        @elseif($resume->pipefy_id)
        <form method="POST" action="{{ route('employee_resume.build.submitResume') }}" class="ml-auto">
          @csrf
          <button tybe="submit" class="btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn ml-auto flex-shrink-0 editLink">Submit for review</button>
        </form>
        @else
        <form method="POST" action="{{ route('employee_resume.build.submitResume') }}" class="ml-auto">
          @csrf
          <button tybe="submit" class="btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn ml-auto flex-shrink-0 editLink">Submit for review</button>
        </form>
        @endif
      </div><!-- col-md-12 end-->
    </div><!-- row end-->

    <div class="row profileBox">
      <div class="col-lg-9 col-md-12 profileRightSide order-lg-2">

        {{-- skills --}}
        @include('employee.resume.preview.role_skills')

        {{-- about --}}
        @include('employee.resume.preview.about')
        
        {{-- experience --}}
        @include('employee.resume.preview.experience')

        {{-- education --}}
        @include('employee.resume.preview.education')

        {{-- certificate --}}
        @include('employee.resume.preview.certificate')

      </div><!-- col-md-6 end-->

      <div class="col-lg-3 col-12 profileLeftSide order-lg-1">

        {{-- profile --}}
        @include('employee.resume.preview.profile')

      </div><!-- col-md-3 end-->

    </div><!-- row end-->
  </div><!--container end-->
</div>

{{-- video modal --}}
@include('employee.resume.preview.video_modal')

{{-- profile modal --}}
@include('employee.resume.preview.profile_modal')

@endsection

@section('scripts')
<script src="{{url('/')}}/employee/js/intlTelInput.js"></script>
<script src="{{url('/')}}/employee/js/jquery.fancybox.min.js"></script>
<script src="{{url('/')}}/employee/js/dropzone.min.js"></script>
<script src='{{url('/')}}/employee/js/bootstrap-datepicker.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
{{-- scripts --}}
@include('employee.resume.preview.scripts')
@endsection