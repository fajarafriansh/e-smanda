<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Lesson;
use App\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLessonRequest;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LessonsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('lesson_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lessons = Lesson::whereIn('course_id', Course::ofTeacher()->pluck('id'));
        if($request->input('course_id')) {
            $lessons = $lessons->where('course_id', $request->input('course_id'));
        }
        if(request('show_deleted') == 1) {
            abort_if(gate::denies('lesson_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            $lessons = $lessons->onlyTrashed()->get();
        } else {
            $lessons = $lessons->get();
        }

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.lessons.index', compact('lessons', 'user'));
    }

    public function create()
    {
        abort_if(Gate::denies('lesson_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::ofTeacher()->get()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.lessons.create', compact('courses', 'user'));
    }

    public function store(StoreLessonRequest $request)
    {
        $lesson = Lesson::create($request->all() + ['position' => Lesson::where('course_id', $request->course_id)->max('position') + 1]);

        if ($request->input('lesson_image', false)) {
            $lesson->addMedia(storage_path('tmp/uploads/' . $request->input('lesson_image')))->toMediaCollection('lesson_image');
        }

        foreach ($request->input('downloadable_file', []) as $file) {
            $lesson->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('downloadable_file');
        }

        return redirect()->route('admin.lessons.index', ['course_id' => $request->course_id]);
    }

    public function edit(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::ofTeacher()->get()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $lesson->load('course');

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.lessons.edit', compact('courses', 'lesson', 'user'));
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $lesson->update($request->all());

        if ($request->input('lesson_image', false)) {
            if (!$lesson->lesson_image || $request->input('lesson_image') !== $lesson->lesson_image->file_name) {
                $lesson->addMedia(storage_path('tmp/uploads/' . $request->input('lesson_image')))->toMediaCollection('lesson_image');
            }
        } elseif ($lesson->lesson_image) {
            $lesson->lesson_image->delete();
        }

        if (count($lesson->downloadable_file) > 0) {
            foreach ($lesson->downloadable_file as $media) {
                if (!in_array($media->file_name, $request->input('downloadable_file', []))) {
                    $media->delete();
                }
            }
        }

        $media = $lesson->downloadable_file->pluck('file_name')->toArray();

        foreach ($request->input('downloadable_file', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $lesson->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('downloadable_file');
            }
        }

        return redirect()->route('admin.lessons.index', ['course_id' => $request->course_id]);
    }

    public function show(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lesson->load('course');

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.lessons.show', compact('lesson', 'user'));
    }

    public function destroy(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lesson->delete();

        return back();
    }

    public function massDestroy(MassDestroyLessonRequest $request)
    {
        Lesson::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
