@extends('employee.layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12 p-5">
        <div class="card">
        	<div class="card-body">
            <div class="d-flex justify-content-between">
              <h5 class="pb-3 border-bottom mb-3">All Job Skills</h5>
              <span><a href="{{route('admin.resume.skill.create')}}" class="btn btn-secondary btn-sm mr-3">Add new job skill</a></span>
            </div>
        		<ul class="list-group">
        			@foreach ($job_skills as $skill)
        				<li class="list-group-item d-flex justify-content-between">
                    <span>{{ $skill->name }}</span>

                    <div class="d-flex justify-content-between">
                      <a href="{{route('admin.resume.skill.edit', ['skill' => $skill->id])}}" class="btn btn-primary btn-sm mr-3">Edit</a>
                      
                      <form action="{{ route('admin.resume.skill.delete', ['skill' => $skill->id]) }}" method="post" onsubmit="return confirm('Do you really want to delete this?');">
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
