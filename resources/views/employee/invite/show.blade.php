@extends('employee.layouts.app')

@section('content')

<div class="container">
  <div class="row login-form justify-content-center">
    <div class="middle-box">
      <h1 class="bold h3 mb-2" data-wow-delay="0s">Get your friends a job </h1>
      <p>Invite friends to join Ibtikar Marketplace</p>
      
      <form method="POST" action="{{route('employee.invite.invitePost')}}">
        @csrf
        <div class="mb-1 row">
          <label class="col-sm-12 col-form-label text-left">Email</label>
          <div class="col-sm-12">
            <div class="input-group mb-3" >
              <input type="email" name="email" class="form-control" required value="{{old('email')}}">

              @error('email')
                <span class="invalid-feedback d-block" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        </div>

        <div class="mb-3 row">
          <div class="col-sm-12">
            <button type="submit" class="btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block" onclick="submitForm(this);">Send Email</button>
          </div>
        </div>
      </form>

      @if(session('success'))
        <div class="col-md-12 middlealertBox">
          <i class="mr-2 checkDone" data-feather="check"></i>
          <p>Your invitation has been sent</p>
        </div><!-- col-md-12 end-->
      @elseif(session('failed'))
        <div class="col-md-12 middlealertBox">
          <i class="mr-2 checkDone" data-feather="x"></i>
          <p>This email is already a member</p>
        </div><!-- col-md-12 end-->
      @endif
    </div>
  </div><!-- row end-->
</div>
<!--container end-->

@endsection

@section('scripts')
<script>
  function submitForm(btn) {
      // disable the button
      btn.disabled = true;
      // submit the form    
      btn.form.submit();
  }
</script>
@endsection