@extends('employee.layouts.app')

@section('content')

<div class="container">

  <div class="row login-form justify-content-center">
      <div class="middle-box">
          <div>
              <div class="progress">
                <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
                    aria-valuemin="0" aria-valuemax="100" style="width: 29%;">
                    <span>29%</span>
                </div>
              </div>

              <div class="step well">

                <h2 class="bold h3 mb-4" data-wow-delay="0s">
                  How long have you been working as a {{$role->name == 'Other' ? $resume->other_role : $role->name}}?
                </h2>

                <form method="POST" action="{{ route('employee_resume.build.primary_role_experience.store') }}">
                  @csrf

                  <ul class="unstyled centered onlyOneChecked">
                    
                    @foreach ($experiences as $experience)
                    <li>
                      <input class="styled-checkbox" type="radio" name="how_long" id="how_long_{{$experience->id}}" value="{{$experience->id}}" required
                      {{ $selected_experience_id == $experience->id ? 'checked' : '' }}>
                      <label for="how_long_{{$experience->id}}">{{$experience->name}}</label>
                    </li>
                  @endforeach

                        
                </ul>

                <div class="text-center">
                  <button type="submit" class="action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block">Next</button>
                  <a href="{{route('employee_resume.build.skills')}}" class="action back btn btn-info mt-3" style="font-size: 12px;">Back</a>
                </div>
                </form>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection
