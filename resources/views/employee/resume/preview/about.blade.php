<div class="row">
  <div class="col-md-12 profileRightSide">
    <div class="d-flex mb-4 align-items-center">
      <h4 class="headingstyle"> About Me</h4>
      <a class="editLink uploadCv ml-auto blue-btn d-flex align-items-center" id="show-about-form">Edit</a>
    </div>
    <p class="font-12 mt-4" id="describe_yourself_text">{{$user->describe_yourself}}</p>
  </div>
</div>



<div class="editBox show-about-form" style="display:none">
  <form id="ajax_about_edit">
    @csrf
    <h5 class="mb-4">Edit About</h5>
    <div class="row">
      <div class="col-md-12 mb-3">
        <label class="col-form-label">About</label>
        <textarea class="form-control" rows="8" name="describe_yourself" required>{{$user->describe_yourself}}</textarea>
        <span class="invalid-feedback d-block" role="alert" id="describe_yourself_error"></span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mt-4">
        <button type="submit" class="btn btn-bp btn-dark">Save</button>
        <a class="btn btn-bp btn-cancel close-about-form">Cancel</a>
      </div>
    </div>
    <div class="form-group text-center my-4 w-100">
      <span class="text-success" id="about_success_message"> </span>
    </div>
  </form>
</div><!-- editBox end-->