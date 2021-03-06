<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyQuestionRequest;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Question;
use App\QuestionsOption;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\User;
use App\Test;

class QuestionsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::all();

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.questions.index', compact('questions', 'user'));
    }

    public function create()
    {
        abort_if(Gate::denies('question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tests = Test::all()->pluck('title', 'id');

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.questions.create', compact('tests', 'user'));
    }

    public function store(StoreQuestionRequest $request)
    {
        $question = Question::create($request->all());
        $question->tests()->sync($request->input('tests', []));

        if ($request->input('question_image', false)) {
            $question->addMedia(storage_path('tmp/uploads/' . $request->input('question_image')))->toMediaCollection('question_image');
        }

        for($q=1; $q<=4; $q++) {
            $option = $request->input('option_text_' . $q);
            if($option != "") {
                QuestionsOption::create([
                    'question_id' => $question->id,
                    'option_text' => $option,
                    'correct' => $request->input('correct_' . $q),
                ]);
            }
        }

        return redirect()->route('admin.questions.index');
    }

    public function edit(Question $question)
    {
        abort_if(Gate::denies('question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tests = Test::all()->pluck('title', 'id');

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.questions.edit', compact('question', 'user', 'tests'));
    }

    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update($request->all());
        $question->tests()->sync($request->input('tests', []));

        if ($request->input('question_image', false)) {
            if (!$question->question_image || $request->input('question_image') !== $question->question_image->file_name) {
                $question->addMedia(storage_path('tmp/uploads/' . $request->input('question_image')))->toMediaCollection('question_image');
            }
        } elseif ($question->question_image) {
            $question->question_image->delete();
        }

        return redirect()->route('admin.questions.index');
    }

    public function show(Question $question)
    {
        abort_if(Gate::denies('question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.questions.show', compact('question', 'user'));
    }

    public function destroy(Question $question)
    {
        abort_if(Gate::denies('question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuestionRequest $request)
    {
        Question::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
