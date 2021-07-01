<?php

namespace App\Http\Controllers\admin;

use App\EmployeeRole;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class PreviewCandidateResumeController extends Controller
{

  public function coderbyte()
    {
      $data = request()->all();
      $user=User::where('email',$data['email'])->first();
      if($user){
          $CandidateResume=$user->CandidateResume;
          $CandidateResume->final_score=$data['final_score'];
          $CandidateResume->save();
          return response()->json(['success' => 'score has been saved',], 200);
      }
      else
          return response()->json(['error' => 'email doesn\'t match',], 200);

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
    $certifications   =$user->CandidateCertification->sortByDesc(function ($education, $key) {
        return strtotime($education['issue_month'].' ' . $education['issue_year']);
    })->values()->all();

    $exam_links[EmployeeRole::where('name', 'iOS Developer')->first()->id]='https://ibtikar.coderbyte.com/sl-candidate?promo=ibtikartechnologies-ra3ha:ios-assessment-alu04q22ev';
    $exam_links[EmployeeRole::where('name', 'Devops')->first()->id]='Devops url of exam';
    $exam_links[EmployeeRole::where('name', 'Fullstack')->first()->id]='Fullstack url of exam';
    $exam_links[EmployeeRole::where('name', 'Frontend Developer')->first()->id]='https://ibtikar.coderbyte.com/sl-candidate?promo=ibtikartechnologies-ra3ha:angular-assessment-qwotw11m1c';
    $exam_links[EmployeeRole::where('name', 'Product Owner')->first()->id]='Product Owner url of exam';
    $exam_links[EmployeeRole::where('name', 'Android Developer')->first()->id]='https://ibtikar.coderbyte.com/sl-candidate?promo=ibtikartechnologies-ra3ha:android-assessment-v2qoxol4yi';
    $exam_links[EmployeeRole::where('name', 'Quality Control Tester')->first()->id]='Quality Control Tester url of exam';
    $exam_links[EmployeeRole::where('name', 'Product Manager')->first()->id]='https://ibtikar.coderbyte.com/sl-candidate?promo=ibtikartechnologies-ra3ha:c-assessment-no38yk2cep';
    $exam_links[EmployeeRole::where('name', 'Backend Developer')->first()->id]='https://ibtikar.coderbyte.com/sl-candidate?promo=ibtikartechnologies-ra3ha:backend-assessment-34jbuudzt9';
    $exam_links[EmployeeRole::where('name', 'Scrum Master')->first()->id]='Scrum Master url of exam';
    $exam_links[EmployeeRole::where('name', 'Chief Technology Office (CTO)')->first()->id]='Chief Technology Office (CTO) url of exam';
    $exam_links[EmployeeRole::where('name', 'UI/UX Designer')->first()->id]='UI/UX Designer url of exam';
    $exam_links[EmployeeRole::where('name', 'other')->first()->id]='other';

    if($resume->job_search=='Ready to interview')
        $exam_link=$exam_links[$current_role_id];
    else
        $exam_link='';

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
      'exam_link',
      'certifications'
    ));
	}
}
