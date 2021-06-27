<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use \App\Squad;

class ProfileController extends Controller
{

	// authorize controller
  public function __construct(){
      $this->middleware('auth');
  }


  // show function
  public function show() {
    $this->authorize('create', Squad::class);

    $user = auth()->user();
    $old_squad = auth()->user()->squads()->first();
    return view('profile.show', compact('user', 'old_squad'));
  }


  // update function
  public function update(){
    $this->authorize('create', Squad::class);

    $data = request()->validate([
      'name'    		  => ['required', 'string', 'max:255'],
      'email'     	  => ['required', 'string', 'max:255'],
      'phone'         => ['nullable', 'regex:/(01)[0-9]{9}/'],
      'feature_image' => ['nullable', 'image'],
    ]);

    if (request('feature_image')) {
      $imagePath = request('feature_image')->store('uploads', 'public');
      $image = Image::make('storage/'.$imagePath)->fit(200, 200);
      $image->save();
      $imgArray = ['feature_image' => $imagePath];
    }

    $data = array_merge( $data, $imgArray ?? [] );

		auth()->user()->update($data);

		return redirect('/profile');
	}



    
  // subscribe to newsletter
  public function subscribe(){
    $data = request()->validate([
      'subscribe_newsletter'       => 'nullable|integer',
    ]);

    if (!array_key_exists('subscribe_newsletter', $data)) {
      $data['subscribe_newsletter'] = 0;
    }

    auth()->user()->update($data);

    return redirect('/profile');
  }
}
