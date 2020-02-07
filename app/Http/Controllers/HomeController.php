<?php

namespace App\Http\Controllers;

Use App\Course;
Use App\Http\Requests;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $courses = Course::where('published', 1)->orderBy('id', 'desc')->get();
        return view('index', compact('courses'));
    }
}
