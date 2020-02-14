<?php

Route::get('/', 'HomeController@index');
Route::get('course/{slug}', ['uses' => 'CoursesController@show', 'as' => 'courses.show']);
Route::get('lesson/{slug}', ['uses' => 'LessonsController@show', 'as' => 'lessons.show']);

Route::redirect('/admin', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

// Registration routes
Route::get('user/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('user/register', 'Auth\RegisterController@register')->name('register');
Route::get('user/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('user/login', 'Auth\LoginController@login')->name('login');



Auth::routes();

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
