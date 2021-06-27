<?php

namespace App\Http\Controllers\employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\CandidateResume;

class EmployeeProfileController extends Controller
{

    // dashboard function
    public function dashboard() {
      // $this->authorize('create', CandidateResume::class);
      return view('employee.layouts.home');

    	$user = auth()->user();
      if($user && $user->role == 'employee'){
        if($user->CandidateResume && $user->CandidateResume->pipefy_id){
          return redirect(route('employee_resume.build.previewResume'));
        }else{
          return redirect(route('employee_profile.compelete'));
        }
      }elseif($user && $user->role == 'client'){
        return redirect('/');
      }else{
        return view('employee.layouts.home');
      }
    }


    // show function
    public function show() {
      $this->authorize('create', CandidateResume::class);

    	$user = auth()->user();
     	return view('employee.profile.show', compact('user'));
    }


    // edit function
    public function edit() {
      $this->authorize('create', CandidateResume::class);

    	$user = auth()->user();
     	return view('employee.profile.edit', compact('user'));
    }


    // update function
    public function update(){
      $this->authorize('create', CandidateResume::class);

    	$user = auth()->user();

    	$data = request()->validate([
        'name'          => ['required', 'string', 'max:255'],
        'country'       => ['nullable', 'string', 'max:255'],
        'phone'         => ['nullable', 'string','regex:/(01)[0-9]{9}/', 'max:255'],
        'feature_image' => ['nullable', 'image'],
      ]);
        
    	if (request('password')) {
    		$password = request()->validate( ['password' => ['required', 'string', 'min:8', 'confirmed']] );
    		$passwordArray = ['password' => Hash::make($password['password'])];
    	}

    	if (request('feature_image')) {
    		$imagePath = request('feature_image')->store('uploads', 'public');
    		$image = Image::make('storage/'.$imagePath);
    		$image->save();
    		$imgArray = ['feature_image' => '/storage/'.$imagePath];
    	}
      
    	$data = array_merge( $data, $passwordArray ?? [] );
    	$data = array_merge( $data, $imgArray ?? [] );
      
	    $user->update($data);

	    return redirect(route('employee_profile.show'));
    }


    // loginCredentials form function
    public function loginCredentials(){
      $this->authorize('create', CandidateResume::class);

      $user = auth()->user();
      return response()->json(['user' => $user->email], 200);
      // return view('employee.profile.login-credentials', compact('user'));
    }


    // loginCredentialsUpdate form function
    public function loginCredentialsUpdate(Request $request){
      $this->authorize('create', CandidateResume::class);
      
      $user = auth()->user();
      $data = [];

      $this->validate($request, [
        'password'      => 'required',
        'new_password'  => 'nullable|min:8|different:password',
      ]);
      
      if (Hash::check($request->password, $user->password)) { 
        if (request('email') && request('email') != $user->email) {
          request()->validate(['email' => ['required', 'string', 'email', 'max:255', 'unique:users']]);
          $data['email'] = request('email');
        }
  
        if (request('new_password')) {
          $password = request()->validate( ['new_password' => ['required', 'string', 'min:8']] );
          $data['password'] = Hash::make($password['new_password']);
        }

        if($data){
          $user->update($data);
          if (array_key_exists('email', $user->getChanges())) {
            $user->email_verified_at = null;
            $user->save();
            $user->sendEmailVerificationNotification();
          }
          // return redirect(route('employee_profile.logincredintials'))->with('status', 'Login Credentials Updated Successfully!');
          return response()->json(['success' => 'Login Credentials Updated Successfully!'], 200);
        }
        return response()->json(['success' => 'Nothing Changed!'], 200);
        // return redirect(route('employee_profile.logincredintials'))->with('status', 'Nothing Changed!');
      } else {
        return response()->json(['message' => 'Invalid password'], 400);
        // $request->session()->flash('error', 'Invalid password');
        // return back()->withInput();
      }
    }


    // login form function
    public function showLoginForm(){
      if(auth()->user()){
        return redirect(route('employee.dashboard'));
      }
      return view('employee.auth.login');
    }


    // logout function
    public function logout(Request $request){
      Auth::logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      return redirect(route('employee_profile.showLoginForm'));
    }
    

    // verifiedSuccessfully function
    public function verifiedSuccessfully(){
      if(auth()->user()){
        $user = auth()->user();
        return view('employee.profile.verified-successfully', compact('user'));
      }
      return view('employee.auth.login');
    }
    
    // compelete profile function
    public function compelete() {
      $this->authorize('create', CandidateResume::class);

      $user             = auth()->user();

     	return view('employee.profile.compelete', compact('user'));
    }


    // compeleteStore function
    public function compeleteStore(){
      $this->authorize('create', CandidateResume::class);

    	$user = auth()->user();

    	$data = request()->validate([
        'name'                => ['required', 'string', 'max:255'],
        'country'             => ['nullable', 'string', 'max:255'],
        'phone'               => ['required', 'string', 'max:255'],
        'birthdate'           => ['required', 'string', 'max:255'],
        'describe_yourself'   => ['required', 'string'],
      ]);

	    $user->update($data);

	    return redirect(route('employee_resume.create'));
    }


    // compeleteStoreImg function
    public function compeleteStoreImg(Request $request){
      $this->authorize('create', CandidateResume::class);

      $user = auth()->user();

      $data = request()->validate([
        'profile_image' => ['required', 'image'],
      ]);
      $old_feature_image = $user->feature_image;

      $imagePath = request('profile_image')->store('candidate-profile-images/'.date("Y").'/'.date("m"), 'public');
      $imgArray = ['feature_image' => $imagePath];

      $user->update($imgArray);

      if($user->feature_image != $old_feature_image){
        Storage::delete('public/'.$old_feature_image);
      }

      return response()->json(['success' => url('/').'/storage/'.$imagePath]);
    }


    ///////////////////////// API Routes \\\\\\\\\\\\\\\\\\\\\\\

    // compelete profile function
    public function apiCompelete() {
      $this->authorize('create', CandidateResume::class);
      $user = auth()->user();
      return response()->json(['user' => $user], 200);
    }


    // compeleteStore function
    public function apiCompeleteStore(){
      $this->authorize('create', CandidateResume::class);
    	$user = auth()->user();
    	$data = request()->validate([
        'name'                => ['required', 'string', 'max:255'],
        'country'             => ['required', 'string', 'max:255'],
        'phone'               => ['required', 'string', 'max:255'],
        'birthdate'           => ['required', 'string', 'max:255'],
        'describe_yourself'   => ['required', 'string'],
      ]);
	    $user->update($data);
	    return response()->json(['user' => $user], 200);
    }


    // check progress function
    public function apiCheckProgress() {
      $this->authorize('create', CandidateResume::class);
      $user = auth()->user();
      // links
      $compeleteProfileLink = '/profile/complete';
      $primaryRoleLink = '/primary-role';
      $skillsLink = '/skills';
      $experienceLink = '/primary-role-experience';
      $workHistoryLink = '/work-history';
      $educationLink = '/education';
      $certificationLink = '/certifications';
      $jobStatusLink = '/job-search-status';
      $preferedSalaryLink = '/preferred-salary';
      $cameraTimeLink = '/camera-time';
      $onlinePresenceLink = '/online-presence';
      $previewLink = '/view-about';
      if($user->CandidateResume){
        $resume           = $user->CandidateResume;
        $speciality                 = $resume->CandidateSpecialist()->where('current_role', true)->first();
        $selected_skills  = $resume->CandidateSkill->pluck('employee_skill_id')->toArray();
        $work_histories = $user->CandidateWorkHistory;
        $educations = $user->CandidateEducation;
        $certifications = $user->CandidateCertification;
        if(!empty($resume->cv_file)){
          return response()->json(['link' => $previewLink], 200);
        }
      }
      // check progress functions
      if(empty($user->birthdate)){
        return response()->json(['link' => $compeleteProfileLink], 200);
      }
      if(empty($speciality)){
        return response()->json(['link' => $primaryRoleLink], 200);
      }
      if(empty($selected_skills)){
        return response()->json(['link' => $skillsLink], 200);
      }
      if(empty($speciality->how_long)){
        return response()->json(['link' => $experienceLink], 200);
      }
      if(!count($work_histories)){
        return response()->json(['link' => $workHistoryLink], 200);
      }
      if(!count($educations)){
        return response()->json(['link' => $educationLink], 200);
      }
      if(!count($certifications)){
        return response()->json(['link' => $certificationLink], 200);
      }
      if(empty($resume->job_search)){
        return response()->json(['link' => $jobStatusLink], 200);
      }
      if(empty($resume->min_base_salary)){
        return response()->json(['link' => $preferedSalaryLink], 200);
      }
      if(empty($resume->camera_time)){
        return response()->json(['link' => $cameraTimeLink], 200);
      }
      if(empty($resume->cv_file)){
        return response()->json(['link' => $onlinePresenceLink], 200);
      }
      return response()->json(['link' => $previewLink], 200);
    }
































    public function hubspot(){
      
      $pipeline_id = 6094261;
      $first_stage_id = 6094262;
      $second_stage_id = 6094263;
      $deal_id = 4654192200;



      // hubspot
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, "https://api.hubapi.com/deals/v1/deal?hapikey=f7b75015-8bff-4ed8-bbaf-dab80e1c3823");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);

		curl_setopt($ch, CURLOPT_POSTFIELDS, '{"properties": [{"value": "Ramy","name": "dealname"},{"value": "6094262","name": "dealstage"},{"value": "6094261","name": "pipeline"},{"value": "Ramy","name": "deal_client"},{"value": "services","name": "project_service"},{"value": "technology","name": "project_technology"},{"value": "description","name": "description"},{"value": "ramy@alexwebdesign.com","name": "clientemail"},{"value": "011111111111","name": "mobile_number"},{"value": "3 - 5","name": "squad_size"},{"value": "project_status_description","name": "project_status_description"},{"value": "project_status","name": "project_status"},{"value": "03/15/2021 - 2:30 PM","name": "meeting_date"} ] }');

		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  "Content-Type: application/json",
		  "Authorization: Bearer f7b75015-8bff-4ed8-bbaf-dab80e1c3823"
		));

    // dd($response);
		$response = curl_exec($ch);
		curl_close($ch);
    
    // dd($response);
      dd(json_decode($response)->dealId);





    //   // update hubspot
    // $ch = curl_init();

		// curl_setopt($ch, CURLOPT_URL, "https://api.hubapi.com/deals/v1/deal/4654192200?hapikey=f7b75015-8bff-4ed8-bbaf-dab80e1c3823");
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		// curl_setopt($ch, CURLOPT_HEADER, FALSE);
		// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

		// curl_setopt($ch, CURLOPT_POSTFIELDS, '{"properties": [{"value": "Ramy El Shimy","name": "dealname"},{"value": "6094263","name": "dealstage"},{"value": "6094261","name": "pipeline"},{"value": "Ramy El Shimy","name": "deal_client"},{"value": "services project_service","name": "project_service"},{"value": "technology technology project_technology","name": "project_technology"},{"value": "description description","name": "description"} ] }');

		// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		//   "Content-Type: application/json",
		//   "Authorization: Bearer f7b75015-8bff-4ed8-bbaf-dab80e1c3823"
		// ));

    // // dd($response);
		// $response = curl_exec($ch);
		// curl_close($ch);
    
    // // dd($response);
    //   dd(json_decode($response));










    }

}
