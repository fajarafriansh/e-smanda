<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuestionsOptionRequest;
use App\Http\Requests\StoreQuestionsOptionRequest;
use App\Http\Requests\UpdateQuestionsOptionRequest;
use App\Question;
use App\QuestionsOption;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\User;

class QuestionsOptionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('questions_option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionsOptions = QuestionsOption::all();

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.questionsOptions.index', compact('questionsOptions', 'user'));
    }

    public function create()
    {
        abort_if(Gate::denies('questions_option_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::all()->pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.questionsOptions.create', compact('questions', 'user'));
    }

    public function store(StoreQuestionsOptionRequest $request)
    {
        $questionsOption = QuestionsOption::create($request->all());

        return redirect()->route('admin.questions-options.index');
    }

    public function edit(QuestionsOption $questionsOption)
    {
        abort_if(Gate::denies('questions_option_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::all()->pluck('question', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questionsOption->load('question');

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.questionsOptions.edit', compact('questions', 'questionsOption', 'user'));
    }

    public function update(UpdateQuestionsOptionRequest $request, QuestionsOption $questionsOption)
    {
        $questionsOption->update($request->all());

        return redirect()->route('admin.questions-options.index');
    }

    public function show(QuestionsOption $questionsOption)
    {
        abort_if(Gate::denies('questions_option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionsOption->load('question');

        $user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();

        return view('admin.questionsOptions.show', compact('questionsOption', 'user'));
    }

    public function destroy(QuestionsOption $questionsOption)
    {
        abort_if(Gate::denies('questions_option_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionsOption->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuestionsOptionRequest $request)
    {
        QuestionsOption::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
