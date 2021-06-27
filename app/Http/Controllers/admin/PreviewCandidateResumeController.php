<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PreviewCandidateResumeController extends Controller
{

  public function coderbyte()
    {
      $data = request()->all();
      return response()->json([
        'status' => $data,
      ], 200);
    }


  // show function
	public function show(\App\User $user){
    $resume = $user->CandidateResume;
    $job_roles        = \App\EmployeeRole::where('name', '!=' , 'Other')->get();
    $current_role_id  = $resume->CandidateSpecialist()->where('current_role', true)->first()->speciality;
    $role             = \App\EmployeeRole::find($current_role_id);
    $current_role     = $role->name;
    $experiences      = \App\EmployeeRoleExperience::get();
    $how_long_id      = $resume->CandidateSpecialist()->where('current_role', true)->first()->how_long;
    $how_long         = \App\EmployeeRoleExperience::find($how_long_id)->name;
    $all_skills       = \App\EmployeeSkill::get();
    $job_skills       = $role->employeeSkills;
    $selected_skills  = $resume->CandidateSkill->pluck('employee_skill_id')->toArray();
    $work_histories   = $user->CandidateWorkHistory;
    $educations       = $user->CandidateEducation;
    $certifications   = $user->CandidateCertification;

    return view('admin.resume.preview.show', compact(
      'user', 
      'resume', 
      'job_roles', 
      'current_role_id', 
      'current_role', 
      'experiences', 
      'how_long_id', 
      'how_long', 
      'all_skills', 
      'job_skills', 
      'selected_skills', 
      'work_histories', 
      'educations',
      'certifications'
    ));
	}
}
