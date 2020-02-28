<?php

// Front routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/courses', 'CoursesController@showAll');
Route::get('course/{slug}', ['uses' => 'CoursesController@show', 'as' => 'courses.show']);
Route::get('lesson/{slug}', ['uses' => 'LessonsController@show', 'as' => 'lessons.show']);

// Admin routes
Route::redirect('/admin', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

// Registration & Login routes
Route::match(['get', 'post'], '/student/register', 'UserController@register');
Route::match(['get', 'post'], '/student/login', 'UserController@login');
Route::match(['get', 'post'], '/student/check-email', 'UserController@checkEmail');
Route::get('/student/logout', 'UserController@logout');

// Student after login
Route::group(['middleware' => ['student']], function() {
    Route::match(['get', 'post'], '/student/courses', 'CoursesController@account');
    Route::redirect('/student', '/student/courses');
    Route::match(['get', 'post'], '/student/take-course', 'CoursesController@takeCourse')->name('take-course');
    Route::get('student/{slug}/delete', 'CoursesController@deleteCourse')->name('untake-course');

    Route::get('lesson/{slug}/test', ['uses' => 'LessonsController@test', 'as' => 'lessons.test']);
    Route::post('lesson/{slug}/test-result', ['uses' => 'LessonsController@testResult', 'as' => 'lessons.test-result']);
});

Auth::routes(['register' => false]);

// Admin after login
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');
    Route::resource('courses', 'CoursesController');

    // Lessons
    Route::delete('lessons/destroy', 'LessonsController@massDestroy')->name('lessons.massDestroy');
    Route::post('lessons/media', 'LessonsController@storeMedia')->name('lessons.storeMedia');
    Route::resource('lessons', 'LessonsController');

    // Questions
    Route::delete('questions/destroy', 'QuestionsController@massDestroy')->name('questions.massDestroy');
    Route::post('questions/media', 'QuestionsController@storeMedia')->name('questions.storeMedia');
    Route::resource('questions', 'QuestionsController');

    // Questions Options
    Route::delete('questions-options/destroy', 'QuestionsOptionsController@massDestroy')->name('questions-options.massDestroy');
    Route::resource('questions-options', 'QuestionsOptionsController');

    // Tests
    Route::delete('tests/destroy', 'TestController@massDestroy')->name('tests.massDestroy');
    Route::resource('tests', 'TestController');
});
