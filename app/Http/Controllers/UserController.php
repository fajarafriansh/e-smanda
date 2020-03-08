<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;

class UserController extends Controller
{
    public function register(Request $request) {
    	if ($request->isMethod('POST')) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		$users_count = User::where('email', $data['email'])->count();
    		if ($users_count > 0) {
    			return redirect()->back()->with('error_message', 'Email sudah digunakan.');
    		} else {
    			$user = new User;
    			$user->name = $data['name'];
    			$user->email = $data['email'];
    			$user->password = bcrypt($data['password']);
    			$user->save();
    			$user->roles()->sync([2]);
    			if (Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])) {
	    			Session::put('student_session', $data['email']);
    				return redirect('/student/profile')->with('toast_success', 'Registrasi berhasil.');
    			}
    		}
    	}
    	return view('user.register');
    }

    public function checkEmail(Request $request) {
    	$data = $request->all();
    	$users_count = User::where('email', $data['email'])->count();
		if ($users_count > 0) {
			echo "false";
		} else {
			echo "true"; die;
		}
    }

	public function login(Request $request) {
		if ($request->isMethod('POST')) {
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		if (Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])) {
    			Session::put('student_session', $data['email']);
				return redirect('/student/profile')->with('toast_success', 'Kamu berhasil login.');
			} else {
				return redirect()->back()->with('error_message', 'Email atau password salah.');
			}
    	}
    	return view('user.login');
    }

    public function logout() {
    	Auth::logout();
    	Session::forget('student_session');
    	return redirect('/')->with('toast_success', 'Kamu telah keluar, login kembali untuk megakses kursus.');;
    }
}
