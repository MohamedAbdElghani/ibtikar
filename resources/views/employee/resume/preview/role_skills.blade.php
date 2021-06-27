<div class="row">

  {{--  Mobile profile image  --}}
  <div class="col-12 user-uploadImg d-block d-lg-none">
    <div class="user-image">
      <img src="{{ $user->feature_image ? url('/').'/storage/'.$user->feature_image : '/images/user-big.png' }}" 
          class="uploadUser" alt="user" />
      <a data-fancybox data-src="#hidden-content" href="javascript:;" class="cameraIcon"> 
        <img src="{{url('/')}}/images/camera.svg" alt="" />
      </a>
    </div>
  </div>


  <div class="col-12 col-lg-7 profileRightSide">
                                                  
    <div class="d-flex">
      <h1 class="h2 mb-0" id="name_text">{{ $user->name }}</h1>
      <a class="editLink ml-auto blue-btn" id="show-intro-edit"> Edit </a>
    </div>
    <h6 class="blueText lightText"> <span id="current_role_text">{{$current_role == 'Other' ? $resume->other_role : $current_role}}</span>
      <span id="how_long_text">{{$how_long}}</span> of experience</h6>
    <h6 class="mb-0 mt-4 icons18">
      <i data-feather="dollar-sign"></i>
      Prefered salary <span class="lightText ml-2"> $<span id="min_base_salary_text">{{$resume->min_base_salary}}</span> / Month </span>
    </h6>
    <h6 class="mb-0 mt-2 icons18">
      <i data-feather="clock"></i>
      Status <span class="lightText ml-2" id="job_search_text"> {{$resume->job_search}}</span>
    </h6>

    {{--  Mobile video upload  --}}
    <div class="d-block d-lg-none">
      <div class="uploadVideo d-flex mt-4">
        <a data-toggle="modal" data-target="#video-edit"><img  src="{{url('/')}}/employee/images/video.svg"/></a>
        <div class="ml-3">
          <h5 class="mb-0">Know me more</h5>
          <a class="editLink ml-auto blue-btn" data-toggle="modal" data-target="#video-upload" > Upload your video </a>
        </div>
      </div><!-- video uploadVideo-->
    </div><!-- col-md-3 end-->

  </div><!-- col-lg-8 col-md-6 end-->

  <div class="col-lg-5 profileRightSide">
      <div class="d-flex">
          <h5 class="mb-4"> Skills</h5>
          <a class="editLink ml-auto blue-btn" id="show-skills-edit"> Edit </a>
      </div>

      <div class="selectedItems blueTags">
          <ul id="selected_skills_list">
              @foreach ($selected_skills as $skill)
                @if(\App\EmployeeSkill::find($skill))
                  <li>{{ \App\EmployeeSkill::find($skill)->name}}</li>
                @endif
              @endforeach

              @php 
                  $explode_tec = explode(',', trim($resume->top_skills)); 
                  $trim_tec = array();
                  foreach ($explode_tec as $tec) {
                      array_push($trim_tec, trim($tec));
                  }
              @endphp
              @foreach($trim_tec as $tec)
                  @if(!empty($tec))
                      <li>{{ trim($tec) }}</li>
                  @endif
              @endforeach
          </ul>
      </div>

  </div><!-- col-lg-4 col-md-6 end-->

</div><!-- row end-->

{{------------------------ edit ---------------------------}}
<div class="editBox show-intro-edit" style="display:none">
  <h5 class="mb-4">Edit Intro</h5>

  <form id="ajax_intro_form">
    @csrf
    <div class="row">
      <div class="col-md-4 mb-3">
        <label class="col-form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
        <span class="invalid-feedback d-block" role="alert" id="name_error"></span>
      </div>
      <div class="col-md-4 mb-3">
        <label class="col-form-label">Role</label>
        <select class="custom-select" id="speciality" name="speciality" value="{{$current_role_id}}" required>
          @foreach ($job_roles as $role)
            <option value="{{$role->id}}" {{ $current_role_id == $role->id ? 'selected' : '' }}>{{$role->name}}</option>
          @endforeach
          @if($other_role)
            <option value="{{$other_role->id}}" {{ $current_role_id == $other_role->id ? 'selected' : '' }}>Other</option>
          @endif
        </select>
        <span class="invalid-feedback d-block" role="alert" id="speciality_error"></span>
        <div class="other-role-container" style="display: none">
          <label class="col-form-label">Type your other role</label>
            <input type="text" class="form-control" placeholder="Other" value="{{$resume->other_role}}"
              id="other_role" name="other_role">
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label class="col-form-label">Years of Experience</label>
        <select class="custom-select" id="how_long" name="how_long" value="{{$how_long_id}}" required>
          @foreach ($experiences as $experience)
            <option value="{{$experience->id}}" {{ $how_long_id == $experience->id ? 'selected' : '' }}>{{$experience->name}}</option>
          @endforeach
        </select>
        <span class="invalid-feedback d-block" role="alert" id="how_long_error"></span>
      </div>

      <div class="col-md-12 mb-3">
        <label class="col-form-label">Prefered salary per Month</label>
        <div class="input-group">
          <input type="number" class="form-control" placeholder="Number" value="{{$resume->min_base_salary}}"
            id="min_base_salary" name="min_base_salary" required>
          <span class="input-group-text" id="basic-addon2">$</span>
          <span class="invalid-feedback d-block" role="alert" id="min_base_salary_error"></span>
        </div>
      </div>

      <div class="col-md-12 mb-3 mt-2">
        <h5 class="bold mb-4">Where are you in your job search?</h5>

        <ul class="unstyled centered onlyOneChecked">
          <li>
            <input class="styled-checkbox" id="job_search_1" name="job_search" type="radio" required 
              value="Ready to interview" {{ "Ready to interview" == $resume->job_search ? 'checked' : '' }}>
            <label for="job_search_1"> Ready to interview </label>
          </li>
          <li>
            <input class="styled-checkbox" id="job_search_2" name="job_search" type="radio" required 
              value="Open to exploring opportunities" {{ "Open to exploring opportunities" == $resume->job_search ? 'checked' : '' }}>
            <label for="job_search_2"> Open to exploring opportunities </label>
          </li>
          <li>
            <input class="styled-checkbox" id="job_search_3" name="job_search" type="radio" required 
              value="Not currently looking" {{ "Not currently looking" == $resume->job_search ? 'checked' : '' }}>
            <label for="job_search_3"> Not currently looking </label>
          </li>
        </ul>
        <span class="invalid-feedback d-block" role="alert" id="job_search_error"></span>
      </div>

      <div class="col-md-12 mt-4">
        <button type="submit" class="btn btn-bp btn-dark">Save</button>
        <a class="btn btn-bp btn-cancel close-edit-intro">Cancel</a>
      </div>

      <div class="form-group text-center my-4 w-100">
        <span class="text-success" id="intro_success_message"></span>
      </div>
    </div>
  </form>
</div><!-- editBox end-->

{{-- edit skills --}}
<div class="editBox show-skills-edit" style="display:none">
  <h5 class="mb-4">Edit skills</h5>

  <div class="row">
    <div class="col-md-12">
      <p>What are your skills ?</p>
      
      <form method="POST" id="ajax_skills_form">
        @csrf
        <div>
          <select class="selectpicker form-control" multiple data-live-search="true" name="employee_skill_id[]" id="employee_skill_id" required>
            @foreach ($all_skills as $skill)
                <option value="{{$skill->id}}" required
                  {{ $selected_skills && in_array($skill->id, $selected_skills) ? 'selected' : '' }}>
                  {{$skill->name}}
                </option>
            @endforeach
          </select>
        </div>

        <div class="selectedItems mt-4">
          <ul id="selectedItems">
            @foreach ($selected_skills as $skill_id)
              @php
                $skill = \App\EmployeeSkill::find($skill_id);
              @endphp
              @if($skill)
              <li skill-id="{{$skill->id}}">
                {{$skill->name}}
                <i data-feather="x"></i>
              </li>
              @endif
            @endforeach
          </ul>
        </div><!-- selectedItems end -->

        
        <div class="unselectedItems mt-3" @if(!count($job_skills)) style="display: none" @endif>
          <p class="mb-0">Suggested skills</p>

          <ul id="suggested_skills_list">
            @foreach ($job_skills as $skill)
              <li class="{{ $selected_skills && in_array($skill->id, $selected_skills) ? 'selected' : '' }}">
                <label class="mb-0" for="employee_skill_{{$skill->id}}">
                  <i data-feather="plus"></i>
                  <input type="checkbox" class="opacity-0 checkbox main-skills-checkbox" value="{{$skill->id}}"
                      id="employee_skill_{{$skill->id}}"
                      {{ $selected_skills && in_array($skill->id, $selected_skills) ? 'checked' : '' }}>
                  {{$skill->name}}
                </label>
              </li>
            @endforeach
          </ul>
        </div><!-- selectedItems end -->
        

        <div class="form-group mt-3">
          <h2 class="bold h3 mb-2" data-wow-delay="0s">More Skills</h2>
          <input type="hidden" name="top_skills" value="{{ $resume->top_skills }}" />
          <input class="form-control" type="text" placeholder="(ex: flutter)" id="top_skills_input" />
          <p>If you couldn't find a skill in the suggested skills list, please type the skill name and press Enter</p>
        </div>

        <div class="selectedItems">
          <ul id="selected_items">
            @php 
              $explode_tec = explode(',', trim($resume->top_skills)); 
              $trim_tec = array();
              foreach ($explode_tec as $tec) {
                  array_push($trim_tec, trim($tec));
              }
            @endphp
            @foreach($trim_tec as $tec)
              @if(!empty($tec))
                <li>{{ trim($tec) }}<svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></li>
              @endif
            @endforeach
          </ul>
        </div><!-- selectedItems end -->

        <div class="mt-4">
          <button type="submit" class="btn btn-bp btn-dark">Save</button>
          <a class="btn btn-bp btn-cancel close-edit-skills">Cancel</a>
        </div>
      </form>
      <div class="form-group text-center my-4 w-100">
        <span class="text-success" id="skills_success_message"></span>
      </div>
    </div>
  </div>
</div><!-- editBox end-->