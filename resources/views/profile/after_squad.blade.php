<div class="container innerDashboard">
  <div class="row">
    <div class="col-md-2 d-none d-md-block">
      <ul class="rightSideMenu">
        <li class="active"><a href="/profile">بياناتي</a></li>
      </ul>
    </div>

    <div class="col-md-10">
      <form method="POST" action="/profile" enctype="multipart/form-data">
        @csrf
        <div class="row">
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
                <button type="submit" class="btn green-btn ctrl-standard is-reversed typ-subhed fx-sliderIn ml-auto mt-2">
                  {{ __('profile.save') }}
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>

      <div class="row mt-4 mb-5">
        <div class="col-md-12">
          <div class="subscriptions">
              {{-- <h5>عروض و فعاليات إبتكار</h5>
              <hr> --}}

              <form action="/profile/subscribe-newsletter" method="post">
                @csrf
                <div class="d-flex">
                  <div class="form-check">
                    <input class="form-check-input mt-2" type="checkbox" name="subscribe_newsletter"
                      id="subscribe_newsletter" value="1"
                      {{ auth()->user()->subscribe_newsletter == 1 ? "checked" : "" }}>
                    <label class="form-check-label px-0" for="exampleRadios1">{{ __('profile.subscribe') }}</label>
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
  </div>
</div>