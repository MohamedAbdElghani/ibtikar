@extends('employee.layouts.app')

@section('styles')
<style>
.other-role label {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

.other-role label input {
    width: 80%;
    border: 1px solid #959595;
    border-radius: 2px;
    padding: 4px 11px;
}

.other-role label input:hover, .other-role label input:focus {box-shadow: rgb(2 152 217 / 20%) 0px 0px 0px 2px;}
</style>
@endsection

@section('content')

<div class="container">

  <div class="row login-form justify-content-center">
      <div class="middle-box">
          <div>
              <div class="progress">
                <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
                    aria-valuemin="0" aria-valuemax="100" style="width: 14%;">
                    <span>14%</span>
                </div>
              </div>

              <div class="step well">

                <h2 class="bold h3 mb-4" data-wow-delay="0s">
                    What's your current role?
                </h2>

                <form method="POST" action="{{ route('employee_resume.build.primary_role.store') }}">
                  @csrf

                  <ul class="unstyled centered onlyOneChecked">
                    
                  @foreach ($job_roles as $role)
                    <li>
                      <input class="styled-checkbox" type="radio" name="speciality" id="speciality_{{$role->id}}" value="{{$role->id}}" required
                      {{ $selected_role_id == $role->id ? 'checked' : '' }}>
                      <label for="speciality_{{$role->id}}">{{$role->name}}</label>
                    </li>
                  @endforeach

                  @if($other_role)
                    <li class="other-role">
                      <input class="styled-checkbox" type="radio" name="speciality" id="other_role" value="{{$other_role->id}}" required
                      {{ $selected_role_id == $other_role->id ? 'checked' : '' }}>
                      <label for="other_role">
                        <input class="form-control" type="text" placeholder="other" name="other_role" maxlength="25"
                        {{ $selected_role_id == $other_role->id ? 'required' : '' }} value="{{$resume->other_role}}">
                        @error('other_role')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </label>
                    </li>
                  @endif
                        
                </ul>

                <div class="text-center">
                  <button type="submit" class="action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block">Next</button>
                  <a href="{{route('employee_profile.compelete')}}" class="action back btn btn-info mt-3" style="font-size: 12px;">Back</a>
                </div>
                </form>
              </div><!-- step 1-->
          </div>
      </div>
  </div>
</div>

@endsection

@section('scripts')

<script>
$(".other-role input[type=radio]").change(function() {
    if(this.checked) {
      $(".other-role label input").prop('required',true);
    }
});

$(".other-role label input").on('focus', function(){
  $('#other_role').prop("checked", true);
  $(this).prop('required',true);
});

$('input[name=speciality]:not("#other_role")').change(function(){
  $('.other-role label input').prop('required',false);
});
</script>

@endsection