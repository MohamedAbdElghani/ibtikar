<?php

namespace App\Http\Controllers\employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\EmployeeRole;
use \App\EmployeeRoleExperience;

class CandidateSpecialistController extends Controller
{
  // authorize controller
	public function __construct(){
		$this->middleware('role');
	}


  ////////////////// primaryRole \\\\\\\\\\\\\\\\\\
  // create function
  public function primaryRole(){
    $job_roles        = EmployeeRole::where('name', '!=' , 'Other')->get();
    $resume           = auth()->user()->CandidateResume;
    $selected_role    = $resume->CandidateSpecialist()->where('current_role', true)->first();
    $selected_role_id = $selected_role ? $selected_role->speciality : false;
    $other_role       = EmployeeRole::where('name', '=' , 'Other')->first();

    return view('employee.resume.build.primary_role', compact('job_roles', 'selected_role_id', 'other_role', 'resume'));
  }

  // store function
	public function primaryRoleStore(){

    // dd(request()->all());
		$data = request()->validate([
			'speciality'  => 'required|string',
		]);

    $resume     = auth()->user()->CandidateResume;
    $selected_role = $resume->CandidateSpecialist()->where('current_role', true)->first();
    $other_role       = EmployeeRole::where('name', '=' , 'Other')->first()->id;

    if($data['speciality'] == $other_role){
      $other_role_data = request()->validate([
        'other_role'  => 'required|string|max:25',
      ]);
      $resume->update($other_role_data);
    }else{
      $resume->update(['other_role' => '']);
    }

    if($selected_role && $selected_role->speciality == $data['speciality']){
      return redirect(route('employee_resume.build.skills'));
    }elseif($selected_role){
      $selected_role->update($data);
      // $resume->CandidateSkill()->delete();
      return redirect(route('employee_resume.build.skills'));
    }

    $user = auth()->user();
    $data['candidate_resume_id']  = $user->CandidateResume->id;
    $data['current_role']         = true;

		$speciality = $user->CandidateSpecialist()->create($data);

		return redirect(route('employee_resume.build.skills'));
	}


  ////////////////// primary-role-experience \\\\\\\\\\\\\\\\\\
  // create function
  public function primaryRoleExperience(){
    $experiences                = EmployeeRoleExperience::get();
    $resume                     = auth()->user()->CandidateResume;
    $speciality                 = $resume->CandidateSpecialist()->where('current_role', true)->first();
    $role                       = EmployeeRole::find($speciality->speciality);
    $selected_experience_id     = $speciality->how_long;

    return view('employee.resume.build.primary_role_experience', compact('resume', 'experiences', 'selected_experience_id', 'role'));
  }

  // store function
	public function postPrimaryRolesExperience(){
		$data = request()->validate([
			'how_long'  => 'required|string',
		]);

    $resume         = auth()->user()->CandidateResume;
    $speciality     = $resume->CandidateSpecialist()->where('current_role', true)->first();
    $selected_experience_id     = $speciality->how_long;

    if($selected_experience_id && $selected_experience_id == $data['how_long']){
      return redirect(route('employee_resume.build.work_history'));
    }

    $speciality->update($data);

		return redirect(route('employee_resume.build.work_history'));
	}




  /////////////////////////// API functions \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
  // apiPrimaryRole function
  public function apiPrimaryRole(){
    $job_roles        = EmployeeRole::where('name', '!=' , 'Other')->get();
    $other_role       = EmployeeRole::where('name', '=' , 'Other')->first();
    $selected_role_id = "";
    if(!auth()->user()->CandidateResume){
      $resume = auth()->user()->CandidateResume()->create();
    }else{
      $resume           = auth()->user()->CandidateResume;
      $selected_role    = $resume->CandidateSpecialist()->where('current_role', true)->first();
      $selected_role_id = $selected_role ? $selected_role->speciality : false;
    }
    return response()->json([
      'job_roles' => $job_roles,
      'selected_role_id' => $selected_role_id,
      'other_role' => $other_role,
      'choosen_other_role' => $resume->other_role,
    ], 200);
  }


  // apiPrimaryRoleStore function
	public function apiPrimaryRoleStore(){
		$data = request()->validate([
			'speciality'  => 'required|integer|exists:employee_roles,id',
		]);
    $resume     = auth()->user()->CandidateResume;
    $selected_role = $resume->CandidateSpecialist()->where('current_role', true)->first();
    $other_role       = EmployeeRole::where('name', '=' , 'Other')->first()->id;
    if($data['speciality'] == $other_role){
      $other_role_data = request()->validate([
        'other_role'  => 'required|string|max:25',
      ]);
      $resume->update($other_role_data);
    }else{
      $resume->update(['other_role' => '']);
    }
    if($selected_role && $selected_role->speciality == $data['speciality']){
      return response()->json([
        'status' => 'Updated Successfully',
      ], 200);
    }elseif($selected_role){
      $selected_role->update($data);
      return response()->json([
        'status' => 'Updated Successfully',
      ], 200);
    }
    $user = auth()->user();
    $data['candidate_resume_id']  = $user->CandidateResume->id;
    $data['current_role']         = true;
		$speciality = $user->CandidateSpecialist()->create($data);

		return response()->json([
      'status' => 'Updated Successfully',
    ], 200);
	}



  // create function
  public function apiPrimaryRoleExperience(){
    $experiences                = EmployeeRoleExperience::get();
    $resume                     = auth()->user()->CandidateResume;
    $speciality                 = $resume->CandidateSpecialist()->where('current_role', true)->first();
    $speciality_title           = EmployeeRole::find($speciality->speciality)->name;
    if($speciality_title == 'Other'){
        $speciality_title=$resume->other_role;
    }
    $selected_experience_id     = $speciality->how_long;
    return response()->json([
      'experiences' => $experiences,
      'selected_experience_id' => $selected_experience_id,
      'speciality' => $speciality_title,
    ], 200);
  }


  // store function
	public function apiPrimaryRoleExperienceStore(){
		$data = request()->validate([
			'how_long'  => 'required|integer',
		]);
    $resume         = auth()->user()->CandidateResume;
    $speciality     = $resume->CandidateSpecialist()->where('current_role', true)->first();
    $speciality->update($data);
    return response()->json([
      'status' => 'Updated Successfully',
    ], 200);
	}



}
