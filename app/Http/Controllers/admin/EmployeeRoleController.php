<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\EmployeeRole;

class EmployeeRoleController extends Controller
{
  // authorize controller
	public function __construct(){
		$this->middleware('auth');
	}


  // create function
  public function create(){
    // $this->authorize('create', Course::class);
    
    return view('admin.resume.role.create');
  }


  // store function
	public function store(){
		// $this->authorize('create', Course::class);

		$data = request()->validate([
			'name' 	     		=> 'required|string|unique:employee_roles',
		]);

		$job_role = EmployeeRole::create($data);

		return redirect(route('admin.resume.role.index'));
	}
  

	// index function
	public function index(){
		$job_roles = EmployeeRole::get();
		
    return view('admin.resume.role.index', compact('job_roles'));
	}


  // // edit function
	public function edit(EmployeeRole $role){
		// $this->authorize('create', Course::class);

		return view('admin.resume.role.edit', compact('role'));
	}


  // update function
	public function update(EmployeeRole $role){
		// $this->authorize('create', Course::class);
		
		$data = request()->validate([
			'name' 	     		=> 'required|string',
		]);

		$role->update($data);

		return redirect(route('admin.resume.role.index'));
	}


  // delete function (destroy)
	public function destroy(EmployeeRole $role){
		// $this->authorize('create', Course::class);

		$role->delete();

		return redirect(route('admin.resume.role.index'));
	}
    
}
