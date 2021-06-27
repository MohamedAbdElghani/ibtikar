<div class="container innerDashboard">
    <div class="row">
        <div class="col-md-9">

            <div class="calendarHeader alertMessage">
                <img src="/images/microphone.svg" alt="" class="img-fluid" />

                <h4 class="mb-0 ml-4">
                    {{ __('profile.you_have_not') }}
                </h4>

                <a href="{{ route('squad.create') }}" class="btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn ml-auto">
                    {{ __('profile.book_your_slot') }}
                </a>

            </div>
            <!--calendarHeader end -->


            <form method="POST" action="/profile" enctype="multipart/form-data">
              @csrf

              <div class="row mt-4">
                <div class="col-md-3">
                    <div class="BigprofileImg">
                      <img src="{{ $user->feature_image ? '/storage/'.$user->feature_image : '/images/default-profile.jpg' }}" class="img-fluid" alt="user" />
                      <a class="cameraIcon">
                        <i data-feather="camera"></i>
                      </a>
                      <input type="file" name="feature_image" class="profile-image-input" accept="image/*">
                      <span class="remove-span">&#10005;</span>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <input class="form-control" type="text" placeholder="{{ __('profile.name') }}" name="name"
                                value="{{ $user->name }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <input class="form-control" type="text" placeholder="{{ __('profile.email') }}"
                                name="email"
                                value="{{ $user->email }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <input class="form-control" type="text" placeholder="{{ __('profile.mobile_no') }}" name="phone"
                                value="{{ $user->phone }}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn ctrl-standard is-reversed typ-subhed fx-sliderIn mt-2">
                                {{ __('profile.save') }}
                            </button>
                        </div>
                    </div>
                </div>
              </div>
            </form>

            <div class="row mt-4">
              <div class="col-md-12">

                  <div class="subscriptions">
                    {{-- <h5>عروض و فعاليات إبتكار</h5> --}}
                    {{-- <hr> --}}

                    <form action="/profile/subscribe-newsletter" method="post">
                      @csrf
                      <div class="d-flex">
                          <div class="form-check">
                              <input class="form-check-input mt-2" type="checkbox" name="subscribe_newsletter"
                                  id="subscribe_newsletter" value="1"
                                  {{ auth()->user()->subscribe_newsletter == 1 ? "checked" : "" }}>
                              <label class="form-check-label px-0" for="subscribe_newsletter">{{ __('profile.subscribe') }}</label>
                              @error('subscribe_newsletter')
                                  <small class="text-danger">{{ $message }}</small>
                              @enderror
                          </div>

                          <button class="btn green-btn ctrl-standard is-reversed typ-subhed fx-sliderIn ml-auto">
                              {{ __('profile.save_subscribe') }}
                          </button>
                      </div>
                    </form>
                  </div>
              </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="leftSide">
                <h3 class="px-30">
                    {{ __('sidebar.build_your_squad') }}
                </h3>
                <ul class="projectList">
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-check">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        {{ __('sidebar.send_your') }}
                    </li>

                    <li class="active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-calendar">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        {{ __('sidebar.book_your') }}
                    </li>


                    <li class="unactive">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-dollar-sign">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                        {{ __('sidebar.receive_squad') }}
                    </li>
                    <li class="unactive">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-pen-tool">
                            <path d="M12 19l7-7 3 3-7 7-3-3z"></path>
                            <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path>
                            <path d="M2 2l7.586 7.586"></path>
                            <circle cx="11" cy="11" r="2"></circle>
                        </svg>
                        {{ __('sidebar.sign_your') }}
                    </li>
                </ul>

                <div class="yourProject">
                    <h4>{{ __('sidebar.your_project') }}</h4>

                    @if($old_squad)
                        <h6>{{ __('sidebar.service_provided') }}</h6>
                        <p>{{ $old_squad->project_service }}</p>

                        <h6>{{ __('sidebar.tec_required') }}</h6>
                        <p>{{ $old_squad->project_technology }}</p>

                        <h6>{{ __('sidebar.squad_size') }}</h6>
                        <p>{{ $old_squad->squad_size }}</p>

                        <h6>{{ __('sidebar.project_status') }}</h6>
                        <p>{{ $old_squad->project_status }}</p>
                        
                        <a href="/squad/create" class="btn ctrl-standard is-reversed typ-subhed fx-sliderIn mr-4">
                            {{ __('profile.book_your_slot') }}
                        </a>
                    @else
                        <a href="/squad/create" class="btn ctrl-standard is-reversed typ-subhed fx-sliderIn mr-4">
                            {{ __('sidebar.start_your_project') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>