<?php

namespace App\Http\Controllers\employee;

use App\CandidateWorkHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidateWorkHistoryController extends Controller
{
  // authorize controller
	public function __construct(){
		$this->middleware('role');
	}


  // show function
  public function show(){   
    $user       = auth()->user();
    $work_histories = $user->CandidateWorkHistory->sortByDesc(function ($work, $key) {
      return strtotime($work['started_year']);
    })->values()->all();
    if(count($work_histories)){
      return view('employee.resume.build.workhistory.show', compact('work_histories'));
    }else{
      return redirect(route('employee_resume.build.work_history.create'));
    }
  }


  // create function
  public function create(){  
    $user       = auth()->user();
    $work_histories = $user->CandidateWorkHistory;
    $cancel_btn = count($work_histories);
    return view('employee.resume.build.workhistory.create', compact('cancel_btn'));
  }


  // store function
	public function store(){
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

    $user       = auth()->user();
    $resume  =  $user->CandidateResume;
    $work_histories = $user->CandidateWorkHistory;
    
    $data['candidate_resume_id'] = $resume->id;

    $user->CandidateWorkHistory()->create($data);

		return redirect(route('employee_resume.build.work_history'));
	}


  // edit function
  public function edit(CandidateWorkHistory $work){  
    $user       = auth()->user();
    $work_histories = $user->CandidateWorkHistory;
    $delete_btn = count($work_histories) > 1;
    return view('employee.resume.build.workhistory.edit', compact('work', 'delete_btn'));
  }


  // update function
	public function update(CandidateWorkHistory $work){
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

    $user       = auth()->user();
    $resume  =  $user->CandidateResume;
    
    $data['candidate_resume_id'] = $resume->id;
    if(empty($data['currently_work_here'])){
      $data['currently_work_here'] = false;
    }

    $work->update($data);

		return redirect(route('employee_resume.build.work_history'));
	}


  // delete function (destroy)
	public function destroy(CandidateWorkHistory $work){
		$work->delete();
		return redirect(route('employee_resume.build.work_history'));
	}



  ///////////////////////////// API functions \\\\\\\\\\\\\\\\\\\\\\\\\\\\\
  // apiShow function
  public function apiShow(){   
    $user           = auth()->user();
    $work_histories = $user->CandidateWorkHistory->sortByDesc(function ($work, $key) {
      return strtotime($work['started_year'].' '.$work['started_year']);
    })->values()->all();
    return response()->json([
      'work_histories' => $work_histories,
    ], 200);
  }


  // apiCreate function
  public function apiCreate(){  
    $user           = auth()->user();
    $work_histories = $user->CandidateWorkHistory;
    $cancel_btn     = count($work_histories) ? true : false;
    return response()->json([
      'cancel_btn' => $cancel_btn,
    ], 200);
  }


  // apiStore function
	public function apiStore(){
		$data = request()->validate([
			'title'                 => 'required|string',
			'company'               => 'required|string',
			'currently_work_here'   => 'nullable|boolean',
			'started_month'         => 'required|string',
			'started_year'          => 'required|string',
			'ended_month'           => 'nullable|string',
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
			'accomplishment'        => 'required|string',
		]);
    $user                         = auth()->user();
    $resume                       =  $user->CandidateResume;
    $data['candidate_resume_id']  = $resume->id;
    $CandidateWorkHistory         = $user->CandidateWorkHistory()->create($data);
    return response()->json([
      'work_history' => $CandidateWorkHistory,
    ], 200);
	}


  // apiEdit function
  public function apiEdit($lang, CandidateWorkHistory $work){  
    $user           = auth()->user();
    $work_histories = $user->CandidateWorkHistory;
    $delete_btn     = count($work_histories) > 1;
    return response()->json([
      'work' => $work,
      'delete_btn' => $delete_btn,
    ], 200);
  }


  // apiUpdate function
	public function apiUpdate($lang, CandidateWorkHistory $work){
		$data = request()->validate([
			'title'                 => 'required|string',
			'company'               => 'required|string',
			'currently_work_here'   => 'nullable|boolean',
			'started_month'         => 'required|string',
			'started_year'          => 'required|string',
			'ended_month'           => 'nullable|string',
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
			'accomplishment'        => 'required|string',
		]);
    $user                         = auth()->user();
    $resume                       =  $user->CandidateResume;
    $data['candidate_resume_id']  = $resume->id;
    if(empty($data['currently_work_here'])){
      $data['currently_work_here'] = false;
    }
    $work->update($data);
    return response()->json([
      'work_history' => $work,
    ], 200);
	}


  // delete function (apiDestroy)
	public function apiDestroy($lang, CandidateWorkHistory $work){
		$work->delete();
		return response()->json([
      'status' => 'Deleted Successfully',
    ], 200);
	}




}
