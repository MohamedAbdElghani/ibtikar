<div class="container innerDashboard">
    <div class="row">
        <div class="col-md-9">
            <h4 class="largeFont h6 mb-4">  {{ __('sidebar.my_squad') }}</h4>
            <p>{{ __('home.squading') }}</p>
            <ul class="stepsAfterContract">
                <li class="done">
                    <div class="">
                        <i data-feather="check"></i>
                        <h5>
                            {{ __('home.analyzing') }}
                        </h5>
                    </div>
                </li>
                <li class="notdone">
                    <div>
                        <h6>
                            {{ __('home.step_2') }}
                        </h6>
                        <i data-feather="check"></i>
                        <img class="mb-3" src="images/interview.svg">
                        <h5>
                            {{ __('home.building') }}
                        </h5>
                    </div>
                </li>
                <li class="notdone">
                    <div>
                        <h6>
                            {{ __('home.step_3') }}
                        </h6>
                        <i data-feather="check"></i>
                        <img class="mb-3" src="images/dashboard.svg">
                        <h5>
                           {{ __('home.creating') }}
                        </h5>
                    </div>
                </li>
            </ul>
        </div>
        
        <div class="col-md-3">

            <div class="leftSide">

                <h3 class="px-30">

                    {{ __('sidebar.build_your_squad') }}

                </h3>

                <ul class="projectList">

                    <li>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check">

                            <polyline points="20 6 9 17 4 12"></polyline>

                        </svg>

                        {{ __('sidebar.send_your') }}

                    </li>



                    <li>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check">

                            <polyline points="20 6 9 17 4 12"></polyline>

                        </svg>

                        {{ __('sidebar.book_your') }}

                    </li>





                    <li>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check">

                            <polyline points="20 6 9 17 4 12"></polyline>

                        </svg>

                        {{ __('sidebar.receive_squad') }}

                    </li>

                    <li>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check">

                            <polyline points="20 6 9 17 4 12"></polyline>

                        </svg>

                        {{ __('sidebar.sign_your') }}

                    </li>

                </ul>



                <div class="yourProject">

                    {{-- <h4>{{ __('sidebar.your_project') }}</h4>



                    <h6>{{ __('sidebar.service_provided') }}</h6>

                    <p>{{ $old_squad->project_service }}</p>



                    <h6>{{ __('sidebar.tec_required') }}</h6>

                    <p>{{ $old_squad->project_technology }}</p>



                    <h6>{{ __('sidebar.squad_size') }}</h6>

                    <p>{{ $old_squad->squad_size }}</p>



                    <h6>{{ __('sidebar.project_status') }}</h6>

                    <p>{{ $old_squad->project_status }}</p> --}}

                </div>

            </div>

        </div>

    </div>

</div>
