<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TeachersController extends Controller
{
	public function index() {
		$teachers = User::whereHas('roles', function($query) {
			$query->where('id', '3');
		})->orderBy('id', 'desc')->get();

		return view('teachers.index', compact('teachers'));
	}

	public function show($id) {
		$teacher = User::where('id', $id)->first();
		$courses = $teacher->courses->where('published', 1);

		return view('teachers.show', compact('teacher', 'courses'));
	}
}
