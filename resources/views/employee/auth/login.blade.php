@extends('employee.layouts.app')

@section('content')

<form method="POST" action="{{ route('login') }}">
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
            Login
        </h5>

        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
            
          </div>
        </div>

        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-9">
            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
            @error('email')
              <span class="invalid-feedback d-block" role="alert">
                <strong>Wrong email or password</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="mb-3 row">
          <div class="col-sm-3"></div>
          <div class="col-sm-9">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">Remember Me</label>
          </div>
        </div>

        <div class="mb-3 row">
            <div class="col-sm-9 offset-sm-3">
                <button type="submit" class="btn btn-block btn-dark">
                    Sign In
                </button>
            </div>
        </div>

        <div class="mb-3 row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-6 col-sm-5 offset-sm-3 text-left">
                      Don't have an account <br> <a href="{{route('register')}}">Sign up</a>
                    </div>

                    @if (Route::has('password.request'))
                      <div class="col-6 col-sm-4 text-right">
                        <a href="{{ route('password.request') }}">Forget Password ?</a>
                      </div>
                    @endif
                    
                </div>
            </div>
        </div>
      </div>
    </div><!-- row end-->
  </div>
  <!--container end-->
</form>

@endsection
