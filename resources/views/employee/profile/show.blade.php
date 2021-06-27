@extends('employee.layouts.app')

@section('content')

<div class="container">
  <div class="main-body">
  
        <div class="row gutters-sm">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img src="{{ $user->feature_image ? url('/').$user->feature_image : url('/').'/system_images/avatar7.png' }}" alt="Admin" class="rounded-circle" width="150">
                  <div class="mt-3">
                    <h4>{{$user->name}}</h4>
                    <a href="{{route('employee_profile.edit')}}" class="btn btn-primary">Edit</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Full Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$user->name}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$user->email}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Phone</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$user->phone}}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Country</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{$user->country}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

@endsection
