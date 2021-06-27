@extends('employee.layouts.app')

@section('styles')
<style>
.preview-top-bar {
    background: #616b82;
    padding: 20px 15px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}
.preview-top-bar img {
    width: 30px;
}

.preview-top-bar p {
    color: #fff;
    margin: 0 15px;
}
.preview-profile-image {
    position: relative;
}

.preview-profile-image a.cameraIcon {
    left: auto;
}

.preview-content {
    background: #fff;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    -webkit-box-shadow: 0px 0px 15px 3px rgb(0 0 0 / 8%);
    box-shadow: 0px 0px 15px 3px rgb(0 0 0 / 8%);
}
.preview-profile-image > img {
    border-radius: 10px;
}
.preview-social-media a img {
    width: 37px;
}
.preview-main-skills span {
    background: #45C7F4;
    padding: 7px 15px;
    margin: 0 2px 8px 0;
    color: #fff;
    border-radius: 30px;
    display: inline-block;
    line-height: 1;
    font-size: 13px;
}
.preview-first-col{
  background: rgb(239 239 239);
}
.preview-first-col {
    padding-top: 40px;
    padding-bottom: 60px;
}
.preview-middle-col {
    padding-top: 40px;
}

.preview-last-col {
    padding-top: 40px;
}

@media only screen and (max-width: 768px){
.preview-social-media {
    margin-bottom: 40px;
}
.preview-middle-col .px-3 {
    padding: 0 !important;
}
.preview-last-col {
    margin-top: 30px;
}
.preview-top-bar > .text-center {
    width: 100%;
    margin-top: 10px;
}

}
</style>
@endsection

@section('content')

<div class="container text-left">
  <div class="row">
    <div class="col-md-12">
      <div class="preview-top-bar d-flex justify-content-between align-items-center flex-wrap">
        <div class=" d-flex align-items-center">
          <img src="{{url('/')}}/employee/images/exclamation-point.png" alt="">
          @if($resume->pipefy_id)
            <p>Thanks for submitting your profile.</p> 
          @else
            <p>This is a preview of your profile. Please verify your information before submitting.</p> 
          @endif
        </div>
        <div class="text-center">
          @if(is_null($user->email_verified_at))
            <a href="#" class="disabled action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn">Verify email to submit</a>
          @elseif($resume->pipefy_id)
            
          @else
          <form method="POST" action="{{ route('employee_resume.build.submitResume') }}">
            @csrf
            <button tybe="submit" class="next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn">Submit for review</button>
          </form>
          @endif
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="preview-content">
        <div class="row m-0">
          <div class="col-md-3 preview-first-col">
            <div class="preview-profile-image">
              <img src="{{$user->feature_image ? url('/').'/storage/'.$user->feature_image : url('/').'/images/user-big.png'}}" class="img-fluid">
              <a href="#" class="cameraIcon">
                <img src="{{url('/')}}/images/camera.svg" alt="">
              </a>
            </div>

            <div class="preview-profile-info mt-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="h5 bold mb-0">Information</h4>
                {{--  <a href="{{route('employee_profile.compelete')}}">Edit</a>  --}}
              </div>

              <div class="d-flex align-items-center">
                <img src="{{url('/')}}/employee/images/placeholder.png" class="mr-3" style="width: 21px;">
                <p class="mb-1">{{$user->country}}</p>
              </div>

              <div class="d-flex align-items-center">
                <img src="{{url('/')}}/employee/images/phone.png" class="mr-3" style="width: 21px;">
                <p class="mb-1">{{$user->phone}}</p>
              </div>

              <div class="d-flex align-items-center">
                <img src="{{url('/')}}/employee/images/mail.png" class="mr-3" style="width: 21px;">
                <p class="mb-1">{{$user->email}}</p>
              </div>

              <div class="d-flex align-items-center">
                <img src="{{url('/')}}/employee/images/cake.png" class="mr-3" style="width: 21px;">
                @php
                  $time = strtotime($user->birthdate);
                  $newformat = date('d-m-Y',$time);
                @endphp
                <p class="mb-1">{{$newformat}}</p>
              </div>

              <div class="mt-3 preview-social-media">
                @if($resume->github_url)
                  <a href="{{$resume->github_url}}" target="_blank" class="mr-2"><img src="{{url('/')}}/employee/images/github.png"></a>
                @endif
                
                @if($resume->linkedin_url)
                  <a href="{{$resume->linkedin_url}}" target="_blank" class="mr-2"><img src="{{url('/')}}/employee/images/linkedin.png"></a>
                @endif

                <a href="{{$resume->cv_file}}" target="_blank" class="mr-2"><img src="{{url('/')}}/employee/images/curriculum-vitae.png"></a>
              </div>
            </div>
          </div>

          <div class="col-md-6 preview-middle-col">
            <div class="px-3">
              <h2 class="h2 bold">{{$user->name}}</h2>
              <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0" style="color: #4DC8F2;">{{$current_role}} {{$how_long}} of experience</p>
                {{--  <a href="{{route('employee_resume.build.primary_role')}}">Edit</a>  --}}
              </div>
              <a href="{{route('employee_profile.compelete')}}" class="btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn mt-4">Edit Resume</a>
            </div>
          </div>

          <div class="col-md-3 preview-last-col">
            <div class="d-flex justify-content-between align-items-center mb-3 pt-2">
              <h4 class="h5 bold mb-0">Main Skills</h4>
              {{--  <a href="{{route('employee_resume.build.skills')}}">Edit</a>  --}}
            </div>

            <div class="preview-main-skills">
              @foreach ($selected_skills as $skill)
                <span>{{\App\EmployeeSkill::find($skill)->name}}</span>
              @endforeach
            </div>
            
            <div class="d-flex justify-content-between align-items-center my-3 pt-2">
              <h4 class="h5 bold mb-0">Extra Skills</h4>
              {{--  <a href="{{route('employee_resume.build.skills')}}">Edit</a>  --}}
            </div>

            <div class="preview-main-skills">
              @php 
                  $explode_tec = explode(',', trim($resume->top_skills)); 
                  $trim_tec = array();
                  foreach ($explode_tec as $tec) {
                      array_push($trim_tec, trim($tec));
                  }
                @endphp
                @foreach($trim_tec as $tec)
                  @if(!empty($tec))
                  <span>{{ trim($tec) }}</span>
                  @endif
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
