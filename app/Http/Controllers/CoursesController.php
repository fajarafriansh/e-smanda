<?php

namespace App\Http\Controllers;

use App\Course;
use App\CoursesCategory;
use App\StudentCourse;
use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;

class CoursesController extends Controller
{
    public function index() {
        $categories = CoursesCategory::all()->sortBy('title');
        $courses = Course::where('published', 1)->orderBy('id', 'desc')->paginate(6);

        return view('courses', compact('courses', 'categories'));
    }

    public function category($category_slug) {
        $categories = CoursesCategory::all()->sortBy('title');
        $category = CoursesCategory::where('slug', $category_slug)->first();
        $courses = Course::whereHas('categories', function($query) use ($category_slug) {
            $query->where('slug', $category_slug);
        })->paginate(6);

        return view('category', compact('categories', 'category', 'courses'));
    }

    public function show($course_slug) {
    	$course = Course::where('slug', $course_slug)->with('publishedLessons')->firstOrFail();

        if (Auth::check()) {
            $student_id = \Auth::user()->id;
            $count_course = StudentCourse::where(['course_id'=>$course->id, 'student_id'=>$student_id])->count();

        	return view('course', compact('course', 'count_course'));
        } else {
            return view('course', compact('course'));
        }
    }

    public function takeCourse(Request $request) {
    	$data = $request->all();
    	$student_id = \Auth::user()->id;
    	$count_course = StudentCourse::where(['course_id'=>$data['course_id'], 'student_id'=>$student_id])->count();

        // $all = [
        //     'course_id' => $data['course_id'],
        //         'course_name' => $data['course_name'],
        //         'course_slug' => $data['course_slug'],
        //         'price' => $data['price'],
        //         'student_id' => $student_id,
        // ];

        // dd($all);

    	if ($count_course > 0) {
    		return redirect()->back()->with('warning', 'Kursus ini sudah pernah kamu ambil.');
    	} else {
	    	StudentCourse::create( [
                'course_id' => $data['course_id'],
	    		'course_name' => $data['course_name'],
	    		'course_slug' => $data['course_slug'],
	    		'price' => $data['price'],
	    		'student_id' => $student_id,
	    	]);
	    }

    	return redirect()->back()->with('toast_success', 'Kursus berhasil diambil.');
    }

    public function account() {
    	$student_id = \Auth::user()->id;
        $student = User::find($student_id);
    	$student_courses = StudentCourse::where(['student_id'=>$student_id])->get();

    	return view('user.account')->with(compact('student', 'student_courses'));
    }

    public function deleteCourse($id = null) {
        $student_id = \Auth::user()->id;
        StudentCourse::where(['course_id'=>$id, 'student_id'=>$student_id])->delete();

        return redirect()->back()->with('toast_success', 'Kursus telah dibatalkan.');
    }
}
