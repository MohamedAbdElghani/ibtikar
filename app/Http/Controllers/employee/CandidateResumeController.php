<?php

namespace App\Http\Controllers\employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\CandidateResume;


class CandidateResumeController extends Controller
{
    
  // authorize controller
	public function __construct(){
		$this->middleware('role');
	}


  // create function
  public function create(){
    $this->authorize('create', CandidateResume::class);
    
    if(!auth()->user()->CandidateResume){
      $resume = auth()->user()->CandidateResume()->create();
    }
    return redirect(route('employee_resume.build.primary_role'));
  }


  ////////////////// Job Search Status \\\\\\\\\\\\\\\\\\
  // create function
  public function jobSearchStatus(){
    $this->authorize('create', CandidateResume::class);

    $resume = auth()->user()->CandidateResume;
    return view('employee.resume.build.job_search', compact('resume'));
  }


  // store function
  public function jobSearchStatusStore(){
    $this->authorize('create', CandidateResume::class);

    $user   = auth()->user();
    $resume = $user->CandidateResume;

    $data = request()->validate([
      'job_search'  => 'required|string',
    ]);

    $resume->update($data);

    return redirect(route('employee_resume.build.preferred_salary'));
  }


  ////////////////// Preferred Salary  \\\\\\\\\\\\\\\\\\
  // create function
  public function preferredSalary(){
    $this->authorize('create', CandidateResume::class);

    $resume = auth()->user()->CandidateResume;
    return view('employee.resume.build.preferred_salary', compact('resume'));
  }


  // store function
  public function preferredSalaryStore(){
    $this->authorize('create', CandidateResume::class);

    $user   = auth()->user();
    $resume = $user->CandidateResume;

    $data = request()->validate([
      'min_base_salary'  => 'required|integer|min:1',
    ]);

    $resume->update($data);

    return redirect(route('employee_resume.build.camera_time'));
  }


  ////////////////// Camera Time \\\\\\\\\\\\\\\\\\
  // create function
  public function cameraTime(){
    $this->authorize('create', CandidateResume::class);

    $resume = auth()->user()->CandidateResume;
    return view('employee.resume.build.camera_time', compact('resume'));
  }


  // store function
  public function cameraTimeStore(){
    $this->authorize('create', CandidateResume::class);

    $user = auth()->user();
    $resume = $user->CandidateResume;
    $data = request()->validate([
      'file' => 'required|mimetypes:video/x-flv,video/quicktime,video/x-msvideo,video/mp4',
      ]);

    $old_video = $resume->camera_time;
    $filename = request('file')->getClientOriginalName(); 
    $filePath = request('file')->storeAs('camera-time-videos/'.date("Y").'/'.date("m"), $user->id.'_'.$filename, 'public');
    $fileArray =  ['camera_time' => $filePath];
    
    $resume->update($fileArray);

    if($resume->camera_time != $old_video){
      Storage::delete('public/'.$old_video);
    }
    
    return response()->json(['success' => $filePath]);
  }



  ////////////////// onlinePresence \\\\\\\\\\\\\\\\\\
  // create function
  public function onlinePresence(){
    $this->authorize('create', CandidateResume::class);

    $resume = auth()->user()->CandidateResume;
    return view('employee.resume.build.online_presence', compact('resume'));
  }


  // store function
  public function onlinePresenceStore(){
    $this->authorize('create', CandidateResume::class);

    $user   = auth()->user();
    $resume = $user->CandidateResume;

    $data = request()->validate([
      'cv_file'    		        => 'required|string',
      'linkedin_url'    		  => 'nullable|string',
      'personal_website_url'  => 'nullable|string',
      'github_url'    		    => 'nullable|string',
      'dribbble_url'    		  => 'nullable|string',
    ]);

    $resume->update($data);

    return redirect(route('employee_resume.build.previewResume'));
  }


  // onlinePresenceStoreFile function
  public function onlinePresenceStoreFile(Request $request){
    $this->authorize('create', CandidateResume::class);
    
    $user = auth()->user();
    $resume = $user->CandidateResume;
    $data = request()->validate([
      'file' => 'required|mimes:csv,pdf,doc,docx,txt',
    ]);
    $old_cv = $resume->cv_file;
    $filename = request('file')->getClientOriginalName(); 
    $filePath = request('file')->storeAs('cv-files/'.date("Y").'/'.date("m"), $user->id.'_'.$filename, 'public' );
    $fileArray =  ['cv_file' => $filePath];

    $resume->update($fileArray);

    if($resume->cv_file != $old_cv){
      Storage::delete('public/'.$old_cv);
    }

    return response()->json(['success' => $filePath]);
  }






  ///////////////////////////// API functions \\\\\\\\\\\\\\\\\\\\\\\\\\\\\

  // apiCameraTime
  public function apiCameraTime(){
    $resume = auth()->user()->CandidateResume;
    return response()->json([
      'camera_time' => $resume->camera_time,
    ], 200);
  }


  // apiJobSearchStatus function
  public function apiJobSearchStatus(){
    $resume = auth()->user()->CandidateResume;
    return response()->json([
      'job_search' => $resume->job_search,
    ], 200);
  }


  // apiJobSearchStatusStore function
  public function apiJobSearchStatusStore(){
    $user   = auth()->user();
    $resume = $user->CandidateResume;
    $data = request()->validate([
      'job_search'  => 'required|string',
    ]);
    $resume->update($data);
    return response()->json([
      'Status' => "Updated successfully",
      'resume' => $resume,
    ], 200);
  }


  // apiPreferredSalary function
  public function apiPreferredSalary(){
    $resume = auth()->user()->CandidateResume;
    return response()->json([
      'min_base_salary' => $resume->min_base_salary,
    ], 200);
  }


  // apiPreferredSalaryStore function
  public function apiPreferredSalaryStore(){
    $user   = auth()->user();
    $resume = $user->CandidateResume;
    $data = request()->validate([
      'min_base_salary'  => 'required|integer|min:1',
    ]);
    $resume->update($data);
    return response()->json([
      'Status' => "Updated successfully",
      'resume' => $resume,
    ], 200);
  }



  // apiOnlinePresence function
  public function apiOnlinePresence(){
    $resume = auth()->user()->CandidateResume;
    return response()->json([
      'linkedin'  => $resume->linkedin_url,
      'github'    => $resume->github_url,
      'cv_file'   => $resume->cv_file,
    ], 200);
  }


  // apiOnlinePresenceStore function
  public function apiOnlinePresenceStore(){
    $user   = auth()->user();
    $resume = $user->CandidateResume;

    $data = request()->validate([
      'linkedin_url'    		  => 'nullable|string',
      'github_url'    		    => 'nullable|string',
    ]);

    $resume->update($data);
    return response()->json([
      'Status' => "Updated successfully",
      'resume' => $resume,
    ], 200);
  }

  



}
