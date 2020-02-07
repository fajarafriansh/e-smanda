<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function show($course_slug) {
    	$course = Course::where('slug', $course_slug)->with('Lessons')->firstOrFail();
    	return view('course', compact('course'));
    }
}
