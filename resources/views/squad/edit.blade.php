@extends('layouts.app')

@section('content')
<div class="container">
  <div class="stepWrapper" id="boxscroll">
    <div class="row mx-0 stepWrapperRow">
      <div class="col-md-12">
        <form id="msform">
          @csrf
          <!-- progressbar -->
          <ul id="progressbar">
            <li class="active">{{ __('squad.step_1') }} </li>
            <li>{{ __('squad.step_2') }} </li>
            <li>{{ __('squad.step_3') }} </li>
            <li>{{ __('squad.step_4') }} </li>
            <li>{{ __('squad.step_5') }} </li>
          </ul>
          <!-- fieldsets -->
          <fieldset>
            <div class="row fieldsetrow">
              <div class="col-md-9">
                  <div class="stepForm">
                      <h2 class="largeFont">{{ __('squad.what_service') }}</h2>

                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="project_service"
                              id="project_service_desc1" value="{{ __('squad.food_delivery') }}" 
                              checked="checked"
                              {{ $old_squad->project_service == __('squad.food_delivery') ? 'checked="checked"' : ''}}>
                          <label class="form-check-label" for="project_service_desc1">{{ __('squad.food_delivery') }}</label>
                      </div>

                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="project_service"
                              id="project_service_desc2" value="{{ __('squad.ecommerce') }}"
                              {{ $old_squad->project_service == __('squad.ecommerce') ? 'checked="checked"' : ''}}>
                          <label class="form-check-label" for="project_service_desc2">{{ __('squad.ecommerce') }}</label>
                      </div>

                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="project_service"
                              id="project_service_desc3" value="{{ __('squad.elearning') }}"
                              {{ $old_squad->project_service == __('squad.elearning') ? 'checked="checked"' : ''}}>
                          <label class="form-check-label" for="project_service_desc3">{{ __('squad.elearning') }}</label>
                      </div>

                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="project_service"
                              id="project_service_desc4" value="{{ __('squad.finance_tech') }}"
                              {{ $old_squad->project_service == __('squad.finance_tech') ? 'checked="checked"' : ''}}>
                          <label class="form-check-label" for="project_service_desc4">{{ __('squad.finance_tech') }}</label>
                      </div>

                      <div class="form-check">
                          <input class="form-check-input" type="radio" name="project_service"
                              id="project_service_desc5" value="{{ __('squad.enews') }}"
                              {{ $old_squad->project_service == __('squad.enews') ? 'checked="checked"' : ''}}>
                          <label class="form-check-label" for="project_service_desc5">{{ __('squad.enews') }}</label>
                      </div>

                      <div class="form-check mt-3">
                          <input class="form-check-input" type="radio" name="project_service"
                              id="project_service_desc6" value="{{ __('squad.other') }}"
                              {{ $old_squad->project_service == __('squad.other') ? 'checked="checked"' : ''}}>
                          <label class="form-check-label" for="project_service_desc6">{{ __('squad.other') }}</label>
                      </div>

                      <div class="form-group ">
                          <textarea class="form-control" name="project_service_desc"
                              rows="3" placeholder="{{ __('squad.add_your') }}">{{ $old_squad->project_service_desc }}</textarea>
                      </div>

                        <div class="form-group ">
                            <label for="app_liked">More info:</label>
                            <textarea class="form-control" name="app_liked"
                                rows="3" placeholder="Links to apps you liked!">{{ $old_squad->app_liked }}</textarea>
                        </div>

                  </div>
              </div>
              <div class="col-md-3 leftSide">
                  <div class="text-center">
                      <img src="/images/squad.svg" class="img-fluid mb-4" alt="" />
                  </div>

                  <h4>{{ __('sidebar.squad') }}</h4>
                  <p>{{ __('sidebar.top_notch') }}</p>

              </div><!-- leftside end-->
            </div>

            <input type="button" name="next" class="next action-button" value=" {{ __('squad.next') }}">

          </fieldset>

          <fieldset>
              <div class="row fieldsetrow">
                  <div class="col-md-9">
                      <div class="stepForm">
                          <h2 class="largeFont">{{ __('squad.what_technologies') }}</h2>
                          <div class="form-group ">
                              <input type="hidden" name="project_technology" value="{{ $old_squad->project_technology }}" />

                              <input class="form-control" type="text" placeholder="{{ __('squad.tec_example') }}" id="project_technology_input" />
                          </div>

                          <div class="selectedItems">
                            <ul id="selected_items">
                              <?php 
                                $explode_tec = explode(',', trim($old_squad->project_technology)); 
                                $trim_tec = array();
                                foreach ($explode_tec as $tec) {
                                    array_push($trim_tec, trim($tec));
                                }
                              ?>
                              @foreach($trim_tec as $tec)
                              @if(!empty($tec))
                                <li>{{ trim($tec) }}<svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></li>
                              @endif
                              @endforeach
                            </ul>
                          </div><!-- selectedItems end -->


                          <div class="unselectedItems mt-5">

                              <p class="mb-0">{{ __('squad.most_used') }}</p>

                              <ul id="most_used">
                                  <li class="{{ in_array('Node.js',$trim_tec) ? 'selected' : '' }}"><i data-feather="plus"></i>Node.js</li>
                                  <li class="{{ in_array('Angular',$trim_tec) ? 'selected' : '' }}"><i data-feather="plus"></i>Angular</li>
                                  <li class="{{ in_array('iOS',$trim_tec) ? 'selected' : '' }}"><i data-feather="plus"></i>iOS</li>
                                  <li class="{{ in_array('Android',$trim_tec) ? 'selected' : '' }}"><i data-feather="plus"></i>Android</li>
                                  <li class="{{ in_array('React',$trim_tec) ? 'selected' : '' }}"><i data-feather="plus"></i>React</li>
                                  <li class="{{ in_array('PHP',$trim_tec) ? 'selected' : '' }}"><i data-feather="plus"></i>PHP</li>
                                  <li class="{{ in_array('Ruby on Rails',$trim_tec) ? 'selected' : '' }}"><i data-feather="plus"></i>Ruby on Rails</li>
                                  <li class="{{ in_array('Python',$trim_tec) ? 'selected' : '' }}"><i data-feather="plus"></i>Python</li>
                                  <li class="{{ in_array('Java',$trim_tec) ? 'selected' : '' }}"><i data-feather="plus"></i>Java</li>
                                  <li class="{{ in_array('React Native',$trim_tec) ? 'selected' : '' }}"><i data-feather="plus"></i>React Native</li>
                                  <li class="{{ in_array('UI/UX Design',$trim_tec) ? 'selected' : '' }}"><i data-feather="plus"></i>UI/UX Design</li>
                                  <li class="{{ in_array('Scala',$trim_tec) ? 'selected' : '' }}"><i data-feather="plus"></i>Scala</li>
                                  <li class="{{ in_array('C#',$trim_tec) ? 'selected' : '' }}"><i data-feather="plus"></i>C#</li>
                                  <li class="{{ in_array('C++',$trim_tec) ? 'selected' : '' }}"><i data-feather="plus"></i>C++</li>
                                  <li class="{{ in_array('Server Hosting',$trim_tec) ? 'selected' : '' }}"><i data-feather="plus"></i>Server Hosting</li>
                              </ul>
                          </div><!-- selectedItems end -->

                      </div>
                  </div>
                  <div class="col-md-3 leftSide">

                      <div class="testimonialsBox">
                          <img src="/images/pinkquote.svg" class="mb-2" />
                          <p>
                            {{ __('sidebar.ibtikar_helped_us') }}
                          </p>

                          <div class="text-right">
                              <h6>
                                {{ __('sidebar.muhammed_ibrahim') }}
                              </h6>
                              <span>
                                {{ __('sidebar.ceo_sabbar') }}
                              </span>
                          </div>

                      </div>

                      <div class="testimonialsBox">
                          <img src="/images/bluequote.svg" class="mb-2" />
                          <p>
                            {{ __('sidebar.the_team_delivered') }}
                          </p>

                          <div class="text-right">
                              <h6>
                                {{ __('sidebar.ali_hazmi') }}
                              </h6>
                              <span>
                                {{ __('sidebar.editor_in_chief') }}
                              </span>
                          </div>

                      </div>


                      <div class="testimonialsBox">
                          <img src="/images/orangequote.svg" class="mb-2" />
                          <p>
                            {{ __('sidebar.was_finally') }}
                          </p>

                          <div class="text-right">
                              <h6>
                                {{ __('sidebar.sultan_haddab') }}

                              </h6>
                              <span>
                                {{ __('sidebar.ceo_haseel') }}
                              </span>
                          </div>

                      </div>

                  </div><!-- leftside end-->

              </div>


              <input type="button" name="previous" class="previous action-button" value="{{ __('squad.prev') }}" />
              <input type="button" name="next" class="next action-button" value="{{ __('squad.next') }}" />

          </fieldset>

          <fieldset>
              <div class="row fieldsetrow">
                  <div class="col-md-9">
                      <div class="stepForm">
                          <h2 class="largeFont">{{ __('squad.what_will') }}</h2>

                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="squad_size"
                                  id="squad_size1" value="3 - 5" 
                                  {{ $old_squad->squad_size == '3 - 5' ? 'checked="checked"' : ''}}>
                              <label class="form-check-label" for="squad_size1">3 - 5</label>
                          </div>

                          <div class="form-check mt-3">
                              <input class="form-check-input" type="radio" name="squad_size"
                                  id="squad_size2" value="5 - 8"
                                  {{ $old_squad->squad_size == '5 - 8' ? 'checked="checked"' : ''}}>
                              <label class="form-check-label" for="squad_size2">5 - 8</label>
                          </div>

                          <div class="form-check mt-3">
                              <input class="form-check-input" type="radio" name="squad_size"
                                  id="squad_size3" value="+ 8"
                                  {{ $old_squad->squad_size == '+ 8' ? 'checked="checked"' : ''}}>
                              <label class="form-check-label" for="squad_size3">+ 8</label>
                          </div>

                          <div class="form-check mt-3">
                              <input class="form-check-input" type="radio" name="squad_size"
                                  id="squad_size4" value="{{ __('squad.not_sure') }}"
                                  {{ $old_squad->squad_size == "__('squad.not_sure')" ? 'checked="checked"' : ''}}>
                              <label class="form-check-label" for="squad_size4">{{ __('squad.not_sure') }}</label>
                          </div>

                      </div>
                  </div>

                  <div class="col-md-3 leftSide">
                      <div class="row leftLogos">
                          <div class="col-6">
                              <div class="logobox">
                                  <img src="/images/logos/1.png" class="img-fluid" />
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="logobox">
                                  <img src="/images/logos/2.png" class="img-fluid" />
                              </div>
                          </div>

                      </div>

                      <div class="row leftLogos">
                          <div class="col-6">
                              <div class="logobox">
                                  <img src="/images/logos/5.png" class="img-fluid" />
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="logobox">
                                  <img src="/images/logos/9.png" class="img-fluid" />
                              </div>
                          </div>

                      </div>


                      <div class="row leftLogos">
                          <div class="col-6">
                              <div class="logobox">
                                  <img src="/images/logos/13.png" class="img-fluid" />
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="logobox">
                                  <img src="/images/logos/14.png" class="img-fluid" />
                              </div>
                          </div>

                      </div>

                      <h4>
                        {{ __('sidebar.our_allies') }}
                      </h4>

                      <p>
                        {{ __('sidebar.they_have_squaded') }}
                      </p>
                  </div><!-- leftside end-->

              </div>

              <input type="button" name="previous" class="previous action-button" value="{{ __('squad.prev') }}" />
              <input type="button" name="next" class="next action-button" value="{{ __('squad.next') }}" />

          </fieldset>

          <fieldset>
              <div class="row fieldsetrow">
                  <div class="col-md-9">
                      <div class="stepForm">
                          <h2 class="largeFont">{{ __('squad.what_your_status') }}</h2>

                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="project_status"
                                  id="project_status1" value="{{ __('squad.i_will_process') }}" 
                                  {{ $old_squad->project_status == __('squad.i_will_process') ? 'checked="checked"' : ''}}>
                              <label class="form-check-label" for="project_status1">{{ __('squad.i_will_process') }}</label>
                          </div>

                          <div class="form-check mt-3">
                              <input class="form-check-input" type="radio" name="project_status"
                                  id="project_status2" value="{{ __('squad.i_will_start') }}"
                                  {{ $old_squad->project_status == __('squad.i_will_start') ? 'checked="checked"' : ''}}>
                              <label class="form-check-label" for="project_status2">{{ __('squad.i_will_start') }}</label>
                          </div>


                          <div class="form-check mt-3">
                              <input class="form-check-input" type="radio" name="project_status"
                                  id="project_status3" value="{{ __('squad.other') }}"
                                  {{ $old_squad->project_status == __('squad.other') ? 'checked="checked"' : ''}}>
                              <label class="form-check-label" for="project_status3">{{ __('squad.other') }}</label>
                          </div>

                          <div class="form-group ">
                              <textarea class="form-control" name="project_status_desc"
                                  rows="3" placeholder="{{ __('squad.define_your') }}">{{ $old_squad->project_status_desc }}</textarea>
                          </div>

                      </div>
                  </div>
                  <div class="col-md-3 leftSide">

                      <h4>
                        {{ __('sidebar.ibtikars_squad_is') }}
                      </h4>

                      <div class="text-center">
                          <img src="/images/squodTeam.svg" class="img-fluid mb-4" alt="">
                      </div>

                      <ul class="checkListUl">
                          <li>
                              <i data-feather="check"></i> {{ __('sidebar.compelete_supervision') }}
                          </li>

                          <li>
                              <i data-feather="check"></i> {{ __('sidebar.high_quality') }}
                          </li>

                          <li>
                              <i data-feather="check"></i> {{ __('sidebar.latest_designs') }}
                          </li>



                          <li>
                              <i data-feather="check"></i> {{ __('sidebar.periodic') }}
                          </li>


                          <li>
                              <i data-feather="check"></i> {{ __('sidebar.timely_performance') }}
                          </li>
                      </ul>
                  </div><!-- leftside end-->

              </div>

              <input type="button" name="previous" class="previous action-button" value="{{ __('squad.prev') }}" />
              <input type="submit" name="next" class="next action-button" value="{{ __('squad.save_and') }}" />
              {{-- <input type="button" name="next" class="next action-button" value="{{ __('squad.next') }}" /> --}}

          </fieldset>

          <fieldset class="calendly-active">
              <div class="row fieldsetrow">
                  <div class="col-md-9">
                      <div class="stepForm">
                          <h2 class="largeFont">{{ __('squad.one_more') }} </h2>

                          <div class="calendarBox">

                              <div class="calendarHeader">
                                  <img src="/images/microphone.svg" alt="" class="img-fluid" />

                                  <p class="mb-0">{{ __('squad.book_slot') }}</p>
                              </div>
                              <!--calendarHeader end -->

                              <div class="calendarBody">
                                  <!-- Calendly inline widget begin -->
                                  <div id="calendly_id" style="min-width:320px;height:700px;"></div>
                                  <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>
                                  <!-- Calendly inline widget end -->
                                  <script>
                                      Calendly.initInlineWidget({
                                      url: 'https://calendly.com/d/mkm6-wwd8/build-your-squad?hide_event_type_details=1',
                                       parentElement: document.getElementById('calendly_id'),
                                       prefill: {
                                              name: "{{ auth()->user()->name }}",
                                              email: "{{ auth()->user()->email }}",
                                          }
                                      });



                                      function isCalendlyEvent(e) {
                                        return e.data.event &&
                                                e.data.event.indexOf('calendly') === 0;
                                        };
                                        
                                        window.addEventListener(
                                        'message',
                                        function(e) {
                                            if (isCalendlyEvent(e)) {
                                                if( e.data.event == 'calendly.event_scheduled'){
                                                    jQuery('.overlay-calendly-wait').fadeIn();
                                                }
                                            }
                                        }
                                        );
                                  </script>
                              </div>
                          </div>
                          <!--calendarBox end -->
                      </div>
                      <!--stepForm end -->
                  </div>
                  <div class="col-md-3 pr-0">
                    <div class="leftSide lastSide">
                      <h3 class="px-30">
                        {{ __('sidebar.build_your_squad') }}
                      </h3>
                      <ul class="projectList">
                        <li>
                            <i data-feather="check"></i>
                            {{ __('sidebar.send_your') }}
                        </li>

                        <li class="active">
                            <i data-feather="calendar"></i>
                            {{ __('sidebar.book_your') }}
                        </li>
                        <li class="unactive">
                            <i data-feather="dollar-sign"></i>
                            {{ __('sidebar.receive_squad') }}
                        </li>
                        <li class="unactive">
                            <i data-feather="pen-tool"></i>
                            {{ __('sidebar.sign_your') }}
                        </li>
                      </ul>

                      <div class="yourProject">
                        <h4>{{ __('sidebar.your_project') }}</h4>

                        <h6>{{ __('sidebar.service_provided') }}</h6>
                        <p id="project_service">{{ $old_squad->project_service ?? '' }}</p>

                        <h6>{{ __('sidebar.tec_required') }}</h6>
                        <p id="project_technology">{{ $old_squad->project_technology ?? '' }}</p>

                        <h6>{{ __('sidebar.squad_size') }}</h6>
                        <p id="squad_size">{{ $old_squad->squad_size ?? '' }}</p>

                        <h6>{{ __('sidebar.project_status') }}</h6>
                        <p id="project_status">{{ $old_squad->project_status ?? '' }}</p>
                      </div>
                    </div>
                  </div><!-- leftside end-->
              </div>

          </fieldset>
        </form>
      </div><!-- col-md-9 end -->
    </div><!-- row end-->
  </div><!-- stepWrapper end-->
</div>
@endsection

@section('scripts')
<script>
(function($) {

  // submit form + create squad in database with ajax + fire a pipefy action
  $("#msform").submit(function(e) {
      e.preventDefault();
      $.ajax({
        type: "post",
        url: '/squad/update',
        data: $("#msform").serialize(),
        success: function(data) {
          console.log('success');
          $('#project_service').text($('input[name=project_service]:checked').val());
          $('#project_technology').text($('input[name=project_technology]').val());
          $('#squad_size').text($('input[name=squad_size]:checked').val());
          $('#project_status').text($('input[name=project_status]:checked').val());
          // $('.stepWrapperRow').addClass('calendly-active');
        },
        error: function() {
          console.log('error');
        }
      });
  });


  // technolohy field functions
  $('#most_used li').click(function(){
    if($('input[name=project_technology]').val()){
      $('input[name=project_technology]').val($('input[name=project_technology]').val() + ', ' + $(this).text());
    }else{
      $('input[name=project_technology]').val($(this).text());
    }
    $('#selected_items').append('<li>'+$(this).text()+'<svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></li>');
    $(this).addClass('selected');
    removeSelectedItems();
  });

  function removeSelectedItems(){
    $('#selected_items li').click(function(){
      $("#most_used li:contains('"+$(this).text()+"')").removeClass('selected');
      var text_val = $('input[name=project_technology]').val();
      text_val = text_val.replace($(this).text()+", ", "");
      text_val = text_val.replace(", "+$(this).text(), "");
      text_val = text_val.replace($(this).text(), "");
      $('input[name=project_technology]').val(text_val);
      $(this).remove();
    });
  }
  removeSelectedItems();

  $('form input').keydown(function (e) {
    if (e.keyCode == 13 && $(this).attr('id') == 'project_technology_input') {
      if($('input[name=project_technology]').val()){
        $('input[name=project_technology]').val($('input[name=project_technology]').val() + ', ' + $(this).val());
      }else{
        $('input[name=project_technology]').val($(this).val());
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





    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    $(".next").click(function () {
        if (animating) return false;
        animating = true;
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //activate next step on progressbar using the index of next_fs
        setTimeout(function(){
          $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        }, 700);


        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 50%
               // scale = 1 - (1 - now) * 0.5;
                //2. bring next_fs from the right(50%)
                 left = (now * 10) + "%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({ 'transform': 'scale(' + scale + ')' });
                next_fs.css({ 'left': left, 'opacity': opacity });
            },
            duration: 800,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });

    $(".previous").click(function () {
        if (animating) return false;
        animating = true;

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //de-activate current step on progressbar

        setTimeout(function()
{
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

}, 700);



        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function (now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
               // scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                 left = ((1 - now) * 10) + "%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({ 'left': left });
                previous_fs.css({ 'transform': 'scale(' + scale + ')', 'opacity': opacity });
            },
            duration: 800,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });

    $(".submit").click(function () {
        return false;
    });



    $('[name=project_service_desc]').text(`{{ $old_squad->project_service_desc }}`);
    $('[name=app_liked]').text(`{{ $old_squad->app_liked }}`);
    

})(jQuery);
</script>
<div class="overlay-calendly-wait"><div><img src="/images/ajax-loader.gif"><h2>Please wait</h2></div></div>
@endsection