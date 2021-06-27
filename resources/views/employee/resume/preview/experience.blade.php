<div class="row">

  <div class="col-md-12 profileRightSide">
      <div class="d-flex mb-4 align-items-center">
        <h4 class="headingstyle"> Experience</h4>
        <a class="editLink uploadCv ml-auto blue-btn d-flex align-items-center show-exp-form">
          <i class="lnir lnir-circle-plus"></i>
          Add New
        </a>
      </div>

      <ul class="jobsList" id="experience_work_list">
        @foreach ($work_histories as $work)
          @php
            $started_year = strtotime($work->started_year);
            $started_year = date('Y',$started_year);
            $ended_year = strtotime($work->ended_year);
            $ended_year = date('Y',$ended_year);
          @endphp
          <li id="work_id_{{$work->id}}">
            <div>
              <h6 class="mb-0 company">{{$work->company}}</h6>
              <span class="blueText work-title">{{$work->title}}</span>
              <p class="hintText mb-0"><span class="started_year">{{$started_year}}</span> - 
                <span class="{{$work->currently_work_here ? 'h5' : ''}} ended_year">
                  {{$work->currently_work_here ? 'Present' : $ended_year}}</span></p>
              <p class="hintText accomplishment">{{$work->accomplishment}}</p>
            </div>
            <a class="editLink ml-auto show-exp-form text-right" 
            work_company="{{$work->company}}" work_title="{{$work->title}}" started_year="{{$work->started_year}}"
            ended_year="{{$work->ended_year}}" accomplishment="{{$work->accomplishment}}" whsid="{{$work->id}}">
              <i class="lnir lnir-chevron-right"></i>
            </a>
          </li>
        @endforeach
      </ul>

  </div><!-- step 6-->

</div><!-- row end -->

<div class="editBox show-exp-form-box" style="display:none">
  <h5 class="mb-4" id="edit_experience_title">Edit Experience</h5>

  <form method="post" class="delete-form-multiple" id="delete_experience">
    @method('DELETE')
    @csrf
    <input type="hidden" id="delete_wxid" name="delete_wxid">
    <button type="submit" class="btn" style="color: #0095ff;"><i data-feather="trash-2"></i></button>
  </form>

  <form method="POST" id="edit_experience_form">
    @csrf

    <input type="hidden" id="wxid" name="wxid">
    <div class="mb-3 row">
      <div class="col-md-6">
        <label class="col-form-label">Title</label>
        <input id="title" type="text" class="form-control" name="title" required>
      </div><!-- col-md-6 -->

      <div class="col-md-6">
        <label class="col-form-label">Company</label>
        <input id="company" type="text" class="form-control" name="company" required>
      </div><!-- col-md-6 -->
    </div>

    <div class="form-check">
      <input id="currently_work_here" class="form-check-input" type="checkbox" name="currently_work_here" value="1">
      <label class="form-check-label" for="currently_work_here">
        I currently work here
      </label>
    </div>

    <div class="mb-3 row">
      <div class="col-md-6">
        <label class="col-form-label">Stared</label>
        <div class="form-group">
          <div>
            <div class="input-group date mb-3" data-date-format="dd.mm.yyyy">
              <input type="text" class="form-control" placeholder="dd.mm.yyyy" name="started_year" id="started_year" required>
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
              <input type="text" class="form-control" placeholder="dd.mm.yyyy" name="ended_year" id="ended_year" required>
              <span class="input-group-addon input-group-text">
                <i class="lnir lnir-calendar"></i>
              </span>
              <span class="invalid-feedback d-block ended_year_error" role="alert"></span>
            </div>
          </div>
        </div>
      </div><!-- col-md-6 -->
    </div>

    <div class="mb-3 row">
      <label class="col-12 col-form-label">Describe your accomplishments in this role *</label>
      <div class="col-md-12">
        <textarea id="accomplishment" name="accomplishment" class="form-control" required rows="3"></textarea>
      </div><!-- col-md-12 -->
    </div><!-- row -->

    <div class="row">
      <div class="col-md-12 mt-4">
        <button type="submit" class="btn btn-bp btn-dark">Save</button>
        <a class="btn btn-bp btn-cancel close-exp-form">Cancel</a>
      </div><!-- col-md-12 end-->
    </div><!-- row end-->

    <div class="form-group text-center my-4 w-100">
      <span class="text-success" id="experience_success_message"></span>
    </div>
  </form>
</div><!-- editBox end -->