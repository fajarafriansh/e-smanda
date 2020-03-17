<?php

// Front routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/courses', 'CoursesController@index')->name('courses');
Route::get('course/{slug}', ['uses' => 'CoursesController@show', 'as' => 'courses.show']);
Route::get('teachers', 'TeachersController@index')->name('teachers');
Route::get('teacher/{id}', 'TeachersController@show')->name('teachers.show');
Route::get('lesson/{code}/{slug}', ['uses' => 'LessonsController@show', 'as' => 'lessons.show']);
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');

// Admin routes
Route::redirect('/admin', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

// Registration & Login routes
Route::match(['get', 'post'], '/student/register', 'UserController@register')->name('student.register');
Route::match(['get', 'post'], '/student/login', 'UserController@login')->name('student.login');
Route::match(['get', 'post'], '/student/check-email', 'UserController@checkEmail');
Route::get('/student/logout', 'UserController@logout')->name('student.logout');

// Student after login
Route::group(['middleware' => ['student']], function() {
    Route::match(['get', 'post'], '/student/profile', 'CoursesController@account')->name('student.profile');
    Route::redirect('/student', '/student/profile');
    Route::get('student/{id}/edit', 'StudentsController@editProfile')->name('student.edit');
    Route::get('student/{id}/update', 'StudentsController@updateProfile')->name('student.update');

    Route::match(['get', 'post'], '/student/take-course', 'CoursesController@takeCourse')->name('take-course');
    Route::get('student/{slug}/delete', 'CoursesController@deleteCourse')->name('untake-course');

    Route::get('lesson/{code}/{slug}/test', ['uses' => 'LessonsController@test', 'as' => 'lessons.test']);
    Route::post('lesson/{code}/{slug}/test-result', ['uses' => 'LessonsController@testResult', 'as' => 'lessons.test-result']);

    Route::post('lesson/{code}/{slug}/comment', ['uses' => 'CommentsController@addComment', 'as' => 'add.comment']);
    Route::post('lesson/{code}/{slug}/reply', ['uses' => 'CommentsController@addReply', 'as' => 'add.reply']);
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

    // Profile edit
    Route::get('profile/{id}', 'ProfileController@profile')->name('profile');
    Route::post('profile/{id}/update', 'ProfileController@update')->name('profile-update');
    Route::post('profile/{id}/update-password', 'ProfileController@updatePass')->name('profile-update-password');

    // Report
    Route::get('reports', 'ReportsController@index')->name('reports');
    Route::get('report/course/{id}', 'ReportsController@indexTest')->name('reports.test');
    Route::get('report/test/{id}', 'ReportsController@showTest')->name('reports.show');
});
