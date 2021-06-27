@extends('employee.layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12 p-5">
        <div class="card">
        	<div class="card-body">
            <div class="d-flex justify-content-between">
              <h5 class="pb-3 border-bottom mb-3">All Job Experiences</h5>
              <span><a href="{{route('admin.resume.experience.create')}}" class="btn btn-secondary btn-sm mr-3">Add new job experience</a></span>
            </div>
        		<ul class="list-group">
        			@foreach ($experiences as $experience)
        				<li class="list-group-item d-flex justify-content-between">
                    <span>{{ $experience->name }}</span>

                    <div class="d-flex justify-content-between">
                      <a href="{{route('admin.resume.experience.edit', ['experience' => $experience->id])}}" class="btn btn-primary btn-sm mr-3">Edit</a>
                      
                      <form action="{{ route('admin.resume.experience.delete', ['experience' => $experience->id]) }}" method="post" onsubmit="return confirm('Do you really want to delete this?');">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Delete</button>
                      </form>
                    </div>
                </li>
        			@endforeach
        		</ul>
        	</div>
        </div>
    </div>
</div>

@endsection
