<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CoursesCategory;
use App\User;

class CategoriesController extends Controller
{
    public function index() {
    	$categories = CoursesCategory::all();
    	$user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();
		return view('admin.categories.index', compact('categories', 'user'));
    }

    public function create() {
    	$levels = CoursesCategory::where('parent_id', 0)->get();
    	$user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();
    	return view('admin.categories.create', compact('levels', 'user'));
    }

    public function store(Request $request) {
    	$category = CoursesCategory::create($request->all());

    	dd($category);
    	return redirect()->route('admin.categories.index');
    }

    public function edit($id = NULL) {
    	$category = CoursesCategory::where('id', $id)->first();
    	$levels = CoursesCategory::where('parent_id', 0)->get();
    	$user_id = \Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        return view('admin.categories.edit', compact('user', 'category', 'levels'));
    }

    public function update(Request $request, $id = NULL) {
    	$category = $request->all();
    	CoursesCategory::where('id', $id)->update(['title' => $category['title'], 'slug' => $category['slug'], 'parent_id' => $category['parent_id']]);

    	return redirect()->route('admin.categories.index');
    }
}
