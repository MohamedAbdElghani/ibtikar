<?php

namespace App\Http\Controllers\employee;


use App\CandidateCertification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidateCertificationController extends Controller
{
  // authorize controller
	public function __construct(){
		$this->middleware('role');
	}


  // show function
  public function show(){
    $user           = auth()->user();
    $certifications = $user->CandidateCertification->sortByDesc(function ($education, $key) {
      return strtotime($education['issue_month'].' ' . $education['issue_year']);
    })->values()->all();
    if(count($certifications)){
      return view('employee.resume.build.certification.show', compact('certifications'));
    }else{
      return redirect(route('employee_resume.build.certification.create'));
    }
  }


  // create function
  public function create(){
    $user           = auth()->user();
    $certifications = $user->CandidateCertification;
    $cancel_btn     = count($certifications);
    return view('employee.resume.build.certification.create', compact('cancel_btn'));
  }


  // store function
	public function store(){
		$data = request()->validate([
			'name'                    => 'required|string',
			'issuing_organization'    => 'required|string',
			'issue_date'              => 'required|string',
			'expiration_date'         => [
        'nullable',
        'string',
        function($attribute, $value, $fail) {
          $started_year = strtotime(request()->get('issue_date')); // Retrieve status
          if ($started_year >= strtotime($value)) {
            return $fail('Expiration date must be after Issue date.');
          }
        },
      ],
			'credential_id'           => 'nullable|string',
			'credential_url'          => 'nullable|string',
		]);

    $user       = auth()->user();
    $resume     =  $user->CandidateResume;

    $data['candidate_resume_id'] = $resume->id;

    $user->CandidateCertification()->create($data);

		return redirect(route('employee_resume.build.certification'));
	}


  // edit function
  public function edit(CandidateCertification $certification){
    return view('employee.resume.build.certification.edit', compact('certification'));
  }


  // update function
	public function update(CandidateCertification $certification){
		$data = request()->validate([
			'name'                    => 'required|string',
			'issuing_organization'    => 'required|string',
			'issue_date'              => 'required|string',
      'expiration_date'         => [
        'nullable',
        'string',
        function($attribute, $value, $fail) {
          $started_year = strtotime(request()->get('issue_date')); // Retrieve status
          if ($started_year >= strtotime($value)) {
            return $fail('Expiration date must be after Issue date.');
          }
        },
      ],
			'credential_id'           => 'nullable|string',
			'credential_url'          => 'nullable|string',
		]);

    $certification->update($data);

		return redirect(route('employee_resume.build.certification'));
	}


  // delete function (destroy)
	public function destroy(CandidateCertification $certification){
		$certification->delete();
		return redirect(route('employee_resume.build.certification'));
	}



  ///////////////////////////// API functions \\\\\\\\\\\\\\\\\\\\\\\\\\\\\
  // apiShow function
  public function apiShow(){
    $user           = auth()->user();
    $certifications = $user->CandidateCertification->sortByDesc(function ($education, $key) {
      return strtotime($education['issue_month'].' '.$education['issue_year']);
    })->values()->all();
    return response()->json([
      'certifications' => $certifications,
    ], 200);
  }


  // apiCreate function
  public function apiCreate(){
    $user           = auth()->user();
    $certifications = $user->CandidateCertification;
    $cancel_btn     = count($certifications) > 0;
    return response()->json([
      'cancel_btn' => $cancel_btn,
    ], 200);
  }


  // apiStore function
	public function apiStore(){
		$data = request()->validate([
			'name'                    => 'required|string',
			'issuing_organization'    => 'required|string',
			'issue_month'             => 'required|string',
			'issue_year'              => 'required|string',
			'expiration_month'        => 'nullable|string',
			'expiration_year'         => [
        'nullable',
        'string',
        function($attribute, $value, $fail) {
          $started_year = strtotime('1-'.request()->get('issue_month').'-'.request()->get('issue_year'));
          $ended_year   = strtotime('1-'.request()->get('expiration_month').'-'.$value);
          if ($started_year >= $ended_year) {
            return $fail('Expiration date must be after Start date.');
          }
        },
      ],
			'credential_id'           => 'nullable|string',
			'credential_url'          => 'nullable|string',
		]);
    $user       = auth()->user();
    $resume     =  $user->CandidateResume;
    $data['candidate_resume_id'] = $resume->id;
    $certification = $user->CandidateCertification()->create($data);
		return response()->json([
      'certification' => $certification,
    ], 200);
	}


  // apiEdit function
  public function apiEdit($lang, CandidateCertification $certification){
    return response()->json([
      'certification' => $certification,
    ], 200);
  }


  // apiUpdate function
	public function apiUpdate($lang, CandidateCertification $certification){
		$data = request()->validate([
			'name'                    => 'required|string',
			'issuing_organization'    => 'required|string',
			'issue_month'             => 'required|string',
			'issue_year'              => 'required|string',
			'expiration_month'        => 'nullable|string',
			'expiration_year'         => [
        'nullable',
        'string',
        function($attribute, $value, $fail) {
          $started_year = strtotime('1-'.request()->get('issue_month').'-'.request()->get('issue_year'));
          $ended_year   = strtotime('1-'.request()->get('expiration_month').'-'.$value);
          if ($started_year >= $ended_year) {
            return $fail('Expiration date must be after Start date.');
          }
        },
      ],
			'credential_id'           => 'nullable|string',
			'credential_url'          => 'nullable|string',
		]);
    $certification->update($data);
		return response()->json([
      'status' => 'Updated Successfully',
      'certification' => $certification,
    ], 200);
	}


  // delete function (apiDestroy)
	public function apiDestroy($lang, CandidateCertification $certification){
		$certification->delete();
		return response()->json([
      'status' => 'Deleted Successfully',
    ], 200);
	}


}
