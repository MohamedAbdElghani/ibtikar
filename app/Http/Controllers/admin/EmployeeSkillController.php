<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\EmployeeSkill;
use \App\EmployeeRole;

class EmployeeSkillController extends Controller
{
  // authorize controller
	public function __construct(){
		$this->middleware('auth');
	}


  // create function
  public function create(){
    $roles = EmployeeRole::get();
    return view('admin.resume.skill.create', compact('roles'));
  }


  // store function
	public function store(){
		$data = request()->validate([
			'name'        => 'required|string|unique:employee_skills',
		]);

    $roles_ids = request()->validate([
      'role_id'   => 'required',
		]);

		$job_skill = EmployeeSkill::create($data);

    $roles = EmployeeRole::find($roles_ids['role_id']);
    $job_skill->employeeRoles()->attach($roles);

		return redirect(route('admin.resume.skill.index'));
	}
  

	// index function
	public function index(){
		$job_skills = EmployeeSkill::get();
    return view('admin.resume.skill.index', compact('job_skills'));
	}


  // // edit function
	public function edit(EmployeeSkill $skill){
    $roles = EmployeeRole::get();
    $skills = $skill->employeeRoles->pluck('id')->toArray();

		return view('admin.resume.skill.edit', compact('skill', 'roles', 'skills'));
	}


  // update function
	public function update(EmployeeSkill $skill){
		$data = request()->validate([
			'name'        => 'required|string',
		]);

    $roles_ids = request()->validate([
      'role_id'   => 'required',
		]);

    $skill->update($data);

    $roles = EmployeeRole::find($roles_ids['role_id']);
    $skill->employeeRoles()->sync($roles);

		return redirect(route('admin.resume.skill.index'));
	}


  // delete function (destroy)
	public function destroy(EmployeeSkill $skill){
		$skill->delete();

		return redirect(route('admin.resume.skill.index'));
	}

}
