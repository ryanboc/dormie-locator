<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class AdminController extends Controller
{
    public function login(Request $request) {
		if($request->isMethod('post')) {
			$data = $request->input();
			if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'], 'is_admin'=>'1'])) {
					//echo "Success"; die;
					//~ Session::put('adminSession', $data['email']);
					return redirect('admin/dashboard');
			} else {
					//echo "Failed";die;
					return redirect('/')->with('flash_message_error', 'Invalid username or password');
			}
		}
		return view('admin.admin_login');
	}
	
	public function dashboard() {
		//~ if(Session::has('adminSession')){
			//~Performs all dashboard tasks
		//~ } else {
			//~ return redirect('/')->with('flash_message_error', 'Please login to access dashboard');
		//~ }
		return view('admin.dashboard');
	}
	
	public function logout() {
		Session::flush();
		return redirect('/')->with('flash_message_success', 'Logged out successfully!');
	}
}
