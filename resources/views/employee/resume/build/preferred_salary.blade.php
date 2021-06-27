@extends('employee.layouts.app')

@section('content')

<div class="container">

  <div class="row login-form justify-content-center">
    <div class="middle-box">
      <div>
        <div class="progress">
          <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
              aria-valuemin="0" aria-valuemax="86" style="width: 86%;">
              <span>86%</span>
          </div>
        </div>

        <div class="step well">

          <h1 class="bold h3 mb-4" data-wow-delay="0s">
            Preferred Salary
          </h1>

          <form method="POST" action="{{ route('employee_resume.build.preferred_salary.store') }}">
            @csrf

            <div class="mb-3 row">
              <label class="col-sm-12 col-form-label">Salary/Month</label>
              <div class="col-sm-12">
                <div class="input-group">
                  <input type="number" class="form-control" placeholder="Number" value="{{old('min_base_salary') ?? $resume->min_base_salary}}"
                    id="min_base_salary" name="min_base_salary" required min="1">
                  <span class="input-group-text" id="basic-addon2">$</span>
                  @error('min_base_salary')
                    <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block">Next</button>
              <a href="{{route('employee_resume.build.job_search')}}" class="action back btn btn-info mt-3" style="font-size: 12px;">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
