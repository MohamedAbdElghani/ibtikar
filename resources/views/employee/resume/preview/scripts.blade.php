<script>
$(document).ready(function () {

////////////////////////// dropzone profile image function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
Dropzone.options.dropzoneFormProfileImage = {
  autoProcessQueue : false,
  acceptedFiles : ".png,.jpg,.jpeg",
  maxFiles: 1,
  maxFilesize: 2,
  addRemoveLinks: true,

  init:function(){
    var submitButton = document.querySelector("#submit_profile_image");
    dropzoneFormProfileImage = this;

    submitButton.addEventListener('click', function(){
      dropzoneFormProfileImage.processQueue();
    });

    this.on("success", function(file, success){
      $('.user-image > img').attr('src', success.success);
      if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
      {
        var _this = this;
        _this.removeAllFiles();
      }
      $.fancybox.close();
    });
  }
};
////////////////////////// end dropzone profile image function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\




////////////////////////// dropzone cv function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
Dropzone.options.dropzoneFormCv = {
  autoProcessQueue : false,
  acceptedFiles : ".doc,.docx,.pdf,application/msword",
  maxFiles: 1,
  maxFilesize: 5,
  addRemoveLinks: true,

  init:function(){
    var submitButton = document.querySelector("#submit_cv_file");
    dropzoneFormCv = this;

    submitButton.addEventListener('click', function(){
      dropzoneFormCv.processQueue();
    });

    this.on("success", function(file, success){
      $('#cv_success').text('Your CV uploaded successfully');
      $('#cv_icon_url').attr('href', '/storage/'+success.success);

      if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
      {
        var _this = this;
        _this.removeAllFiles();
      }
      $.fancybox.close();
    });
  }
};
////////////////////////// end dropzone cv function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\




////////////////////////// dropzone video function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
Dropzone.options.dropzoneFormVideo = {
  autoProcessQueue : false,
  acceptedFiles : ".mp4,.mov,.avi,.flv",
  maxFiles: 1,
  maxFilesize: 75,
  addRemoveLinks: true,

  init:function(){
    var submitButton = document.querySelector("#submit_video_file");
    dropzoneFormVideo = this;
    
    submitButton.addEventListener('click', function(){
      dropzoneFormVideo.processQueue();
    });

    this.on("success", function(file, success){
      $('.cv-box > a').attr('href', success.success);
      // $('#video_source source').attr('src', success.success);
      document.getElementById("video_source").src = success.success;
      $('#video_success').fadeIn();
      setTimeout(function(){ $('#video_success').fadeOut(); }, 2000);
      if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) 
        {
          var _this = this;
          _this.removeAllFiles();
        }
        $('#video-upload').modal('toggle');
        $('#delete_video_form').fadeIn();
    });
  }
};
////////////////////////// end dropzone video function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\




////////////////////////// select user country \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$("#country").val("{{$user->country}}");
////////////////////////// end select user country \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\




////////////////////////// phone utils \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
var input = document.querySelector("#phone");
var iti = window.intlTelInput(input, {
  geoIpLookup: function(callback) {
    $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      var countryCode = (resp && resp.country) ? resp.country : "";
      callback(countryCode);
    });
  },
  hiddenInput: "phone",
  initialCountry: "eg",
  utilsScript: "{{url('/')}}/employee/js/utils.js",
});
var input = document.querySelector("#phone"),
  errorMsg = document.querySelector("#error-msg"),
  validMsg = document.querySelector("#valid-msg");
// here, the index maps to the error code returned from getValidationError - see readme
var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"]
var reset = function() {
  input.classList.remove("error");
  errorMsg.innerHTML = "";
  errorMsg.classList.add("hide");
  validMsg.classList.add("hide");
  input.setCustomValidity("");
};
// on blur: validate
input.addEventListener('blur', function() {
  reset();
  if (input.value.trim()) {
    if (iti.isValidNumber()) {
      validMsg.classList.remove("hide");
      input.setCustomValidity("");
    } else {
      input.classList.add("error");
      var errorCode = iti.getValidationError();
      errorMsg.innerHTML = errorMap[errorCode];
      errorMsg.classList.remove("hide");
      input.setCustomValidity("Invalid phone number.");
    }
  }
});
// on keyup / change flag: reset
input.addEventListener('change', reset);
input.addEventListener('keyup', reset);
////////////////////////// end phone utils \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\




////////////////////////// ajax update profile function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$('#ajax_profile_form').on('submit', function(e) {
  e.preventDefault(); 

  $('#country_error').text('');
  $('#phone_error').text('');
  $('#birthdate_error').text('');
  $('#github_url_error').text('');
  $('#linkedin_url_error').text('');
  $('#success-message').text('');

  $.ajax({
    type: "POST",
    url: '{{route("employee_resume.preview.ajaxUpdateProfileInfo")}}',
    data: $(this).serialize(),
    success:function(response){
      console.log(response.github_url);
      if (response) {
        $('#success-message').text(response.success);
        $('#country_text').text(response.country);
        $('#phone_text').text(response.phone);
        $('#birthdate_text').text(response.birthdate);
        if(response.github_url){
          $('#github_url_text').attr('href', "https://github.com/"+response.github_url);
          $('#github_url_text').fadeIn();
        }else{
          $('#github_url_text').fadeOut();

        }
        if(response.linkedin_url){
          $('#linkedin_url_text').attr('href', "https://www.linkedin.com/in/"+response.linkedin_url);
          $('#linkedin_url_text').fadeIn();
        }else{
          $('#linkedin_url_text').fadeOut();
        }
        setTimeout(function(){ $('#info-edit').modal('hide');}, 1000);
      }
    },
    error: function(response) {
      console.log(response);
        $('#country_error').text(response.responseJSON.errors.country);
        $('#phone_error').text(response.responseJSON.errors.phone);
        $('#birthdate_error').text(response.responseJSON.errors.birthdate);
        $('#github_url_error').text(response.responseJSON.errors.github_url);
        $('#linkedin_url_error').text(response.responseJSON.errors.linkedin_url);
    }
  });
});

$("#info-edit").on("hidden.bs.modal", function () {
  $('#country_error').text('');
  $('#phone_error').text('');
  $('#birthdate_error').text('');
  $('#github_url_error').text('');
  $('#linkedin_url_error').text('');
  $('#success-message').text('');
});
////////////////////////// end ajax update profile function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\




////////////////////////// ajax delete video function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$('#delete_video_form').on('submit', function(e) {
  e.preventDefault(); 

  $.ajax({
    type: "POST",
    url: '{{route("employee_resume.preview.ajaxDeleteVideo")}}',
    data: $(this).serialize(),
    success:function(response){
      console.log(response);
      if (response) {
        document.getElementById("video_source").src = '';
        $('#deleted-message').fadeIn();
        $('#delete_video_form').fadeOut();
        setTimeout(function(){ 
          $('#deleted-message').fadeOut(); 
          $('#video-edit').modal('hide');
        }, 1000);
      }
    },
  });
});
////////////////////////// End ajax delete video function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\




////////////////////////// ajax edit about function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$('#ajax_about_edit').on('submit', function(e) {
  e.preventDefault(); 

  $('#describe_yourself_error').text('');
  $('#about_success_message').text('');

  $.ajax({
    type: "POST",
    url: '{{route("employee_resume.preview.ajaxUpdateAbout")}}',
    data: $(this).serialize(),
    success:function(response){
      console.log(response);
      if (response) {
        $('#about_success_message').text(response.success);
        $('#describe_yourself_text').text(response.text);
        setTimeout(function(){ 
          $('.show-about-form').fadeOut();
          $('.editLink').removeClass("blockedEdit");
          $('#describe_yourself_error').text('');
          $('#about_success_message').text('');
        }, 1000);
      }
    },
    error: function(response) {
      console.log(response);
        $('#describe_yourself_error').text(response.responseJSON.errors.describe_yourself);
    }
  });
});
////////////////////////// End ajax edit about function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\




////////////////////////// ajax edit intro function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$('#ajax_intro_form').on('submit', function(e) {
  e.preventDefault(); 

  $('#name_error').text('');
  $('#speciality_error').text('');
  $('#how_long_error').text('');
  $('#min_base_salary_error').text('');
  $('#job_search_error').text('');
  $('#intro_success_message').text('');
  $('#other_role').text('');

  $.ajax({
    type: "POST",
    url: '{{route("employee_resume.preview.ajaxUpdateIntro")}}',
    data: $(this).serialize(),
    success:function(response){
      console.log(response);
      if (response) {
        $('#intro_success_message').text(response.success);
        $('#name_text').text(response.name);
        if(response.other_role){
          $('#current_role_text').text(response.other_role);
          $('.unselectedItems').hide();
        }else{
          $('#current_role_text').text(response.current_role);
          $('.unselectedItems').show();
        }
        
          console.log(response.job_skills);
          $('#suggested_skills_list').empty();
          $('#suggested_skills_list').append(response.job_skills);

        $('#how_long_text').text(response.how_long);
        $('#min_base_salary_text').text(response.min_base_salary);
        $('#job_search_text').text(response.job_search);
        setTimeout(function(){ 
          $('.show-intro-edit').fadeOut();
          $('.editLink').removeClass("blockedEdit");
          $('#name_error').text('');
          $('#speciality_error').text('');
          $('#how_long_error').text('');
          $('#min_base_salary_error').text('');
          $('#job_search_error').text('');
          $('#intro_success_message').text('');
        }, 1000);
      }
    },
    error: function(response) {
      console.log(response);
        $('#name_error').text(response.responseJSON.errors.name);
        $('#speciality_error').text(response.responseJSON.errors.speciality);
        $('#how_long_error').text(response.responseJSON.errors.how_long);
        $('#min_base_salary_error').text(response.responseJSON.errors.min_base_salary);
        $('#job_search_error').text(response.responseJSON.errors.job_search);
    }
  });
});

$('#show-intro-edit').click(function () {
  if ($(".editLink").hasClass("blockedEdit")) {
    return;
  }else {
    $("#speciality").change(function() {
      if($(this).val() === '{{$other_role->id}}') {
        $(".other-role-container").fadeIn();
        $(".other-role-container input").prop('required',true);
      }else{
        $(".other-role-container").fadeOut();
        $(".other-role-container input").prop('required',false);
        $('#other_role').val('');
      }
    });

    if($("#speciality").val() === '{{$other_role->id}}'){
      $(".other-role-container").show();
      $(".other-role-container input").prop('required',true);
    }
      
    $('.show-intro-edit').css("display", "block");
    $('html, body').animate({
        scrollTop: $(".show-intro-edit").offset().top
    }, 100);
    $('.editLink').addClass("blockedEdit");
  }
});


$('.close-edit-intro').click(function () {
  $('.show-intro-edit').css("display", "none");
  $('.editLink').removeClass("blockedEdit");
});
////////////////////////// End ajax edit intro function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\




////////////////////////// ajax skills function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
// select picker function
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
// checkbox function
// $(".checkbox").on('change', function(){
$(document).on('click', '.checkbox', function() {
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
// remove selected main items
function removeSelectedMainItems(){
  $('#selectedItems li').on('click', function(){
    $(this).remove();
    var skill_id = $(this).attr('skill-id');
    $('#employee_skill_'+skill_id).prop( "checked", false );
    $('#employee_skill_'+skill_id).closest('li').removeClass('selected');
    $('.selectpicker option[value='+skill_id+']').removeAttr("selected");
    $('.selectpicker').selectpicker('render');
    // init();
  });
}
removeSelectedMainItems();
// remove selected items
function removeSelectedItems(){
  $('#selected_items li').on('click', function(){
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
// text field skills function
$('form input').keydown(function (e) {
  if (e.keyCode == 13 && $(this).attr('id') == 'top_skills_input') {
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
////////////////////////// End ajax skills function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\




////////////////////////// ajax edit skills function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
$('#ajax_skills_form').on('submit', function(e) {
  e.preventDefault(); 

  $('#skills_success_message').text('');

  $.ajax({
    type: "POST",
    url: '{{route("employee_resume.preview.ajaxUpdateSkills")}}',
    data: $(this).serialize(),
    success:function(response){
      console.log(response);
      if (response) {
        $('#skills_success_message').text(response.success);
        $('#selected_skills_list').empty();
        for(var i=0; i < response.skills.length;i++){
          $('#selected_skills_list').append('<li>'+response.skills[i]+'</li>');
        }
        setTimeout(function(){ 
          $('.show-skills-edit').fadeOut();
          $('.editLink').removeClass("blockedEdit");
          $('#intro_success_message').text('');
        }, 1000);
      }
    },
    error: function(response) {
      console.log(response);
    }
  });
});
////////////////////////// End ajax edit skills function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\




////////////////////////// ajax edit work experience function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
// function exp_form_func(){
  $('.show-exp-form').unbind().on('click', function(){
    var show_btn = $(this);
    if ($(".editLink").hasClass("blockedEdit")) {
      return;
    } else {
      $('.show-exp-form-box').css("display", "block");
      $('html, body').animate({scrollTop: $(".show-exp-form-box").offset().top}, 100);
      $('.editLink').addClass("blockedEdit");
      $('.ended_year_error').text('');
      $('[name=ended_year]').prop('disabled', false);
      $('#edit_experience_form #wxid').val('');
      $('#edit_experience_form #currently_work_here').attr('checked', false);
      document.getElementById('edit_experience_form').reset();

      if($(this).attr('whsid')){
        //delete form
        if($('#experience_work_list li').length > 1){
          $('#delete_experience #delete_wxid').val($(this).attr('whsid'));
          $('#delete_experience').show();
        }else{
          $('#delete_experience #delete_wxid').val('');
          $('#delete_experience').hide();
        }

        $('#edit_experience_title').text('Edit Experience');
        $('#edit_experience_form #wxid').val($(this).attr('whsid'));
        $('#edit_experience_form #title').val($(this).attr('work_title'));
        $('#edit_experience_form #company').val($(this).attr('work_company'));
        $('#edit_experience_form #started_year').val($(this).attr('started_year'));
        if($(this).attr('ended_year')){
          $('#edit_experience_form #ended_year').val($(this).attr('ended_year'));
          $('[name=ended_year]').prop('disabled', false);
          $('#edit_experience_form #currently_work_here').attr('checked', false);
        }else if($(this).attr('started_year')){
          $('#edit_experience_form #currently_work_here').attr('checked', 'checked');
          $('#edit_experience_form #ended_year').prop('disabled', 'disabled');
          $('#edit_experience_form #ended_year').val('');
        }else{
          $('#edit_experience_form #ended_year').val('');
        }
        $('#edit_experience_form #accomplishment').val($(this).attr('accomplishment'));
      }else{
        $('#edit_experience_title').text('Add Experience');
        $('#delete_experience #delete_wxid').val('');
        $('#delete_experience').hide();
      }

      // ajax form update function
      $('#edit_experience_form').unbind().on('submit', function(e) {
        e.preventDefault(); 
        $('#experience_success_message').text('');
        $('.ended_year_error').text('');
        $.ajax({
          type: "POST",
          url: '{{route("employee_resume.preview.ajaxUpdateExperience")}}',
          data: $(this).serialize(),
          success:function(response){
            if (response.success) {
              $('#experience_success_message').text(response.success);
              if(response.new_work){
                $('#experience_work_list li:first').clone(true, true).appendTo("#experience_work_list").attr("id", "work_id_"+response.work_id);
                show_btn = $('#work_id_'+response.work_id+' .editLink');
                show_btn.attr('whsid', response.work_id);
              }
              var work_element_id = '#work_id_'+response.work_id;
              $(work_element_id+' .company').text(response.text.company);
              $(work_element_id+' .work-title').text(response.text.title);
              $(work_element_id+' .started_year').text(response.text.started_year);
              if(response.text.ended_year){
                $(work_element_id+' .ended_year').text(response.text.ended_year);
                $(work_element_id+' .ended_year').removeClass('h5');
              }else{
                $(work_element_id+' .ended_year').text('Present');
                $(work_element_id+' .ended_year').addClass('h5');
              }
              $(work_element_id+' .accomplishment').text(response.text.accomplishment);

              show_btn.attr('work_title', response.text.title);
              show_btn.attr('work_company', response.text.company);
              show_btn.attr('started_year', response.text.started_year);
              show_btn.attr('ended_year', response.text.ended_year);
              show_btn.attr('accomplishment', response.text.accomplishment);
              
              setTimeout(function(){ 
                $('.show-exp-form-box').fadeOut();
                $('.editLink').removeClass("blockedEdit");
                $('#experience_success_message').text('');
                $('.ended_year_error').text('');
              }, 1000);
            }
          },
          error: function(response) {
            console.log(response);
            $('.ended_year_error').text(response.responseJSON.errors.ended_year);
          }
        });
      });
    }
  });
// }
// exp_form_func();
$('.close-exp-form').on('click', function(){
  $('.show-exp-form-box').css("display", "none");
  $('.editLink').removeClass("blockedEdit");
});

$("#currently_work_here").change(function() {
    if(this.checked) {
      $('[name=ended_year]').val('');
      $('[name=ended_year]').prop('disabled', 'disabled');
    }else{
      $('[name=ended_year]').prop('disabled', false);
    }
});


// Delete function
$('#delete_experience').on('submit', function(e) {
  e.preventDefault(); 
  var confirmed = confirm("Do you really want to delete this?");

  if (confirmed) {
    $.ajax({
      type: "POST",
      url: '{{route("employee_resume.preview.ajaxDeteteExperience")}}',
      data: $(this).serialize(),
      success:function(response){
        console.log(response);
        if (response.success) {
          $('#'+response.success).remove();
          $('.show-exp-form-box').fadeOut();
          $('.editLink').removeClass("blockedEdit");
        }
      },
    });
  }
});
////////////////////////// End ajax edit work experience function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\




////////////////////////// ajax edit education function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
// function edu_form_func(){
  $('.show-edu-form').unbind().on('click', function(){
    console.log('hello');
    var show_btn = $(this);
    if ($(".editLink").hasClass("blockedEdit")) {
      return;
    } else {
      $('.show-edu-form-box').css("display", "block");
      $('html, body').animate({scrollTop: $(".show-edu-form-box").offset().top}, 100);
      $('.editLink').addClass("blockedEdit");
      $('.end_date_error').text('');
      $('#edit_education_form #eduid').val('');
      document.getElementById('edit_education_form').reset();

      if($(this).attr('eduid')){
        //delete form
        if($('#education_list li').length > 1){
          $('#delete_education #delete_eduid').val($(this).attr('eduid'));
          $('#delete_education').show();
        }else{
          $('#delete_education #delete_eduid').val('');
          $('#delete_education').hide();
        }

        $('#edit_education_title').text('Edit Education');
        $('#edit_education_form #eduid').val($(this).attr('eduid'));
        $('#edit_education_form #school').val($(this).attr('school'));
        $('#edit_education_form #degree').val($(this).attr('degree'));
        $('#edit_education_form #field_study').val($(this).attr('field_study'));
        $('#edit_education_form #start_date').val($(this).attr('start_date'));
        $('#edit_education_form #end_date').val($(this).attr('end_date'));
      }else{
        $('#delete_education #delete_eduid').val('');
        $('#delete_education').hide();
        $('#edit_education_title').text('Add Education');
      }

      // ajax form update function
      $('#edit_education_form').unbind().on('submit', function(e) {
        e.preventDefault(); 
        $('#education_success_message').text('');
        $('.end_date_error').text('');
        $.ajax({
          type: "POST",
          url: '{{route("employee_resume.preview.ajaxUpdateEducation")}}',
          data: $(this).serialize(),
          success:function(response){
            if (response.success) {
              $('#education_success_message').text(response.success);
              if(response.new_education){
                $('#education_list li:first').clone(true, true).appendTo("#education_list").attr("id", "education_id_"+response.education_id);
                // edu_form_func();
                show_btn = $('#education_id_'+response.education_id+' .editLink');
                show_btn.attr('eduid', response.education_id);
              }

              var education_element_id = '#education_id_'+response.education_id;
              $(education_element_id+' .school').text(response.text.school);
              $(education_element_id+' .education-degree').text(response.text.degree);
              $(education_element_id+' .start_date').text(response.text.start_date);
              $(education_element_id+' .end_date').text(response.text.end_date);

              show_btn.attr('school', response.text.school);
              show_btn.attr('degree', response.text.degree);
              show_btn.attr('start_date', response.text.start_date);
              show_btn.attr('end_date', response.text.end_date);
              
              setTimeout(function(){ 
                $('.show-edu-form-box').fadeOut();
                $('.editLink').removeClass("blockedEdit");
                $('#education_success_message').text('');
                $('.end_date_error').text('');
              }, 1000);
            }
          },
          error: function(response) {
            console.log(response);
            $('.end_date_error').text(response.responseJSON.errors.end_date);
          }
        });
      });
    }
  });
// }
// edu_form_func();

$('.close-edu-form').click(function () {
  $('.show-edu-form-box').css("display", "none");
  $('.editLink').removeClass("blockedEdit");
});

// Delete function
$('#delete_education').on('submit', function(e) {
  e.preventDefault(); 
  var confirmed = confirm("Do you really want to delete this?");
  if (confirmed) {
    $.ajax({
      type: "POST",
      url: '{{route("employee_resume.preview.ajaxDeteteEducation")}}',
      data: $(this).serialize(),
      success:function(response){
        console.log(response);
        if (response.success) {
          $('#'+response.success).remove();
          $('.show-edu-form-box').fadeOut();
          $('.editLink').removeClass("blockedEdit");
        }
      },
    });
  }
});
////////////////////////// End ajax edit education function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\




////////////////////////// ajax edit certificate function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
// function cert_form_func(){
  $('.show-cert-form').unbind().click(function () {
    var show_btn = $(this);
    if ($(".editLink").hasClass("blockedEdit")) {
      return;
    } else {
      $('.show-cert-form-box').css("display", "block");
      $('html, body').animate({scrollTop: $(".show-cert-form-box").offset().top}, 100);
      $('.editLink').addClass("blockedEdit");
      $('#edit_certificate_form #certid').val('');
      $('#edit_certificate_form #never_expired').attr('checked', false);
      $('[name=expiration_date]').prop('disabled', false);
      document.getElementById('edit_certificate_form').reset();

      if($(this).attr('certid')){
        //delete form
        $('#delete_certificate #delete_certid').val($(this).attr('certid'));
        $('#delete_certificate').show();

        $('#edit_certificate_title').text('Edit Certificates');
        $('#edit_certificate_form #certid').val($(this).attr('certid'));
        $('#edit_certificate_form #name').val($(this).attr('certificate_name'));
        $('#edit_certificate_form #issuing_organization').val($(this).attr('issuing_organization'));
        $('#edit_certificate_form #issue_date').val($(this).attr('issue_date'));
        $('#edit_certificate_form #credential_id').val($(this).attr('credential_id'));
        $('#edit_certificate_form #credential_url').val($(this).attr('credential_url'));
        if($(this).attr('expiration_date')){
          $('#edit_certificate_form #expiration_date').val($(this).attr('expiration_date'));
          $('[name=expiration_date]').prop('disabled', false);
          $('#edit_certificate_form #never_expired').attr('checked', false);
        }else{
          $('#edit_certificate_form #never_expired').attr('checked', 'checked');
          $('#edit_certificate_form #expiration_date').prop('disabled', 'disabled');
        }
      }else{
        $('#delete_certificate #delete_certid').val('');
        $('#delete_certificate').hide();
        $('#edit_certificate_title').text('Add Certificates');
      }

      // ajax form update function
      $('#edit_certificate_form').unbind().on('submit', function(e) {
        e.preventDefault(); 
        $('#certification_success_message').text('');
        $.ajax({
          type: "POST",
          url: '{{route("employee_resume.preview.ajaxUpdateCertification")}}',
          data: $(this).serialize(),
          success:function(response){
            if (response.success) {
              $('#certification_success_message').text(response.success);
              if(response.new_certification){
                $('#certificate_list li:first').clone(true, true).appendTo("#certificate_list").attr("id", "certificate_id_"+response.certification_id).css("display", "flex");
                // cert_form_func();
                show_btn = $('#certificate_id_'+response.certification_id+' .editLink');
                show_btn.attr('certid', response.certification_id);
              }

              var certificate_element_id = '#certificate_id_'+response.certification_id;
              $(certificate_element_id+' .certificate-name').text(response.text.name);
              $(certificate_element_id+' .issue_date').text(response.text.issue_date);
              $(certificate_element_id+' .expiration_date').text(' - '+response.text.expiration_date);
              $(certificate_element_id+' .credential_id').text(response.text.credential_id);
              $(certificate_element_id+' .credential_url').attr('href', response.text.credential_url);

              show_btn.attr('certificate_name', response.text.name);
              show_btn.attr('issuing_organization', response.text.issuing_organization);
              show_btn.attr('issue_date', response.text.issue_date);
              show_btn.attr('expiration_date', response.text.expiration_date);
              show_btn.attr('credential_id', response.text.credential_id);
              show_btn.attr('credential_url', response.text.credential_url);
              
              setTimeout(function(){ 
                $('.show-cert-form-box').fadeOut();
                $('.editLink').removeClass("blockedEdit");
                $('#certification_success_message').text('');
              }, 1000);
            }
          },
          error: function(response) {
            console.log(response);
          }
        });
      });
    }
  });
// }
// cert_form_func();

$('.close-cert-form').click(function () {
  $('.show-cert-form-box').css("display", "none");
  $('.editLink').removeClass("blockedEdit");
});

$("#never_expired").change(function() {
    if(this.checked) {
      $('[name=expiration_date]').val('');
      $('[name=expiration_date]').prop('disabled', 'disabled');
    }else{
      $('[name=expiration_date]').prop('disabled', false);
    }
});


// Delete function
$('#delete_certificate').on('submit', function(e) {
  e.preventDefault(); 
  var confirmed = confirm("Do you really want to delete this?");
  if (confirmed) {
    $.ajax({
      type: "POST",
      url: '{{route("employee_resume.preview.ajaxDeteteCertification")}}',
      data: $(this).serialize(),
      success:function(response){
        console.log(response);
        if (response.success) {
          $('#'+response.success).remove();
          $('.show-cert-form-box').fadeOut();
          $('.editLink').removeClass("blockedEdit");
        }
      },
    });
  }
});
////////////////////////// End ajax edit education function \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\







$('.input-group.date').datepicker({ format: "dd.mm.yyyy", autoclose: true, });


      

      $('#show-skills-edit').click(function () {
          if ($(".editLink").hasClass("blockedEdit")) {
              return;
          } else {
              $('.show-skills-edit').css("display", "block");
              $('html, body').animate({
                  scrollTop: $(".show-skills-edit").offset().top
              }, 100);
              $('.editLink').addClass("blockedEdit");

          }
      });

      $('.close-edit-skills').click(function () {
          $('.show-skills-edit').css("display", "none");
          $('.editLink').removeClass("blockedEdit");
      });



      



      




      $('#show-about-form').click(function () {
          if ($(".editLink").hasClass("blockedEdit")) {
              return;
          } else {
              $('.show-about-form').css("display", "block");
              $('html, body').animate({
                  scrollTop: $(".show-about-form").offset().top
              }, 100);
              $('.editLink').addClass("blockedEdit");

          }
      });

      $('.close-about-form').click(function () {
          $('.show-about-form').css("display", "none");
          $('.editLink').removeClass("blockedEdit");
      });



      


  });


  $(".onlyOneChecked input").click(function () {
      $('.onlyOneChecked input:checkbox').removeAttr('checked');
      $(this).prop('checked', true);
  });

</script>