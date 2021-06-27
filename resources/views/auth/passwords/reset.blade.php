@extends('employee.layouts.app')

@section('content')



<form method="POST" action="{{ route('password.update') }}">
  @csrf
  <input type="hidden" name="token" value="{{ $token }}">
  <div class="container">
    <div class="row align-items-center login-form">
      <div class="col-md-6 offset-md-1 order-md-2 text-center">
          <img src="{{url('/')}}/employee/images/team-1.svg" class="img-fluid teamImg" alt="" />
      </div>

      <div class="col-md-5  order-md-1">
        <h2 class="largeFont bold  wow fadeInUp animated h2" data-wow-delay="0s">
          Reset Password
        </h2>

        <input id="email" type="hidden" class="form-control" name="email" value="{{ old('email', $email) }}" required autocomplete="email">

        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-9">
            <input id="password" type="password" class="form-control" name="password" required>
            @error('password')
              <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Confirm Password</label>
          <div class="col-sm-9">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            @error('password_confirmation')
              <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="mb-3 row">
            <div class="col-sm-9 offset-sm-3">
                <button type="submit" class="btn btn-block btn-dark">
                  Reset Password
                </button>
            </div>
        </div>

      </div>
    </div><!-- row end-->
  </div>
  <!--container end-->
</form>

@endsection
