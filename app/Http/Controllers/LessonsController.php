<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use Auth;
use DB;

class LessonsController extends Controller
{
    public function show($lesson_slug) {
    	if (Auth::check()) {
	    	$lesson = Lesson::where('slug', $lesson_slug)->firstOrFail();
	    	$previous_lesson = Lesson::where('course_id', $lesson->course_id)->where('published', 1)->where('position', '<', $lesson->position)->orderBy('position', 'desc')->first();
	    	$next_lesson = Lesson::where('course_id', $lesson->course_id)->where('published', 1)->where('position', '>', $lesson->position)->orderBy('position', 'asc')->first();

	    	$student_email = \Auth::user()->email;
	    	$count_course = DB::table('student_courses')->where(['course_id'=>$lesson->course_id, 'student_email'=>$student_email])->count();

	    	if ($count_course > 0) {
		    	return view('lesson', compact('lesson', 'previous_lesson', 'next_lesson'));
		    } else {
		    	return redirect()->back()->with('warning', 'Kamu harus mengambil kursus ini terlebih dahulu.');
		    }
		} else {
			return view('errors.404');
		}
    }
}
