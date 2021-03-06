<?php

// Front routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/courses', 'CoursesController@index')->name('courses');
Route::get('course/{slug}', ['uses' => 'CoursesController@show', 'as' => 'courses.show']);
Route::get('course/category/{slug}', 'CoursesController@category')->name('courses.category');
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
    Route::post('student/{id}/update', 'StudentsController@updateProfile')->name('student.update');
    Route::post('student/{id}/update-password', 'StudentsController@updatePassword')->name('student.update.password');

    Route::match(['get', 'post'], '/student/take-course', 'CoursesController@takeCourse')->name('take-course');
    Route::get('student/{slug}/delete', 'CoursesController@deleteCourse')->name('untake-course');

    Route::get('lesson/{code}/{slug}/test', ['uses' => 'LessonsController@test', 'as' => 'lessons.test']);
    Route::post('lesson/{code}/{slug}/test-result', ['uses' => 'LessonsController@testResult', 'as' => 'lessons.test-result']);

    Route::post('lesson/{code}/{slug}/comment', ['uses' => 'CommentsController@addComment', 'as' => 'add.comment']);
    Route::post('lesson/{code}/{slug}/reply', ['uses' => 'CommentsController@addReply', 'as' => 'add.reply']);

    Route::post('/essay/upload', 'LessonsController@essay')->name('essay.upload');
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

    // Categories
    Route::get('categories', 'CategoriesController@index')->name('categories.index');
    Route::get('category/create', 'CategoriesController@create')->name('category.create');
    Route::post('category/store', 'CategoriesController@store')->name('category.store');
    Route::get('category/{id}', 'CategoriesController@show')->name('category.show');
    Route::get('category/{id}/edit', 'CategoriesController@edit')->name('category.edit');
    Route::post('category/{id}/update', 'CategoriesController@update')->name('category.update');
    Route::get('category/{id}/delete', 'CategoriesController@destroy')->name('category.destroy');

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
    Route::get('test/essay', 'EssayController@index')->name('essay.index');
    Route::get('test/essay/create', 'EssayController@create')->name('essay.create');
    Route::post('test/essay/store', 'EssayController@store')->name('essay.store');
    Route::get('test/essay/show', 'EssayController@show')->name('essay.show');
    Route::get('test/essay/edit', 'EssayController@edit')->name('essay.edit');
    Route::post('test/essay/update', 'EssayController@update')->name('essay.update');

    // E
    Route::post('essay/result', 'ReportsController@essayResult')->name('essay.result');

    // Profile edit
    Route::get('profile/{id}', 'ProfileController@profile')->name('profile');
    Route::post('profile/{id}/update', 'ProfileController@update')->name('profile-update');
    Route::post('profile/{id}/update-password', 'ProfileController@updatePass')->name('profile-update-password');
    Route::get('profile/check-password', 'ProfileController@checkPass')->name('check.pass');
    Route::post('profile/{id}/update-email', 'ProfileController@updateEmail')->name('profile.update.email');

    // Report
    Route::get('reports', 'ReportsController@index')->name('reports');
    Route::get('report/course/{id}', 'ReportsController@indexTest')->name('reports.test');
    Route::get('report/test/{id}', 'ReportsController@showTest')->name('reports.show');
});
