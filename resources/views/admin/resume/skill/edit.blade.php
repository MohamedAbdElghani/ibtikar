@extends('employee.layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit {{ $skill->name }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.resume.skill.update', ['skill' => $skill->id]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Job Skill Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?? $skill->name }}" required>

                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Job roles') }}</label>

                          <div class="col-md-6">
                              <select class="selectpicker form-control" multiple data-live-search="true" name="role_id[]" id="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}" {{ $skills && in_array($role->id, $skills) ? 'selected' : '' }}
                                      >{{$role->name}}</option>
                                @endforeach
                              </select>

                              @error('role_id')
                                  <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
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
@endsection