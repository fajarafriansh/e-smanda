<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
    public function show($lesson_slug) {
    	$lesson = Lesson::where('slug', $lesson_slug)->firstOrFail();
    	$previous_lesson = Lesson::where('course_id', $lesson->course_id)->where('published', 1)->where('position', '<', $lesson->position)->orderBy('position', 'desc')->first();
    	$next_lesson = Lesson::where('course_id', $lesson->course_id)->where('published', 1)->where('position', '>', $lesson->position)->orderBy('position', 'asc')->first();
    	return view('lesson', compact('lesson', 'previous_lesson', 'next_lesson'));
    }
}
