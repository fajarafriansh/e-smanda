<?php

namespace App\Http\Controllers;

Use App\Course;
Use App\Http\Requests;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $courses = Course::where('published', 1)->orderBy('id', 'desc')->paginate(6);
        return view('home', compact('courses'));
    }
}
