<?php

namespace App\Http\Controllers\employee;

use App\CandidateEducationalBackground;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidateEducationalBackgroundController extends Controller
{
  // authorize controller
	public function __construct(){
		$this->middleware('role');
	}


  // show function
  public function show(){   
    $user       = auth()->user();
    $educations = $user->CandidateEducation->sortByDesc(function ($education, $key) {
      return strtotime($education['start_date']);
    })->values()->all();
    if(count($educations)){
      return view('employee.resume.build.education.show', compact('educations'));
    }else{
      return redirect(route('employee_resume.build.education.create'));
    }
  }


  // create function
  public function create(){  
    $user       = auth()->user();
    $educations = $user->CandidateEducation;
    $cancel_btn = count($educations);
    return view('employee.resume.build.education.create', compact('cancel_btn'));
  }


  // store function
	public function store(){
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

    $user       = auth()->user();
    $resume  =  $user->CandidateResume;
    
    $data['candidate_resume_id'] = $resume->id;

    $user->CandidateEducation()->create($data);

		return redirect(route('employee_resume.build.education'));
	}


  // edit function
  public function edit(CandidateEducationalBackground $education){  
    $user       = auth()->user();
    $educations = $user->CandidateEducation;
    $delete_btn = count($educations) > 1;
    return view('employee.resume.build.education.edit', compact('education', 'delete_btn'));
  }


  // update function
	public function update(CandidateEducationalBackground $education){
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

		return redirect(route('employee_resume.build.education'));
	}


  // delete function (destroy)
	public function destroy(CandidateEducationalBackground $education){
		$education->delete();
		return redirect(route('employee_resume.build.education'));
	}



  ///////////////////////////// API functions \\\\\\\\\\\\\\\\\\\\\\\\\\\\\
  // apiShow function
  public function apiShow(){   
    $user       = auth()->user();
    $educations = $user->CandidateEducation->sortByDesc(function ($education, $key) {
      return strtotime($education['started_month'].' '.$education['started_year']);
    })->values()->all();
    return response()->json([
      'educations' => $educations,
    ], 200);
  }


  // apiCreate function
  public function apiCreate(){  
    $user       = auth()->user();
    $educations = $user->CandidateEducation;
    $cancel_btn = count($educations) > 0;
    return response()->json([
      'cancel_btn' => $cancel_btn,
    ], 200);
  }


  // apiStore function
	public function apiStore(){
		$data = request()->validate([
			'school'                  => 'required|string',
			'degree'                  => 'required|string',
			'field_study'             => 'required|string',
      'started_month'           => 'required|string',
			'started_year'            => 'required|string',
			'ended_month'             => 'nullable|string',
      'ended_year'            => [
        'nullable',
        'string',
        function($attribute, $value, $fail) {
          $started_year = strtotime('1-'.request()->get('started_month').'-'.request()->get('started_year'));
          $ended_year   = strtotime('1-'.request()->get('ended_month').'-'.$value);
          if ($started_year >= $ended_year) {
            return $fail('End date must be after Start date.');
          }
        },
      ],
		]);
    $user       = auth()->user();
    $resume     =  $user->CandidateResume;
    $data['candidate_resume_id'] = $resume->id;
    $education = $user->CandidateEducation()->create($data);
		return response()->json([
      'education' => $education,
    ], 200);
	}


  // apiEdit function
  public function apiEdit($lang, CandidateEducationalBackground $education){  
    $user       = auth()->user();
    $educations = $user->CandidateEducation;
    $delete_btn = count($educations) > 1;
    return response()->json([
      'education' => $education,
      'delete_btn' => $delete_btn,
    ], 200);
  }


  // apiUpdate function
	public function apiUpdate($lang, CandidateEducationalBackground $education){
		$data = request()->validate([
			'school'                  => 'required|string',
			'degree'                  => 'required|string',
			'field_study'             => 'required|string',
      'started_month'           => 'required|string',
			'started_year'            => 'required|string',
			'ended_month'             => 'nullable|string',
			'ended_year'            => [
        'nullable',
        'string',
        function($attribute, $value, $fail) {
          $started_year = strtotime('1-'.request()->get('started_month').'-'.request()->get('started_year'));
          $ended_year   = strtotime('1-'.request()->get('ended_month').'-'.$value);
          if ($started_year >= $ended_year) {
            return $fail('End date must be after Start date.');
          }
        },
      ],
		]);
    $education->update($data);
		return response()->json([
      'status' => 'Updated Successfully',
      'education' => $education,
    ], 200);
  }


  // delete function (apiDestroy)
	public function apiDestroy($lang, CandidateEducationalBackground $education){
		$education->delete();
		return response()->json([
      'status' => 'Deleted Successfully',
    ], 200);
	}



}
