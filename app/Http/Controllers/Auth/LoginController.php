<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = ('/employee');

  protected function authenticated(Request $request, $user){
    if ( $user->role == 'employee' ) {
      if($user->CandidateResume && $user->CandidateResume->cv_file){
        return redirect()->route('employee_resume.build.previewResume');
      }else{
        return redirect()->route('employee_profile.compelete');
      }
    }elseif($user->role == 'admin'){
      return redirect()->route('employee.dashboard');
    }

    return redirect('/');
  }

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('guest')->except('logout');
  }


  // login api function
  public function loginApi(Request $request, $lang){
    \App::setlocale($lang);
    $credentials = [
      'email' => $request->email,
      'password' => $request->password
    ];

    if (auth()->attempt($credentials)) {
      $token = auth()->user()->createToken('TutsForWeb')->accessToken;
      return response()->json(['token' => $token], 200);
    } else {
      return response()->json(['error' => __('The email address or password you entered is invalid')], 401);
    }
  }
}
