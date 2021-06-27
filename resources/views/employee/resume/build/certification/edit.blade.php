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
              aria-valuemin="0" aria-valuemax="64" style="width: 64%;">
              <span>64%</span>
          </div>
        </div>

        <div class="step well">

          <h2 class="bold h3 mb-4" data-wow-delay="0s">
            Add your certificates
          </h2>

          <form method="POST" action="{{ route('employee_resume.build.certification.update', ['certification' => $certification->id]) }}">
            @csrf

            <div class="mb-3 row">
              <div class="col-md-6">
                <label class="col-form-label">Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?? $certification->name }}" required>

                @error('name')
                  <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div><!-- col-md-6 -->

              <div class="col-md-6">
                <label class="col-form-label">Issuing Organization</label>
                <input id="issuing_organization" type="text" class="form-control" name="issuing_organization" 
                value="{{ old('issuing_organization') ?? $certification->name }}" required>

                @error('issuing_organization')
                  <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div><!-- col-md-6 -->
            </div>

            <div class="mb-3 row">
              <div class="col-md-6">
                <label class="col-form-label">Issue Date</label>
                <div class="form-group">
                  <div>
                    <div class="input-group date date-issue mb-3" data-date-format="dd.mm.yyyy">
                      <input id="issue_date" type="text" class="form-control" name="issue_date" placeholder="dd.mm.yyyy"
                      value="{{ old('issue_date') ?? $certification->issue_date }}" required>
                      <span class="input-group-addon input-group-text">
                        <i class="lnir lnir-calendar"></i>
                      </span>

                      @error('issue_date')
                        <span class="invalid-feedback d-block" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <label class="col-form-label">Expiration Date</label>
                <div class="form-group">
                  <div>
                    <div class="input-group date date-expiration mb-3" data-date-format="dd.mm.yyyy">
                      <input id="expiration_date" type="text" class="form-control" name="expiration_date" placeholder="dd.mm.yyyy"
                        value="{{ old('expiration_date') ?? $certification->expiration_date }}" required>
                        <span class="input-group-addon input-group-text">
                          <i class="lnir lnir-calendar"></i>
                        </span>

                        @error('expiration_date')
                          <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="never_expired">
              <label class="form-check-label" for="never_expired">
                This credential does not expire
              </label>
            </div>

            <div class="row">
              <div class="col-md-12 mb-3">
                <label class="col-form-label">Credential ID</label>
                <input id="credential_id" type="text" class="form-control" name="credential_id" 
                value="{{ old('credential_id') ?? $certification->credential_id }}">

                @error('credential_id')
                  <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div><!-- col-md-12 -->

              <div class="col-md-12 mb-3">
                <label class="col-form-label">Credential URL</label>
                <input id="credential_url" type="url" class="form-control" name="credential_url" 
                value="{{ old('credential_url') ?? $certification->credential_url }}">

                @error('credential_url')
                  <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div><!-- col-md-12 -->
            </div>

          </div><!-- row -->

          <div class="text-center">
            <button type="submit" class="action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block">Save</button>
            <a href="{{route('employee_resume.build.certification')}}" class="action back btn btn-info mt-3" style="font-size: 12px;">{{ __('Cancel') }}</a>
          </div>
        </form>

        <form action="{{ route('employee_resume.build.certification.delete', ['certification' => $certification->id]) }}" method="post" 
          onsubmit="return confirm('Do you really want to delete this?');" class="mt-4">
          @method('DELETE')
          @csrf
          <button class="btn btn-danger btn-block" style="font-size: 12px;">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection


@section('scripts')
<script src='{{url('/')}}/employee/js/bootstrap-datepicker.min.js'></script>
@if(!$certification->expiration_date)
<script>
$('[name=expiration_date]').val('');
$('[name=expiration_date]').prop('disabled', 'disabled');
</script>
@endif
<script>
$('.input-group.date-issue').datepicker({ format: "dd.mm.yyyy", autoclose: true, endDate: new Date(new Date().setDate(new Date().getDate())) });
$('.input-group.date-expiration').datepicker({ format: "dd.mm.yyyy", autoclose: true });

$("#never_expired").change(function() {
    if(this.checked) {
      $('[name=expiration_date]').val('');
      $('[name=expiration_date]').prop('disabled', 'disabled');
    }else{
      $('[name=expiration_date]').prop('disabled', false);
    }
});
</script>
@endsection