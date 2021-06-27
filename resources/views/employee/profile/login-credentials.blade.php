@extends('employee.layouts.app')

@section('styles')
<style>
.modal-popup {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 120px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal-popup-content {
    background-color: #fff;
    margin: auto;
    padding: 40px;
    border: 1px solid #888;
    max-width: 600px;
    text-align: left;
    position: relative;
}
.close {
    color: #000;
    float: right;
    font-size: 28px;
    font-weight: bold;
    position: absolute;
    right: 20px;
    top: 15px;
}
.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
@endsection

@section('content')

<div class="container">
  <div class="row login-form justify-content-center">
    <div class="middle-box">
      @if(session('status'))
      <div class="alert alert-success mb-3" role="alert">
        <div class="text-center">
          {{ session('status') }}
        </div>
      </div>
      @endif

      <h1 class="bold h3 mb-5" data-wow-delay="0s">
          Log in credentials
      </h1>

      <form method="POST" action="{{ route('employee_profile.loginCredintialsUpdate') }}" autocomplete="off">
        @csrf

        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input id="email" type="email" class="form-control" name="email" 
                  value="{{ old('email') ?? $user->email }}" required>
                  
              @error('email')
                  <span class="invalid-feedback d-block" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
        </div>
        
        <div class="mb-1 row">
          <label class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-9">
            <input id="new_password" type="password" class="form-control" name="new_password" placeholder="*********"
              value="{{old('new_password')}}" autocomplete="off">
            @error('new_password')
            <span class="invalid-feedback d-block" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="mb-3 row">
          <div class="col-sm-12">
              <div class="row">
                  <div class="col-9 offset-sm-3 text-left ">
                      <ul class="hintUl">
                          <li>
                              Your password must be 8 or more characters
                          </li>
                      </ul> 
                  </div>
              </div>
          </div>
        </div>

        <div class="mb-3 row">
            <div class="col-sm-9 offset-sm-3">
                {{--  <button type="submit" class="btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block">
                    Save Changes
                </button>  --}}
              <a id="myBtn" href="javascript:;" class="btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block">
                Save Changes
              </a>
            </div>
        </div>

        <div id="myModal" class="modal-popup" @if(session('error')) style="display: block;" @endif>
          <div class="modal-popup-content">
            <span class="close">&times;</span>
            <h2>Verify it’s you.</h2>
            <p>In order to update your password or email, please verify it’s you by re-entering your password.</p>
            <div class="mb-1">
              <h5>Enter your old password:</h5>
                <input id="password" type="password" class="form-control" name="password" placeholder="*********" required>
                @if(session('error'))
                  <span class="invalid-feedback d-block" role="alert">
                    <strong>{{session('error')}}</strong>
                  </span>
                @endif
                @error('password')
                <span class="invalid-feedback d-block" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="text-center mt-3">
              <button type="submit" class="btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block">
                Update
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div><!-- row end-->
</div>

@endsection

@section('scripts')
<script>
  // Get the modal
  var modal = document.getElementById("myModal");
  
  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");
  
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];
  
  // When the user clicks the button, open the modal 
  btn.onclick = function() {
    modal.style.display = "block";
  }
  
  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>
@endsection
