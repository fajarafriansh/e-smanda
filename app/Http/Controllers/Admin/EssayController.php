<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use App\Lesson;
use App\User;
use App\Essay;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class EssayController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('test_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tests = Essay::all();

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.tests.essay.index', compact('tests', 'user'));
    }

    public function create()
    {
        abort_if(Gate::denies('test_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::ofTeacher()->get();
        $courses_ids = $courses->pluck('id');
        $courses = $courses->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lessons = Lesson::whereIn('course_id', $courses_ids)->get()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.tests.create', compact('courses', 'lessons', 'user'));
    }
}
