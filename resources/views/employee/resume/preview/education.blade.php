<div class="row">
  <div class="col-md-12 profileRightSide">

    <div class="d-flex mb-4 align-items-center">
      <h4 class="headingstyle"> Education</h4>
      <a class="editLink uploadCv ml-auto blue-btn d-flex align-items-center show-edu-form">
        <i class="lnir lnir-circle-plus"></i>
        Add New
      </a>
    </div>

    <ul class="jobsList" id="education_list">
      @foreach ($educations as $education)
        <li id="education_id_{{$education->id}}">
          <div>
            <h6 class="mb-0 school">{{$education->school}}</h6>
            <span class="education-degree">{{$education->degree}}</span>
            <p class="hintText">
              <span class="start_date">{{$education->start_date}}</span> - 
              <span class="end_date">{{$education->end_date}}</span>
            </p>
          </div>
          <a class="editLink ml-auto show-edu-form text-right" school="{{$education->school}}" eduid="{{$education->id}}"
            degree="{{$education->degree}}" start_date="{{$education->start_date}}" end_date="{{$education->end_date}}" 
            field_study="{{$education->field_study}}">
            <i class="lnir lnir-chevron-right"></i>
          </a>
        </li>
      @endforeach
    </ul>
  </div><!-- step 6-->
</div><!-- row end -->

<div class="editBox show-edu-form-box" style="display:none">
  <h5 class="mb-4" id="edit_education_title">Edit Education</h5>

  <form method="post" class="delete-form-multiple" id="delete_education">
    @method('DELETE')
    @csrf
    <input type="hidden" id="delete_eduid" name="delete_eduid">
    <button type="submit" class="btn" style="color: #0095ff;"><i data-feather="trash-2"></i></button>
  </form>

  <form method="POST" id="edit_education_form">
    @csrf
    <input type="hidden" id="eduid" name="eduid">
    <div class="row">
      <div class="col-md-12 mb-3">
        <label class="col-form-label">School</label>
        <input id="school" type="text" class="form-control" name="school" required>
      </div><!-- col-md-12 -->

      <div class="col-md-6  mb-3">
        <label class="col-form-label">Degree</label>
        <input id="degree" type="text" class="form-control" name="degree" required>
      </div><!-- col-md-6 -->

      <div class="col-md-6  mb-3">
        <label class="col-form-label">Field of study</label>
        <input id="field_study" type="text" class="form-control" name="field_study" required>
      </div><!-- col-md-6 -->

      <div class="col-md-6">
        <label class="col-form-label">Stared</label>
        <div class="form-group">
          <div>
            <div class="input-group date mb-3" data-date-format="dd.mm.yyyy">
              <input id="start_date" type="text" class="form-control" name="start_date" placeholder="dd.mm.yyyy" required>
              <span class="input-group-addon input-group-text">
                <i class="lnir lnir-calendar"></i>
              </span>
            </div>
          </div>
        </div>
      </div><!-- col-md-6 -->

      <div class="col-md-6">
        <label class="col-form-label">Ended</label>
        <div class="form-group">
          <div>
            <div class="input-group date mb-3" data-date-format="dd.mm.yyyy">
              <input id="end_date" type="text" class="form-control" name="end_date" placeholder="dd.mm.yyyy" required>
              <span class="input-group-addon input-group-text">
                <i class="lnir lnir-calendar"></i>
              </span>
              <span class="invalid-feedback d-block end_date_error" role="alert"></span>
            </div>
          </div>
        </div>
      </div><!-- col-md-6 -->
    </div> <!-- row -->
    
    <div class="row">
      <div class="col-md-12 mt-4">
        <button type="submit" class="btn btn-bp btn-dark">Save</button>
        <a class="btn btn-bp btn-cancel close-edu-form">Cancel</a>
      </div><!-- col-md-12 end-->
    </div><!-- row end-->

    <div class="form-group text-center my-4 w-100">
      <span class="text-success" id="education_success_message"></span>
    </div>
  </form>
</div><!-- editBox end-->