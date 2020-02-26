<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use DB;

class CoursesController extends Controller
{
    public function showAll() {
        $courses = Course::where('published', 1)->orderBy('id', 'desc')->get();
        return view('courses', compact('courses'));
    }

    public function show($course_slug) {
    	$course = Course::where('slug', $course_slug)->with('publishedLessons')->firstOrFail();

        $student_email = \Auth::user()->email;
        $count_course = DB::table('student_courses')->where(['course_id'=>$course->id, 'student_email'=>$student_email])->count();

    	return view('course', compact('course', 'count_course'));
    }

    public function takeCourse(Request $request) {
    	$data = $request->all();
    	// echo "<pre>"; print_r($data); die;

    	$student_email = \Auth::user()->email;

    	$count_course = DB::table('student_courses')->where(['course_id'=>$data['course_id'], 'student_email'=>$student_email])->count();

    	if ($count_course > 0) {
    		return redirect()->back()->with('warning', 'Kursus ini sudah pernah kamu ambil.');
    	} else {
	    	DB::table('student_courses')->insert( [
	    		'course_id' => $data['course_id'],
	    		'course_name' => $data['course_name'],
	    		'course_slug' => $data['course_slug'],
	    		'price' => $data['price'],
	    		'student_email' => $student_email,
	    	]);
	    }

    	return redirect()->back()->with('toast_success', 'Kursus berhasil diambil.');
    }

    public function account() {
    	$student_email = \Auth::user()->email;
    	$student_courses = DB::table('student_courses')->where(['student_email'=>$student_email])->get();
    	// echo "<pre>"; print_r($student_courses); die;
    	return view('user.account')->with(compact('student_courses'));
    }

    public function deleteCourse($id = null) {
        $student_email = \Auth::user()->email;
        DB::table('student_courses')->where(['course_id'=>$id, 'student_email'=>$student_email])->delete();
        return redirect()->back()->with('toast_success', 'Kursus telah dibatalkan.');
    }
}
