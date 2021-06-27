@extends('employee.layouts.app')

@section('styles')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css'>
@endsection

@section('content')

<div class="container">

  <div class="row login-form justify-content-center">
    <div class="middle-box">
      <div>
        <div class="progress">
          <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
              aria-valuemin="0" aria-valuemax="50" style="width: 50%;">
              <span>50%</span>
          </div>
        </div>

        <div class="step well">

          <h2 class="bold h3 mb-4" data-wow-delay="0s">
              What’s your educational background?
          </h2>

          <form method="POST" action="{{ route('employee_resume.build.education.update', ['education' => $education->id]) }}">
            @csrf

            <div class="row">
              <div class="col-md-12 mb-3">
                <label class="col-form-label">School</label>
                <input id="school" type="text" class="form-control" name="school" value="{{ old('school') ?? $education->school }}" required>

                @error('school')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div><!-- col-md-12 -->

              <div class="col-md-6  mb-3">
                <label class="col-form-label">Degree</label>
                <input id="degree" type="text" class="form-control" name="degree" value="{{ old('degree') ?? $education->degree }}" required>
      
                @error('degree')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div><!-- col-md-6 -->

              <div class="col-md-6  mb-3">
                <label class="col-form-label">Field of study</label>
                <input id="field_study" type="text" class="form-control" name="field_study" value="{{ old('field_study') ?? $education->field_study }}" required>

                @error('field_study')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div><!-- col-md-6 -->
            </div> <!-- row -->


            <div class="mb-3 row">
              <div class="col-md-6">
                  <label class="col-form-label">Stared</label>
                  <div class="form-group">
                      <div>
                          <div class="input-group date mb-3" data-date-format="dd.mm.yyyy">
                              <input id="start_date" type="text" class="form-control" name="start_date" placeholder="dd.mm.yyyy" 
                              value="{{ old('start_date') ?? $education->start_date }}" required>
                              <span class="input-group-addon input-group-text">
                                <i class="lnir lnir-calendar"></i>
                              </span>

                              @error('start_date')
                                  <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                  </div>
              </div><!-- col-md-6 -->

              <div class="col-md-6">
                  <label class="col-form-label">Ended</label>
                  <div class="form-group">
                      <div>
                          <div class="input-group date mb-3" data-date-format="dd.mm.yyyy">
                            <input id="end_date" type="text" class="form-control" name="end_date" placeholder="dd.mm.yyyy"
                            value="{{ old('end_date') ?? $education->end_date }}" required>
                            <span class="input-group-addon input-group-text">
                                <i class="lnir lnir-calendar"></i>
                            </span>
      
                            @error('end_date')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                      </div>
                  </div>
              </div><!-- col-md-6 -->
            </div>
            
            <div class="text-center">
              <button type="submit" class="action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block">Save</button>
              <a href="{{route('employee_resume.build.education')}}" class="action back btn btn-info mt-3" style="font-size: 12px;">{{ __('Cancel') }}</a>
            </div>
          </form>

          @if($delete_btn)
            <form action="{{ route('employee_resume.build.education.delete', ['education' => $education->id]) }}" method="post" 
              onsubmit="return confirm('Do you really want to delete this?');" class="mt-4">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger btn-block" style="font-size: 12px;">Delete</button>
            </form>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src='{{url('/')}}/employee/js/bootstrap-datepicker.min.js'></script>
<script>
$('.input-group.date').datepicker({ format: "dd.mm.yyyy", autoclose: true, endDate: new Date(new Date().setDate(new Date().getDate())) });
</script>
@endsection