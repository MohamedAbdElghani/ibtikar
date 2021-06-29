<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\SendInviteMailToFriends;

class InviteController extends Controller
{
  // authorize controller
	public function __construct(){
		$this->middleware('role');
	}


  // show function
  public function show(){
    return view('employee.invite.show');
  }


  //invitePost function
  public function invitePost(){
    $data = request()->validate([
      'email'  => 'required|array',
      'email.*'  => 'required|email',
    ]);
      $data['email']=array_unique($data['email']);
      foreach($data['email'] as $email){
      $check_email_exist = \App\User::where('email', '=', $email)->first() ? true : false;
      if($check_email_exist){
        continue;
      }else{
        $user   = auth()->user();
        Mail::to($email)->send(new SendInviteMailToFriends($user->name, $user->email));
        // return redirect(route('employee.invite.show'))->with('success', 'Your invitation have been sent');
      }
    }
    return response()->json(['message' => 'Your invitations have been sent'], 200);
  }

}
