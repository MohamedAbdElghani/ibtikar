<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator,Redirect,Response,File;
use Illuminate\Support\Str;
use Socialite;
use Auth;
use Exception;
use App\User;

class SocialLoginController extends Controller
{
    
    // redirectToGoogle function
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }


    // handleGoogleCallback
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->orWhere('email', $user->email)->first();
            if($finduser){     
                Auth::login($finduser);
                return redirect('/');
            }else{
                $newUser = User::create([
                    'name' 		  => $user->user['given_name'].' '.$user->user['family_name'],
                    'email' 	  => $user->email,
                    'google_id'	=> $user->id,
                    'role'      => 'client',
                    'password' 	=> Hash::make(Str::random(8)),
                ]);
    
                Auth::login($newUser);
                return redirect('/');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }




    // twitter functions

    // redirect function
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }
    
    // callback function
    public function callback($provider){
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo,$provider);
        auth()->login($user);
        return redirect()->to('/');
    }

    // createUser function
    function createUser($getInfo,$provider){

    	$user = User::where('provider_id', $getInfo->id)->orWhere('email', $getInfo->email)->first();    
      	if (!$user) {
          	$user = User::create([
          		'name' 		    	=> $getInfo->name,
          		'email' 		    => $getInfo->email,
          		'provider' 		  => $provider,
          		'provider_id' 	=> $getInfo->id,
              'role'          => 'client',
          		'password' 		  => Hash::make(Str::random(8)),
         	]);
       	}
       	return $user;
    }

}
