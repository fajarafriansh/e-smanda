<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class StudentsController extends Controller
{
    public function editProfile() {
    	$student_id = \Auth::user()->id;
    	$student = User::find($student_id);

    	return view('user.edit', compact('student'));
    }

    public function updateProfile(Request $request) {

    }
}
