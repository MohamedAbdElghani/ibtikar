<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mail;
use App\Mail\NewTalentResumeSubmittedMail;
use \App\EmployeeRole;
use App\CandidateResume;

class PreviewController extends Controller
{
  // authorize controller
	public function __construct(){
		$this->middleware('role');
	}

// api functions
// apiPreviewResume function
public function apiPreviewResume(){
  $this->authorize('create', CandidateResume::class);
  $user             = auth()->user();
  $resume           = $user->CandidateResume;
  $job_roles        = EmployeeRole::where('name', '!=' , 'Other')->get();
  $current_role_id  = $resume->CandidateSpecialist()->where('current_role', true)->first()->speciality;
  $role             = EmployeeRole::find($current_role_id);
  $current_role     = $role->name;
  $experiences      = \App\EmployeeRoleExperience::get();
  $how_long_id      = $resume->CandidateSpecialist()->where('current_role', true)->first()->how_long;
  $other_role       = EmployeeRole::where('name', '=' , 'Other')->first();
  $how_long         = \App\EmployeeRoleExperience::find($how_long_id)->name;
  $all_skills       = \App\EmployeeSkill::get();
  $job_skills       = $role->employeeSkills;
  $selected_skills  = $resume->CandidateSkill->pluck('employee_skill_id')->toArray();
  $selected_skills_arr = [];
  foreach ($selected_skills as $key => $skill){
    if(\App\EmployeeSkill::find($skill)){
      $selected_skills_arr[$key]['name'] = \App\EmployeeSkill::find($skill)->name;
      $selected_skills_arr[$key]['id'] = $skill;
    }
  }
  $work_histories   = $user->CandidateWorkHistory->sortByDesc(function ($work, $key) {
      return strtotime($work['started_year']);
    })->values()->all();
  $educations       = $user->CandidateEducation->sortByDesc(function ($education, $key) {
      return strtotime($education['start_date']);
    })->values()->all();
  $certifications   = $user->CandidateCertification->sortByDesc(function ($education, $key) {
      return strtotime($education['issue_date']);
    })->values()->all();

  return response()->json([
    'user'            => \App\User::find($user->id),
    'resume'          => CandidateResume::find($resume->id),
    'job_roles'       => $job_roles,
    'current_role_id' => $current_role_id,
    'current_role'    => $current_role,
    'other_role'      => $other_role,
    'experiences'     => $experiences,
    'how_long_id'     => $how_long_id,
    'how_long'        => $how_long,
    'all_skills'      => $all_skills,
    'job_skills'      => $job_skills,
    'selected_skills' => $selected_skills_arr,
    'work_histories'  => $work_histories,
    'educations'      => $educations,
    'certifications'  => $certifications,
  ], 200);
}












  
  ////////////////// previewResume \\\\\\\\\\\\\\\\\\
  // previewResume function
  public function previewResume(){
    $this->authorize('create', CandidateResume::class);

    $user   = auth()->user();
    $resume = $user->CandidateResume;
if($user->id == 234){
  // $resume->update(['pipefy_id' => '']);

}
    if($resume->pipefy_id){
      // return redirect(route('employee_resume.thanks'));
    }
    
    $job_roles        = EmployeeRole::where('name', '!=' , 'Other')->get();
    $current_role_id  = $resume->CandidateSpecialist()->where('current_role', true)->first()->speciality;
    $role             = EmployeeRole::find($current_role_id);
    $current_role     = $role->name;
    $experiences      = \App\EmployeeRoleExperience::get();
    $how_long_id      = $resume->CandidateSpecialist()->where('current_role', true)->first()->how_long;
    $other_role       = EmployeeRole::where('name', '=' , 'Other')->first();
    $how_long         = \App\EmployeeRoleExperience::find($how_long_id)->name;
    $all_skills       = \App\EmployeeSkill::get();
    $job_skills       = $role->employeeSkills;
    $selected_skills  = $resume->CandidateSkill->pluck('employee_skill_id')->toArray();
    $work_histories   = $user->CandidateWorkHistory->sortByDesc(function ($work, $key) {
        return strtotime($work['started_year']);
      })->values()->all();
    $educations       = $user->CandidateEducation->sortByDesc(function ($education, $key) {
        return strtotime($education['start_date']);
      })->values()->all();
    $certifications   = $user->CandidateCertification->sortByDesc(function ($education, $key) {
        return strtotime($education['issue_date']);
      })->values()->all();

    return view('employee.resume.preview.preview_resume', compact(
      'user', 
      'resume', 
      'job_roles', 
      'current_role_id', 
      'current_role', 
      'other_role', 
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


  // submitResume function
  public function submitResume(){
    $this->authorize('create', CandidateResume::class);
    $user                 = auth()->user();
    // if(is_null($user->email_verified_at)){
    //   return response()->json(['message' => 'email unverified'], 401);
    // }
    $resume               = $user->CandidateResume;
    $name                 = $user->name;
    $email                = $user->email;
    $job_search           = $resume->job_search;
    $phone                = $user->phone;
    $profile_url          = route('admin.preview.resume.show', ['user' => $user->id]);
    $current_role_id  = $resume->CandidateSpecialist()->where('current_role', true)->first()->speciality;
    $current_role     = \App\EmployeeRole::find($current_role_id)->name;
    $current_role     = $current_role == 'Other' ? $resume->other_role : $current_role;
    $how_long_id  = $resume->CandidateSpecialist()->where('current_role', true)->first()->how_long;
    $how_long     = \App\EmployeeRoleExperience::find($how_long_id)->name;
    // pipefy
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://app.pipefy.com/queries");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, '{ 
      "query": "mutation{ createCard(input: {pipe_id: 301565221 fields_attributes: [{field_id: \"candidate_name_1\", field_value: \"'.$name.'\"} {field_id: \"candidate_email_1\", field_value: \"'.$email.'\"} {field_id: \"candidate_phone_number_1\", field_value: \"'.$phone.'\"} {field_id: \"current_role\", field_value: \"'.$current_role.'\"} {field_id: \"role_duration\", field_value: \"'.$how_long.'\"} {field_id: \"submission_date\", field_value: \"'.date("Y/m/d").'\"} {field_id: \"job_search_status_1\", field_value: \"'.$job_search.'\"} {field_id: \"talent_portal_profile_1\", field_value: \"'.$profile_url.'\"} ] parent_ids: [\"2735966\"] }) { card {id title }}}"
		}');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  "Content-Type: application/json",
		  "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJ1c2VyIjp7ImlkIjozMDEwNDIwOTAsImVtYWlsIjoicmFteUBhbGV4d2ViZGVzaWduLmNvbSIsImFwcGxpY2F0aW9uIjozMDAwNjg2ODB9fQ.pyUTp5iojIC7cL2lLrHbrj_iDx3XQ4pq0Nxzmw3Q1KYVNdvaW5t3olbsh3TbhnzkBTEDq_x0oawMTlSyDohGhg"
		));
		$response = curl_exec($ch);
		curl_close($ch);
		$pipefy_card = json_decode($response)->data->createCard->card->id;
    $resume->update(['pipefy_id' => $pipefy_card]);
    return response()->json(['message' => 'success'], 200);
  }


  // thank you function
  public function thankYou(){
    $this->authorize('create', CandidateResume::class);

    $resume = auth()->user()->CandidateResume;
    return view('employee.resume.build.thankyou', compact('resume'));
  }



  /////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
  //////////////////////////////// AJAX functions \\\\\\\\\\\\\\\\\\\\\\\\\\\\\
  // ajaxUpdateProfileInfo function
  public function ajaxUpdateProfileInfo(Request $request){
    $this->authorize('create', CandidateResume::class);
    $profile_data = request()->validate([
			'country' 	  => 'string|required',
			'phone' 	    => 'string|required',
			'birthdate'   => 'string|required',
		]);
    $resume_data = request()->validate([
			'github_url' 	      => 'string|nullable',
			'linkedin_url' 	    => 'string|nullable',
		]);
    $user = auth()->user();
    $resume = $user->CandidateResume;
    $user->update($profile_data);
    $resume->update($resume_data);
    return response()->json([
      'success'       => 'Your information updated successfully.',
      'country'       => $user->country,
      'phone'         => $user->phone,
      'birthdate'     => $user->birthdate,
      'github_url'    => $resume->github_url,
      'linkedin_url'  => $resume->linkedin_url,
    ]); 
  }


  // ajaxDeleteVideo function
  public function ajaxDeleteVideo(){
    $this->authorize('create', CandidateResume::class);
    
    $user = auth()->user();
    $resume = $user->CandidateResume;
    $old_video = $resume->camera_time;
    
    $resume->update(['camera_time' => '']);

    if($old_video){
      Storage::delete('public/'.$old_video);
    }
    return response()->json(['success' => 'Your video deleted successfully.']); 
  }


  // ajaxUpdateAbout function
  public function ajaxUpdateAbout(Request $request){
    $this->authorize('create', CandidateResume::class);
    $data = request()->validate([
			'describe_yourself' 	  => 'string|required',
		]);
    $user = auth()->user();
    $user->update($data);
    return response()->json([
      'success' => 'Your information updated successfully.',
      'describe_yourself'    => $data['describe_yourself']
    ]); 
  }


  // ajaxUpdateIntro function
  public function ajaxUpdateIntro(Request $request){
    $this->authorize('create', CandidateResume::class);
    $data = request()->validate([
			'name' 	              => 'string|required',
      'speciality' 	        => 'integer|required|exists:employee_roles,id',
      'other_role' 	        => 'string|nullable',
			'how_long' 	          => 'integer|required',
      'min_base_salary' 	  => 'integer|required',
			'job_search' 	        => 'string|required',
		]);
    $data_user = request()->validate([
			'name' 	  => 'string|required',
		]);
    $data_role = request()->validate([
			'speciality' 	  => 'integer|required',
			'how_long' 	    => 'integer|required',
		]);
    $data_resume = request()->validate([
			'min_base_salary' 	  => 'integer|required',
			'job_search' 	        => 'string|required',
      'other_role' 	        => 'string|nullable',
		]);
    $user           = auth()->user();
    $resume         = $user->CandidateResume;
    $speciality     = $resume->CandidateSpecialist()->where('current_role', true)->first();
    $user->update($data_user);
    $speciality->update($data_role);
    $resume->update($data_resume);
    $current_role_id  = $resume->CandidateSpecialist()->where('current_role', true)->first()->speciality;
    $current_role     = \App\EmployeeRole::find($current_role_id)->name;
    $how_long_id      = $resume->CandidateSpecialist()->where('current_role', true)->first()->how_long;
    $how_long         = \App\EmployeeRoleExperience::find($how_long_id)->name;
    $job_skills       = \App\EmployeeRole::find($current_role_id)->employeeSkills;
    $selected_skills  = $resume->CandidateSkill->pluck('employee_skill_id')->toArray();
    // $skills_html      = '';
    // foreach ($job_skills as $skill){
    //   $skills_html .= '<li class="'.($selected_skills && in_array($skill->id, $selected_skills) ? 'selected' : '').'">
    //             <label class="mb-0" for="employee_skill_'.$skill->id.'">
    //             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
    //               <input type="checkbox" class="opacity-0 checkbox main-skills-checkbox" value="'.$skill->id.'"
    //                   id="employee_skill_'.$skill->id.'" '.($selected_skills && in_array($skill->id, $selected_skills) ? 'checked' : '').'>
    //               '.$skill->name.'
    //             </label>
    //           </li>';
    // }

    return response()->json([
      'success'               => 'Your information updated successfully.',
      'name'                  => $user->name,
      'current_role'          => $current_role,
      'other_role'            => $resume->other_role,
      'how_long'              => $how_long,
      'min_base_salary'       => $resume->min_base_salary,
      'job_search'            => $resume->job_search,
      'job_skills'            => $job_skills,
    ]); 
  }


  // ajaxUpdateSkills function
  public function ajaxUpdateSkills(Request $request){
    $this->authorize('create', CandidateResume::class);
    $data = request()->validate([
			'employee_skill_id.*'  => 'required|integer|exists:employee_skills,id',
		]);
    $custom_skills = request()->validate([
			'top_skills'  => 'nullable|string',
		]);
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
    $selected_skills  = $resume->CandidateSkill->pluck('employee_skill_id')->toArray();
    $all_skills_arr = array();
    foreach($selected_skills as $skill){
      array_push($all_skills_arr, \App\EmployeeSkill::find($skill)->name);
    }
    $explode_tec = explode(',', trim($resume->top_skills)); 
    foreach ($explode_tec as $tec) {
      array_push($all_skills_arr, trim($tec));
    }

    return response()->json([
      'success' => 'Your skills updated successfully.',
      'skills'  => $all_skills_arr
    ]); 
  }


  // ajaxUpdateExperience function
  public function ajaxUpdateExperience(Request $request){
    $this->authorize('create', CandidateResume::class);

    $work_id = request()->validate([
			'wxid'  => 'nullable|integer',
		]);
    $user       = auth()->user();
    $resume  =  $user->CandidateResume;
    if(!empty($work_id) && $work_id['wxid']){
      $work = \App\CandidateWorkHistory::find($work_id['wxid']);
      if($work && $work->candidate_resume_id == $resume->id){
        $data = request()->validate([
          'title'                 => 'required|string',
          'company'               => 'required|string',
          'currently_work_here'   => 'nullable|boolean',
          'started_year'          => 'required|string',
          'ended_year'            => [
            'nullable',
            'string',
            function($attribute, $value, $fail) {
              $started_year = strtotime(request()->get('started_year')); // Retrieve status
              if ($started_year >= strtotime($value)) {
                return $fail('End date must be after Start date.');
              }
            },
          ],
          'accomplishment'        => 'required|string',
        ]);

        if(empty($data['currently_work_here'])){
          $data['currently_work_here'] = false;
        }else{
          $data['ended_year'] = '';
        }
        $work->update($data);
        return response()->json([
          'success' => 'Your information updated successfully.',
          'text'    => $data,
          'work_id' => $work->id
        ]); 
      }else{
        return response()->json(['error' => 'invaild']);
      }
    }else{
      $data = request()->validate([
        'title'                 => 'required|string',
        'company'               => 'required|string',
        'currently_work_here'   => 'nullable|boolean',
        'started_year'          => 'required|string',
        'ended_year'            => [
          'nullable',
          'string',
          function($attribute, $value, $fail) {
            $started_year = strtotime(request()->get('started_year')); // Retrieve status
            if ($started_year >= strtotime($value)) {
              return $fail('End date must be after Start date.');
            }
          },
        ],
        'accomplishment'        => 'required|string',
      ]);
      $data['candidate_resume_id'] = $resume->id;
      if(empty($data['currently_work_here'])){
        $data['currently_work_here'] = false;
      }else{
        $data['ended_year'] = '';
      }
      $work = $user->CandidateWorkHistory()->create($data);
      return response()->json([
        'success' => 'Your information updated successfully.',
        'text'    => $data,
        'work_id' => $work->id,
        'new_work' => true
        ]); 
    }
  }

  public function deleteExperience(Request $request){
    $this->authorize('create', CandidateResume::class);
    $data = request()->validate([
      'delete_wxid'                 => 'required|string',
    ]);
    $work = \App\CandidateWorkHistory::find($data['delete_wxid']);
    $work->delete();

    return response()->json(['success' => "work_id_".$data['delete_wxid']]);
  }
  


  // ajaxUpdateEducation function
  public function ajaxUpdateEducation(Request $request){
    $this->authorize('create', CandidateResume::class);

    $education_id = request()->validate([
			'eduid'  => 'nullable|integer',
		]);
    $user       = auth()->user();
    $resume  =  $user->CandidateResume;
    if(!empty($education_id) && $education_id['eduid']){
      $education = \App\CandidateEducationalBackground::find($education_id['eduid']);
      if($education && $education->candidate_resume_id == $resume->id){
        $data = request()->validate([
          'school'                  => 'required|string',
          'degree'                  => 'required|string',
          'field_study'             => 'required|string',
          'start_date'              => 'required|string',
          'end_date'            => [
            'required',
            'string',
            function($attribute, $value, $fail) {
              $started_year = strtotime(request()->get('start_date')); // Retrieve status
              if ($started_year >= strtotime($value)) {
                return $fail('End date must be after Start date.');
              }
            },
          ],
        ]);
        $education->update($data);
        return response()->json([
          'success'       => 'Your information updated successfully.',
          'text'          => $data,
          'education_id'  => $education->id
        ]); 
      }else{
        return response()->json(['error' => 'invaild']);
      }
    }else{
      $data = request()->validate([
        'school'                  => 'required|string',
        'degree'                  => 'required|string',
        'field_study'             => 'required|string',
        'start_date'              => 'required|string',
        'end_date'            => [
          'required',
          'string',
          function($attribute, $value, $fail) {
            $started_year = strtotime(request()->get('start_date')); // Retrieve status
            if ($started_year >= strtotime($value)) {
              return $fail('End date must be after Start date.');
            }
          },
        ],
      ]);
      $data['candidate_resume_id'] = $resume->id;
      $education = $user->CandidateEducation()->create($data);
      return response()->json([
        'success'       => 'Your information updated successfully.',
        'text'          => $data,
        'education_id'  => $education->id,
        'new_education' => true
      ]); 
    }
  }

  public function deleteEducation(Request $request){
    $this->authorize('create', CandidateResume::class);
    $data = request()->validate([
      'delete_eduid'                 => 'required|string',
    ]);
    $work = \App\CandidateEducationalBackground::find($data['delete_eduid']);
    $work->delete();

    return response()->json(['success' => "education_id_".$data['delete_eduid']]);
  }



  // ajaxUpdateCertification function
  public function ajaxUpdateCertification(Request $request){
    $this->authorize('create', CandidateResume::class);

    $certification_id = request()->validate([
			'certid'  => 'nullable|integer',
		]);
    $user       = auth()->user();
    $resume  =  $user->CandidateResume;
    if(!empty($certification_id) && $certification_id['certid']){
      $certification = \App\CandidateCertification::find($certification_id['certid']);
      if($certification && $certification->candidate_resume_id == $resume->id){
        $data = request()->validate([
          'name'                    => 'required|string',
          'issuing_organization'    => 'required|string',
          'issue_date'              => 'required|string',
          'expiration_date'         => 'nullable|string',
          'credential_id'           => 'nullable|string',
          'credential_url'          => 'nullable|string',
        ]);
        $certification->update($data);
        return response()->json([
          'success'           => 'Your information updated successfully.',
          'text'              => $data,
          'certification_id'  => $certification->id
        ]); 
      }else{
        return response()->json(['error' => 'invaild']);
      }
    }else{
      $data = request()->validate([
        'name'                    => 'required|string',
        'issuing_organization'    => 'required|string',
        'issue_date'              => 'required|string',
        'expiration_date'         => 'nullable|string',
        'credential_id'           => 'nullable|string',
        'credential_url'          => 'nullable|string',
      ]);
      $data['candidate_resume_id'] = $resume->id;
      $certification = $user->CandidateCertification()->create($data);
      return response()->json([
        'success'           => 'Your information updated successfully.',
        'text'              => $data,
        'certification_id'  => $certification->id,
        'new_certification' => true
      ]); 
    }
  }

  public function deleteCertification(Request $request){
    $this->authorize('create', CandidateResume::class);
    $data = request()->validate([
      'delete_certid'                 => 'required|string',
    ]);
    $work = \App\CandidateCertification::find($data['delete_certid']);
    $work->delete();

    return response()->json(['success' => "certificate_id_".$data['delete_certid']]);
  }
}
