<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCourseRequest;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\User;
use App\CoursesCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CoursesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
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

        return view('admin.courses.index', compact('courses', 'user'));
    }

    public function create()
    {
        abort_if(Gate::denies('course_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teachers = User::whereHas('roles', function ($q) { $q->where('role_id', 3); })->get()->pluck('name', 'id');

        $categories = CoursesCategory::all()->pluck('title', 'id');

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.courses.create', compact('teachers', 'user', 'categories'));
    }

    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->all());
        $teachers = \Auth::user()->isAdmin() ? array_filter((array)$request->input('teachers', [])) : [\Auth::user()->id];
        $course->teachers()->sync($teachers);
        $course->categories()->sync($request->input('categories', []));

        if ($request->input('course_image', false)) {
            $course->addMedia(storage_path('tmp/uploads/' . $request->input('course_image')))->toMediaCollection('course_image');
        }

        return redirect()->route('admin.courses.index');
    }

    public function edit(Course $course)
    {
        abort_if(Gate::denies('course_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teachers = User::whereHas('roles', function ($q) { $q->where('role_id', 3); })->get()->pluck('name', 'id');
        $categories = CoursesCategory::all()->pluck('title', 'id');

        $course->load('teachers', 'categories');

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.courses.edit', compact('teachers', 'course', 'user', 'categories'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->all());
        $teachers = \Auth::user()->isAdmin() ? array_filter((array)$request->input('teachers', [])) : [\Auth::user()->id];
        $course->teachers()->sync($teachers);
        $course->categories()->sync($request->input('categories', []));

        if ($request->input('course_image', false)) {
            if (!$course->course_image || $request->input('course_image') !== $course->course_image->file_name) {
                $course->addMedia(storage_path('tmp/uploads/' . $request->input('course_image')))->toMediaCollection('course_image');
            }
        } elseif ($course->course_image) {
            $course->course_image->delete();
        }

        return redirect()->route('admin.courses.index');
    }

    public function show(Course $course)
    {
        abort_if(Gate::denies('course_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->load('teachers');

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.courses.show', compact('course', 'user'));
    }

    public function destroy(Course $course)
    {
        abort_if(Gate::denies('course_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseRequest $request)
    {
        Course::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
