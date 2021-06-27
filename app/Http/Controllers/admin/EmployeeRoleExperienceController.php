<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\EmployeeRoleExperience;

class EmployeeRoleExperienceController extends Controller
{
  // authorize controller
	public function __construct(){
		$this->middleware('auth');
	}


  // create function
  public function create(){
    return view('admin.resume.experience.create');
  }


  // store function
	public function store(){
		$data = request()->validate([
			'name'        => 'required|string|unique:employee_role_experiences',
		]);

		$experience = EmployeeRoleExperience::create($data);

		return redirect(route('admin.resume.experience.index'));
	}
  

	// index function
	public function index(){
		$experiences = EmployeeRoleExperience::get();
		
    return view('admin.resume.experience.index', compact('experiences'));
	}


  // // edit function
	public function edit(EmployeeRoleExperience $experience){
		return view('admin.resume.experience.edit', compact('experience'));
	}


  // update function
	public function update(EmployeeRoleExperience $experience){
		$data = request()->validate([
			'name' 	     		=> 'required|string',
		]);

		$experience->update($data);

		return redirect(route('admin.resume.experience.index'));
	}


  // delete function (destroy)
	public function destroy(EmployeeRoleExperience $experience){
		$experience->delete();

		return redirect(route('admin.resume.experience.index'));
	}
}
