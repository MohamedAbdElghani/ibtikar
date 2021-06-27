@extends('employee.layouts.app')

@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{url('/')}}">Ibtikar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link" href="{{route('employee.dashboard')}}">Home</a></li>
        @if(auth()->user() && auth()->user()->role == 'employee')
        <li class="nav-item"><a class="nav-link" href="{{route('employee_resume.create')}}">Resume</a></li>
        @elseif(auth()->user() && auth()->user()->role == 'admin')
        <li class="nav-item"><a class="nav-link" href="{{route('admin.resume.role.index')}}">Job roles</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('admin.resume.skill.index')}}">Job skills</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('admin.resume.experience.index')}}">Job experiences</a></li>
        @endif
      </ul>

      @if(auth()->user())
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hi, {{ auth()->user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('employee_profile.show')}}">My profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{route('employee_profile.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              {{ __('app.sign_out') }}
            </a>
            <form id="logout-form" action="{{route('employee_profile.logout')}}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      </ul>
      @else
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{route('employee_profile.showLoginForm')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">Register</a>
        </li>
      </ul>
      @endif
    </div>
  </div>
</nav>

@endsection
