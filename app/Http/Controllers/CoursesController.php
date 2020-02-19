<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use DB;

class CoursesController extends Controller
{
    public function show($course_slug) {
    	$course = Course::where('slug', $course_slug)->with('publishedLessons')->firstOrFail();
    	return view('course', compact('course'));
    }

    public function takeCourse(Request $request) {
    	$data = $request->all();
    	// echo "<pre>"; print_r($data); die;

    	$student_email = \Auth::user()->email;

    	DB::table('student_courses')->insert( [
    		'course_id' => $data['course_id'],
    		'course_name' => $data['course_name'],
    		'course_slug' => $data['course_slug'],
    		'price' => $data['price'],
    		'student_email' => $student_email,
    	]);

    	return redirect('/student/courses');
    }

    public function account() {
    	$student_email = \Auth::user()->email;
    	$student_courses = DB::table('student_courses')->where(['student_email'=>$student_email])->get();
    	// echo "<pre>"; print_r($student_courses); die;
    	return view('user.account')->with(compact('student_courses'));
    }
}
