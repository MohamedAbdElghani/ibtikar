@extends('employee.layouts.app')

@section('content')

<div class="container">
  <div class="row align-items-center login-form">
    <div class="col-md-6 offset-md-1 order-md-2 text-center">
        <img src="{{url('/')}}/employee/images/team-1.svg" class="img-fluid teamImg" alt="" />
    </div>

    <div class="col-md-5  order-md-1">
      <h2 class="largeFont bold  wow fadeInUp animated h2" data-wow-delay="0s">
        Verify Your Email Address
      </h2>

      @if (session('resent'))
          <div class="alert alert-success" role="alert">
              {{ __('A fresh verification link has been sent to your email address.') }}
          </div>
      @endif

      {{ __('Before proceeding, please check your email for a verification link.') }}
      {{ __('If you did not receive the email') }},
      <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
          @csrf
          <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
      </form>
    </div>
  </div><!-- row end-->
</div>
<!--container end-->
@endsection