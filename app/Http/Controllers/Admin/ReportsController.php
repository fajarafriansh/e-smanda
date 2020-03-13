<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Lesson;
use App\User;
use App\Test;
use App\TestsResult;
use App\StudentCourse;
use Gate;
use Auth;
use Symfony\Component\HttpFoundation\Response;

class ReportsController extends Controller
{
    public function index() {
    	abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if(request('show_deleted') == 1) {
            abort_if(gate::denies('course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            $courses = Course::onlyTrashed()->ofTeacher()->get();
        } else {
            $courses = Course::ofTeacher()->get();
        }
        // $courses = Course::all();
        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.reports.index', compact('courses', 'user'));
    }

    public function indexTest($course_id) {
        abort_if(Gate::denies('course_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tests = Test::where('course_id', $course_id)->get();
        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.reports.index-test', compact('tests', 'user'));
    }

    public function showTest($test_id) {
    	abort_if(Gate::denies('course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $results = TestsResult::where('test_id', $test_id)->get();

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.reports.show', compact('results', 'user'));
    }
}
