<?php

namespace App\Http\Controllers\employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\EmployeeSkill;
use \App\EmployeeRole;

class CandidateSkillController extends Controller
{
  // authorize controller
	public function __construct(){
		$this->middleware('role');
	}


  // create function
  public function create(){
    $resume           = auth()->user()->CandidateResume;
    $role_id          = $resume->CandidateSpecialist()->where('current_role', true)->first()->speciality;
    $role             = EmployeeRole::find($role_id);
    $job_skills       = $role->employeeSkills;
    $selected_skills  = $resume->CandidateSkill->pluck('employee_skill_id')->toArray();
    $all_skills       = EmployeeSkill::get();
    return view('employee.resume.build.skills', compact('job_skills', 'selected_skills', 'resume', 'all_skills'));
  }


  // store function
	public function store(){
		$data = request()->validate([
			'employee_skill_id.*'  => 'required|string',
		]);
    $custom_skills = request()->validate([
			'top_skills'  => 'nullable|string',
		]);

    $user       = auth()->user();
    $resume  =  $user->CandidateResume;
    $resume_id  =  $resume->id;
    $selected_skills = $resume->CandidateSkill->pluck('employee_skill_id')->toArray();

    $resume->update($custom_skills);
    
    // if($selected_skills && !array_diff($selected_skills, $data['employee_skill_id'])){
    //   // dd($data['employee_skill_id']);
    //   dd(array_diff($selected_skills, $data['employee_skill_id']));
    //   return redirect(route('employee_resume.build.primary_role_experience'));
    // }
    
    $user->CandidateSkill()->delete();
    
    foreach($data['employee_skill_id'] as $employee_skill_id){
      $arr['employee_skill_id']     = $employee_skill_id;
      $arr['candidate_resume_id']   = $resume_id;
      $user->CandidateSkill()->create($arr);
    }

		return redirect(route('employee_resume.build.primary_role_experience'));
	}








  //////////////////////////////// API functions \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
  // apiSkill function
  public function apiSkill(){
    $resume           = auth()->user()->CandidateResume;
    $role_id          = $resume->CandidateSpecialist()->where('current_role', true)->first()->speciality;
    $role             = EmployeeRole::find($role_id);
    $job_skills       = $role->employeeSkills;
    $selected_skills  = $resume->CandidateSkill->pluck('employee_skill_id')->toArray();
    $all_skills       = EmployeeSkill::get();
    $explode_skill = explode(',', trim($resume->top_skills)); 
    $top_skills_arr = array();
    if(!empty($resume->top_skills)){
      foreach ($explode_skill as $skill) {
          array_push($top_skills_arr, trim($skill));
      }
    }
    $selected_skills_arr = [];
    foreach ($selected_skills as $key => $skill){
      if(\App\EmployeeSkill::find($skill)){
        $selected_skills_arr[$key]['name'] = \App\EmployeeSkill::find($skill)->name;
        $selected_skills_arr[$key]['id'] = $skill;
      }
    }
    return response()->json([
      'job_skills' => $job_skills,
      'all_skills' => $all_skills,
      'selected_skills' => $selected_skills_arr,
      'top_skills_arr' => $top_skills_arr,
    ], 200);
  }

  // apiSkillStore function
	public function apiSkillStore(){
		$data = request()->validate([
      "employee_skill_id"    => "required|array",
      "employee_skill_id.*"  => "required|integer|exists:employee_skills,id",
		]);
    // return response()->json($data['employee_skill_id'][0]);
    $custom_skills_arr = request()->validate([
			'top_skills'  => 'nullable|array',
		]);
    $custom_skills['top_skills'] = implode(',', $custom_skills_arr['top_skills']);
    $user       = auth()->user();
    $resume  =  $user->CandidateResume;
    $resume_id  =  $resume->id;
    $resume->update($custom_skills);
    $user->CandidateSkill()->delete();
    foreach($data['employee_skill_id'] as $employee_skill_id){
      $arr['employee_skill_id']     = $employee_skill_id;
      $arr['candidate_resume_id']   = $resume_id;
      $user->CandidateSkill()->create($arr);
    }

		return response()->json([
      'status' => 'Updated Successfully',
    ], 200);
	}
}
