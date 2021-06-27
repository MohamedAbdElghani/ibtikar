<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/talent/profile/complete';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'role' => 'employee',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    // register api function
    public function registerApi($lang){
      \App::setlocale($lang);
      $data = request()->validate([
        'name'                => ['required', 'string', 'max:255'],
        'email'               => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password'            => ['required', 'string', 'min:8', 'confirmed'],
      ]);
      
      $user = User::create([
        'name'              => $data['name'],
        'email'             => $data['email'],
        'role'              => 'employee',
        'password'          => Hash::make($data['password']),
      ]);

      event(new Registered($user));

      $token = $user->createToken('TutsForWeb')->accessToken;

      return response()->json(['token' => $token], 200);
    }



    public function delete_email()
    {
      $user = User::where('email','like','ramy@alexwebdesign.com') -> first()->delete();
      // $user = User::where('email','like','ramy@alexwebdesign.com') -> first();
      dd($user);
    }

    // public function coderbyte()
    // {
    //   dd(request()->all());
    //   return 'coderbyte';
    // }
}
