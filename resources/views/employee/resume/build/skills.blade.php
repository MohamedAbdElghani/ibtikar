@extends('employee.layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<style>
.unselectedItems ul li {
    padding: 0;
}
.opacity-0{
  opacity: 0;
  position: absolute;
}
.unselectedItems ul li label {
    padding: 2px 10px;
}
.bootstrap-select .dropdown-menu .inner.show {
    max-height: 200px !important;
}
.bootstrap-select > .dropdown-menu {
    transform: translate3d(0px, 46px, 0px) !important;
}
</style>
@endsection

@section('content')

<div class="container">

  <div class="row login-form justify-content-center">
    <div class="middle-box">
      <div>
        <div class="progress">
          <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
              aria-valuemin="0" aria-valuemax="100" style="width: 21%;">
              <span>21%</span>
          </div>
        </div>

        <div class="step well">

          <h2 class="bold h3 mb-4" data-wow-delay="0s">
            What are your Skills?
          </h2>

          <form method="POST" action="{{ route('employee_resume.build.skills.store') }}" id="candidate_form">
            @csrf

            <p>
              Highlight your top skills, languages, or frameworks.
            </p>

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
                  <li skill-id="{{$skill->id}}">
                    {{$skill->name}}
                    <i data-feather="x"></i>
                  </li>
                @endforeach
              </ul>
            </div><!-- selectedItems end -->

            @if(count($job_skills))
            <div class="unselectedItems mt-5">
              <p class="mb-0">Suggested skills</p>

              <ul>
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
            @endif

            <div class="form-group mt-5">
              <h2 class="bold h3 mb-4" data-wow-delay="0s">
                More Skills
              </h2>

              <input type="hidden" name="top_skills" value="{{ $resume->top_skills }}" />

              <input class="form-control" type="text" placeholder="(ex: flutter)" id="top_skills_input" maxlength="25" />
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

            <div class="text-center">
              <button type="submit" class="action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block">Next</button>
              <a href="{{route('employee_resume.build.primary_role')}}" class="action back btn btn-info mt-3" style="font-size: 12px;">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
$('.selectpicker').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
  var skill_id = $('.selectpicker option').eq(clickedIndex).val()
  if($('#employee_skill_'+skill_id).length){
    $('#employee_skill_'+skill_id).click();
  }else{
    if(isSelected){
      $('#selectedItems').append('<li skill-id="'+skill_id+'">'+$('.selectpicker option').eq(clickedIndex).text()+'<svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></li>');
    }else{
      $('li[skill-id='+skill_id+']').remove();
    }
  }
  removeSelectedMainItems();
  $('.selectpicker').selectpicker('render');
});






$(".checkbox").change(function() {
  if(this.checked) {
    $(this).closest('li').addClass('selected');
    $('#selectedItems').append('<li skill-id="'+$(this).val()+'">'+$(this).closest('li').text()+'<svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></li>');
    $('.selectpicker option[value='+$(this).val()+']').prop('selected', true);
    $('.selectpicker').selectpicker('render');
    removeSelectedMainItems();
  }else{
    $(this).closest('li').removeClass('selected');
    $('li[skill-id='+$(this).val()+']').remove();
    $('.selectpicker option[value='+$(this).val()+']').removeAttr("selected");
    $('.selectpicker').selectpicker('render');
  }
});

function removeSelectedMainItems(){
  $('#selectedItems li').on('click', function(){
    $(this).remove();
    var skill_id = $(this).attr('skill-id');
    $('#employee_skill_'+skill_id).prop( "checked", false );
    $('#employee_skill_'+skill_id).closest('li').removeClass('selected');
    $('.selectpicker option[value='+skill_id+']').removeAttr("selected");
    $('.selectpicker').selectpicker('render');
  });
}
removeSelectedMainItems();






function removeSelectedItems(){
  $('#selected_items li').click(function(){
    $("#most_used li:contains('"+$(this).text()+"')").removeClass('selected');
    var text_val = $('input[name=top_skills]').val();
    text_val = text_val.replace($(this).text()+", ", "");
    text_val = text_val.replace(", "+$(this).text(), "");
    text_val = text_val.replace($(this).text(), "");
    $('input[name=top_skills]').val(text_val);
    $(this).remove();
  });
}
removeSelectedItems();

$('form input').keydown(function (e) {
  if (e.keyCode == 13 && $(this).attr('id') == 'top_skills_input' && $(this).val() != '' ) {
    if($('input[name=top_skills]').val()){
      $('input[name=top_skills]').val($('input[name=top_skills]').val() + ', ' + $(this).val());
    }else{
      $('input[name=top_skills]').val($(this).val());
    }
    $('#selected_items').append('<li>'+$(this).val()+'<svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></li>');
    $("#most_used li:contains('"+$(this).val()+"')").addClass('selected');
    $(this).val('');
    removeSelectedItems();
    e.preventDefault();
    return false;
  }else if(e.keyCode == 13){
    e.preventDefault();
    return false;
  }
});
</script>
@endsection