@extends('employee.layouts.app')

@section('styles')
<style>
@media only screen and (max-width: 768px){
.home-join-btns {
    justify-content: center;
}

.home-join-btns a {
    width: 100%;
    margin: 0 10px 10px;
}
}
</style>
@endsection

@section('content')

<div class="container">

  <div class="row align-items-center login-form">


      <div class="col-md-6 offset-md-1 order-md-2 text-center">
          <img src="{{url('/')}}/employee/images/hire.png" class="img-fluid teamImg" alt="" />
      </div>

      <div class="col-md-5  order-md-1">
          <h2 class="largeFont bold  wow fadeInUp animated h2" data-wow-delay="0s">
              Digitize like an Ibtikarian!
          </h2>

          <p>
              We have been DIGITIZING LIFE for 10 years. Join our team, break your potentials free, explore
              new markets and learn from the BEST
          </p>

          <div class="mt-5 row home-join-btns">

              <a href="{{route('register')}}" class="btn mr-1 btn-dark pr-5 pl-5">
                  Join The IBTIKARIANS
              </a>
              <a href="{{route('employee_profile.showLoginForm')}}" class="btn btn-border pr-5 pl-5">
                  Login
              </a>

          </div>




      </div>

  </div><!-- row end-->


</div>
<!--container end-->

<section class="p-section services-section">
  <div class="container">

      <div class="row">
          <div class="col-md-4">
              <ul class="services-list">
                  <li class="wow slideInUp animated">

                      <div class="service-icon wow zoomIn animated" data-wow-delay="0.2s">

                          <img src="{{url('/')}}/employee/images/h1.svg" alt="" class="img-fluid teamImg" alt="" />
                      </div>
                      <div class="service-text">
                          <h4 class="h5 bold">
                              Up to Date Technologies
                          </h4>
                          <p>
                              We use the latest technologies and tools in our projects so yeah you won’t
                              miss anything new here.
                          </p>

                      </div>
                  </li>

                  <li class="wow slideInUp animated" data-wow-delay="0.1s">

                      <div class="service-icon wow zoomIn animated" data-wow-delay="0.6s">

                          <img src="{{url('/')}}/employee/images/h2.svg" alt="" class="img-fluid teamImg" alt="" />

                      </div>
                      <div class="service-text">
                          <h4 class="h5 bold">
                              Flexible Working Hours
                          </h4>
                          <p>
                              Time frames are not our thing, but productivity definitely is
                          </p>
                      </div>
                  </li>
              </ul>
          </div>
          <div class="col-md-4">
              <ul class="services-list services-list2 mt-lg-6">
                  <li class="wow slideInUp animated" data-wow-delay="0.2s">
                      <div class="service-icon wow zoomIn animated" data-wow-delay="0.4s">

                          <img src="{{url('/')}}/employee/images/h3.svg" alt="" class="img-fluid teamImg" alt="" />

                      </div>
                      <div class="service-text">
                          <h4 class="h5 bold">
                              Top-notch Expertise
                          </h4>
                          <p>
                              You will get to work with tech experts and learn from them along your
                              journey
                          </p>
                      </div>
                  </li>
                  <li class="wow slideInUp animated" data-wow-delay="0.3s">
                      <div class="service-icon wow zoomIn animated" data-wow-delay="0.8s">

                          <img src="{{url('/')}}/employee/images/h4.svg" alt="" class="img-fluid teamImg" alt="" />

                      </div>
                      <div class="service-text">
                          <h4 class="h5 bold">
                              Working Remotely
                          </h4>
                          <p>
                              Whether you're at the office or at your favorite cafe, choose what suits
                              you best
                          </p>
                      </div>
                  </li>
              </ul>
          </div>
          <div class="col-md-4">
              <ul class="services-list">
                  <li class="wow slideInUp animated">

                      <div class="service-icon wow zoomIn animated" data-wow-delay="0.2s">

                          <img src="{{url('/')}}/employee/images/h5.svg" alt="" class="img-fluid teamImg" alt="" />

                      </div>
                      <div class="service-text">
                          <h4 class="h5 bold">
                              Learning Opportunities
                          </h4>
                          <p>
                              We provide you with learning resources and training to make sure you’re on
                              top of your game
                          </p>
                      </div>
                  </li>

                  <li class="wow slideInUp animated" data-wow-delay="0.1s">

                      <div class="service-icon wow zoomIn animated" data-wow-delay="0.6s">

                          <img src="{{url('/')}}/employee/images/h6.svg" alt="" class="img-fluid teamImg" alt="" />


                      </div>
                      <div class="service-text">
                          <h4 class="h5 bold">
                              Free COFFEE
                          </h4>
                          <p>
                              YUPE! ALL DAY EVERYDAY!
                          </p>
                      </div>
                  </li>
              </ul>
          </div>
      </div>

  </div>
</section>




<section class="p-section current-vac">
      <div class="container">

          <div class="row">
              <div class="col-md-6">

                  <h2>
                          If you didn't find your role among the current vacancies below, 
                          <span class="blueText">we still want you in our team!</span>
                  </h2>
                  <a href="{{route('register')}}" class="btn btn-dark pr-5 pl-5 mt-4">
                          Join 
                      </a>


                  <h3 class="mt-5 mb-4">
                          Current Vacancies
                  </h3>

                  <div class="wrapper center-block">
                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                              <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  <i data-feather="arrow-down-circle" width="32px" height="32px" style="color: rgb(120, 208, 186);"></i>
                                  Senior Web Designer
                                </a>
                              </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                              <div class="panel-body">
                                      Senior Web Designer is responsible for: designing new concepts for web and mobile applications, landing pages, interactive experiences, information graphics, and branding concepts.
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                              <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  <i data-feather="arrow-down-circle" width="32px" height="32px" style="color: rgb(120, 208, 186);"></i>  
                                  Backend Developer
                                </a>
                              </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                A back-end web developer is responsible for server-side web application logic and integration of the work front-end web developers do. Back-end developers usually write web services and APIs used by front-end developers and mobile application developers.
                              </div>
                            </div>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                              <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      <i data-feather="arrow-down-circle" width="32px" height="32px" style="color: rgb(120, 208, 186);"></i>   
                                  IOS Developer
                                </a>
                              </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                              <div class="panel-body">
                                An iOS developer is responsible for developing applications for mobile devices powered by Apple’s iOS operating system. Ideally, a good iOS developer is proficient with one of the two programming languages for this platform: Objective-C or Swift.
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>


                  
                  </div><!--col-md-6-->

                  <div class="col-md-5 offset-md-1 d-none d-md-block">
                      <img class="img-fluid" alt="" src="{{url('/')}}/employee/images/h-person.png"/>
                  </div>
              </div><!--row-->
                  </div><!--container-->
                  </section>

@endsection
