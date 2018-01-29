<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;

use Hash;
use Auth;
use Redirect;
use Session;
use Validator;

class AuthController extends Controller
{

	public function show()
	{
		return view('admin.adminLogin');
	}

	// public function customLogin(Request $request)
	// {
	// 	dd($request->all());
	// }

    public function customLogin(Request $request)
    {
    	
    	
    	$rules = array (
				
				'email' => 'required',
				'password' => 'required' 
		);
		$validator = Validator::make ( Input::all (), $rules );
		if ($validator->fails ()) {
			return Redirect::back ()->withErrors ( $validator, 'login' )->withInput ();
		} else {

			if (Auth::attempt ( array (
					
					'email' => $request->get ('email'),
					'password' => $request->get ('password'),
					'role' => 1 //1 for admin 
			) )) {
				session ( [ 
						
						'email' => $request->get ( 'email' ) 
				] );
				 return redirect('/admin');
			} else {
				Session::flash ( 'message', "Invalid Credentials , Please try again." );
				return Redirect::back ();
			}
		}
    }

    public function register(Request $request) {
    	dd($request->all());
		$rules = array (
				'email' => 'required|unique:users|email',
				'name' => 'required|unique:users|alpha_num|min:4',
				'password' => 'required|min:6|confirmed' 
		);
		$validator = Validator::make ( Input::all (), $rules );
		if ($validator->fails ()) {
			return Redirect::back ()->withErrors ( $validator, 'register' )->withInput ();
		} else {
			$user = new User ();
			$user->name = $request->get ( 'name' );
			$user->email = $request->get ( 'email' );
			$user->password = Hash::make ( $request->get ( 'password' ) );
			$user->remember_token = $request->get ( '_token' );
			
			$user->save ();
			return Redirect::back ();
		}
	}

	public function logout() {
		Session::flush ();
		Auth::logout ();
		 return redirect('/');
	}
}


