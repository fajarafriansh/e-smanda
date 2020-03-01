<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Lesson;

class CommentsController extends Controller
{
	public function addComment($course_code, $lesson_slug, Request $request) {
		$data = $request->all();
		$user_id = \Auth::user()->id;
		$lesson = Lesson::where('slug', $lesson_slug)->where('course_code', $course_code)->firstOrFail();

		Comment::create([
			'user_id' => $user_id,
			'lesson_id' => $lesson->id,
			'comment_text' => $data['comment_text'],
		]);

		return redirect()->back();
	}

	public function addReply($course_code, $lesson_slug, Request $request) {
		$data = $request->all();
		$user_id = \Auth::user()->id;
		$lesson = Lesson::where('slug', $lesson_slug)->where('course_code', $course_code)->firstOrFail();

		Comment::create([
			'user_id' => $user_id,
			'lesson_id' => $lesson->id,
			'comment_text' => $data['comment_text'],
			'parent_id' => $data['comment_id']
		]);

		return redirect()->back();
	}
}
