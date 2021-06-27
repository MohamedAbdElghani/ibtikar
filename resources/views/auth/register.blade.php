@extends('employee.layouts.app')

@section('content')

<form method="POST" action="{{ route('register') }}">
@csrf
  <div class="container">

    <div class="row align-items-center login-form">

      <div class="col-md-6 offset-md-1 order-md-2 text-center">
          <img src="{{url('/')}}/employee/images/team-1.svg" class="img-fluid teamImg" alt="" />
      </div>

      <div class="col-md-5  order-md-1">
        <h2 class="largeFont bold  wow fadeInUp animated h2" data-wow-delay="0s">
            Digitize like an Ibtikarian!
        </h2>

        <h5 class="mt-4">
            Sign Up
        </h5>

        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Name</label>
          <div class="col-sm-9">
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

            @error('name')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

              @error('email')
                  <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
        </div>

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
          <label class="col-sm-3 col-form-label">Repeat Password</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" name="password_confirmation" required>
          </div>
        </div>

        <div class="mb-3 row">
            <div class="col-sm-9 offset-sm-3">
                <button type="submit" class="btn btn-block btn-dark">
                    Sign Up
                </button>
            </div>
        </div>

        <div class="mb-3 row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-12 col-sm-5 offset-sm-3 text-left">
                  Already member? <a href="{{route('employee_profile.showLoginForm')}}">Sign In</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- row end-->
  </div>
  <!--container end-->
</form>

@endsection
