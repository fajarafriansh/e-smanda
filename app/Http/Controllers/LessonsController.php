<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\StudentCourse;
use App\Question;
use App\QuestionsOption;
use App\TestsResult;
use App\Test;
use App\Essay;
use Illuminate\Http\Request;
use Auth;
use DB;
use File;

class LessonsController extends Controller
{
    public function show($course_code, $lesson_slug) {
    	if (Auth::check()) {
	    	$lesson = Lesson::where('slug', $lesson_slug)->where('course_code', $course_code)->firstOrFail();

	    	$test_result = NULL;
	    	if ($lesson->test) {
		    	$test_result = TestsResult::where('test_id', $lesson->test->id)->where('user_id', Auth::user()->id)->first();
		    }

            $essay = Test::where('lesson_id', $lesson->id)->where('type', 1)->first();

            $student_essay = Essay::where('lesson_id', $lesson->id)->where('user_id', \Auth::user()->id)->first();

	    	$previous_lesson = Lesson::where('course_id', $lesson->course_id)->where('published', 1)->where('position', '<', $lesson->position)->orderBy('position', 'desc')->first();
	    	$next_lesson = Lesson::where('course_id', $lesson->course_id)->where('published', 1)->where('position', '>', $lesson->position)->orderBy('position', 'asc')->first();

	    	$student_id = \Auth::user()->id;
	    	$count_course = StudentCourse::where(['course_id'=>$lesson->course_id, 'student_id'=>$student_id])->count();

	    	if ($count_course > 0) {
		    	return view('lesson', compact('lesson', 'essay', 'student_essay', 'previous_lesson', 'next_lesson', 'test_result'));
		    } else {
		    	return redirect()->back()->with('warning', 'Kamu harus mengambil kursus ini terlebih dahulu.');
		    }
		} else {
			return redirect()->back()->with('warning', 'Kamu harus login dan mengambil kursus ini terlebih dahulu.');
		}
    }

    public function test($course_code, $lesson_slug) {
    	$lesson = Lesson::where('slug', $lesson_slug)->where('course_code', $course_code)->firstOrFail();
    	return view('test', compact('lesson'));
    }

    public function testResult($course_code, $lesson_slug, Request $request) {
    	$lesson = Lesson::where('slug', $lesson_slug)->where('course_code', $course_code)->firstOrFail();
    	$answers = [];
    	$test_score = 0;

    	foreach ($request->get('questions') as $question_id => $answer_id) {
    		$question = Question::find($question_id);
    		$correct = QuestionsOption::where('question_id', $question_id)->where('id', $answer_id)->where('correct', 1)->count() > 0;
    		$answers[] = [
    			'question_id' => $question_id,
    			'option_id' => $answer_id,
    			'correct' => $correct
    		];

    		if ($correct) {
    			$test_score += $question->score;
    		}
    	}

    	$test_result = TestsResult::create([
    		'test_id' => $lesson->test->id,
    		'user_id' => Auth::user()->id,
    		'test_result' => $test_score
    	]);
    	$test_result->answers()->createMany($answers);

    	return redirect(route('lessons.show', [$lesson->course->code, $lesson->slug]))->with('info', 'Nilai kamu adalah '. $test_score);
    }

    public function essay(Request $request) {
        $user_id = \Auth::user()->id;
        $lesson_id = $request->lesson_id;

        $essay = request()->file('essay');
        $essay_name = rand(111,99999).'.'.$essay->getClientOriginalExtension();
        $essay_path = 'file/essay/'.$essay_name;
        $essay->move($essay_path, $essay_name);

        Essay::create([
            'essay' => $essay_name,
            'user_id' => $user_id,
            'lesson_id' => $lesson_id,
        ]);

        return redirect()->back()->with('success', 'Essay Berhasil diupload.');
    }
}
