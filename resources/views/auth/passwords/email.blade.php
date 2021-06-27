@extends('employee.layouts.app')

@section('content')
<div class="container">
  <div class="row align-items-center login-form">
    <div class="col-md-6 offset-md-1 order-md-2 text-center">
        <img src="{{url('/')}}/employee/images/team-1.svg" class="img-fluid teamImg" alt="" />
    </div>

    <div class="col-md-5  order-md-1">
      <h2 class="largeFont bold  wow fadeInUp animated h2" data-wow-delay="0s">
        Reset Password
      </h2>

      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

      <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3 row">
          <label class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
              <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="mb-3 row">
          <div class="col-sm-9 offset-sm-3">
              <button type="submit" class="btn btn-block btn-dark">
                Send Password Reset Link
              </button>
          </div>
        </div>
    </form>
    </div>
  </div><!-- row end-->
</div>
<!--container end-->
@endsection
