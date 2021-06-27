@extends('employee.layouts.app')

@section('content')

<div class="container">

  <div class="row login-form justify-content-center">
    <div class="middle-box">
      <div>
        <div class="progress">
          <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
              aria-valuemin="0" aria-valuemax="79" style="width: 79%;">
              <span>79%</span>
          </div>
        </div>

        <div class="step well">

          <h2 class="bold h3 mb-4" data-wow-delay="0s">
            Where are you in your job search?
          </h2>

          <form method="POST" action="{{ route('employee_resume.build.job_search.store') }}">
            @csrf

            <ul class="unstyled centered onlyOneChecked">
              <li>
                <input class="styled-checkbox" id="job_search_1" name="job_search" type="radio" required 
                  value="Ready to interview" {{ "Ready to interview" == $resume->job_search ? 'checked' : '' }}>
                <label for="job_search_1"> Ready to interview </label>
              </li>
              <li>
                <input class="styled-checkbox" id="job_search_2" name="job_search" type="radio" required 
                  value="Open to exploring opportunities" {{ "Open to exploring opportunities" == $resume->job_search ? 'checked' : '' }}>
                <label for="job_search_2"> Open to exploring opportunities </label>
              </li>
              <li>
                <input class="styled-checkbox" id="job_search_3" name="job_search" type="radio" required 
                  value="Not currently looking" {{ "Not currently looking" == $resume->job_search ? 'checked' : '' }}>
                <label for="job_search_3"> Not currently looking </label>
              </li>
            </ul>

            <div class="text-center">
              <button type="submit" class="action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block">Next</button>
              <a href="{{route('employee_resume.build.certification')}}" class="action back btn btn-info mt-3" style="font-size: 12px;">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
