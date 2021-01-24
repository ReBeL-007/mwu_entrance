<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index');
// Route::get('/storage/{extra}', function ($extra) {
//     return redirect("/public/storage/$extra");
//     })->where('extra', '.*');
// Route::any('/tus/{any?}', function () {
//     $response = app('tus-server')->serve();
//     return $response->send();
// })->where('any', '.*');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('login');
    Route::get('/', 'Admin\HomeController@index')->name('dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('logout');

     //change password
     Route::get('change-password', 'Admin\ChangePasswordController@create')->name('password.create');
     Route::post('change-password', 'Admin\ChangePasswordController@update')->name('password.update');

    //password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('password.reset');

    // Permissions
    Route::delete('permissions/destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'Admin\PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'Admin\RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'Admin\RolesController');

    // Users
    Route::delete('users/destroy', 'Admin\UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'Admin\UsersController');

    // groups
    Route::delete('groups/destroy', 'Admin\GroupsController@massDestroy')->name('groups.massDestroy');
    Route::resource('groups', 'Admin\GroupsController');

    // subjects
    Route::get('subjects/getspecificgrades','Admin\SubjectController@getGrades')->name('subjects.getspecificgrades');
    Route::delete('subjects/destroy', 'Admin\SubjectController@massDestroy')->name('subjects.massDestroy');
    Route::resource('subjects','Admin\SubjectController');

    // questions
    Route::delete('questions/destroy', 'Admin\QuestionController@massDestroy')->name('questions.massDestroy');
    Route::resource('questions','Admin\QuestionController');
    Route::get('questions/download/{file}','Admin\QuestionController@download')->name('questions.download');

    // answers
    Route::get('answers/getspecificsubjects','Admin\AnswerController@getSubjects')->name('answers.getspecificsubjects');
    Route::get('answers/getsubject','Admin\AnswerController@getSubject')->name('answers.getsubject');
    Route::delete('answers/destroy', 'Admin\AnswerController@massDestroy')->name('answers.massDestroy');
    Route::resource('answers','Admin\AnswerController');
    Route::get('answers/download/{file}','Admin\AnswerController@download')->name('answers.download');
    Route::post('answers/upload','Admin\AnswerController@uploaded')->name('answers.uploaded');
    Route::get('answers/upload/{hash}','Admin\AnswerController@tusUpload')->name('answers.tus');

    // programs
    Route::delete('programs/destroy', 'Admin\ProgramController@massDestroy')->name('programs.massDestroy');
    Route::resource('programs', 'Admin\ProgramController');

    // form
    Route::get('forms/{form}/fraud-check', 'Admin\FormController@fraudCheck')->name('forms.fraud-check');
    Route::delete('forms/destroy', 'Admin\FormController@massDestroy')->name('forms.massDestroy');
    Route::resource('forms', 'Admin\FormController');
    Route::get('forms/{form}', 'Admin\FormController@generateform')->name('forms.generate');
    Route::get('forms/{form}/print', 'Admin\FormController@printform')->name('forms.print');
    Route::post('forms/print', 'Admin\FormController@printmultipleform')->name('forms.print.multiple');
    Route::post('forms/triplicate/print', 'Admin\FormController@printtriplicate')->name('forms.print.triplicate');
    Route::get('forms/{form}/print-studentdetails', 'Admin\FormController@printformdetails')->name('forms.print-student-details');
    Route::post('forms/print-studentdetails', 'Admin\FormController@printmultipleformdetails')->name('forms.print-multiple-student-details');
    
    Route::resource('faculty', 'Admin\FacultyController');
    Route::delete('faculties/destroy', 'Admin\FacultyController@massDestroy')->name('faculty.massDestroy');

    Route::get('levels/getspecificlevels','Admin\LevelsController@getlevels')->name('levels.getspecificlevels');
    Route::delete('levels/destroy', 'Admin\LevelsController@massDestroy')->name('levels.massDestroy');
    Route::resource('levels', 'Admin\LevelsController');
    Route::post('levels/addlevel','Admin\LevelsController@addLevel')->name('levels.addLevel');

    // Route::post('programtypes/addtype','ProgramTypesController@addType')->name('programtypes.addType');
    // Route::delete('programtypes/destroy', 'ProgramTypesController@massDestroy')->name('programtypes.massDestroy');
    // Route::resource('programtypes', 'ProgramTypesController');

    Route::get('courses/getspecificcourses','Admin\CoursesController@getCourses')->name('courses.getspecificcourses');
    Route::get('courses/getcoursetypes','Admin\CoursesController@getCourseTypes')->name('courses.getcoursetypes');
    Route::delete('courses/destroy', 'Admin\CoursesController@massDestroy')->name('courses.massDestroy');
    Route::resource('courses', 'Admin\CoursesController');
    // Route::post('programs/addprogram','Admin\ProgramsController@addProgram')->name('programs.addProgram');

    Route::get('subs/getspecificsubs','Admin\SubController@getSubs')->name('subs.getspecificsubs');
    Route::get('subs/getspecificsub','Admin\SubController@getSub')->name('subs.getspecificsub');
    Route::delete('subs/destroy', 'Admin\SubController@massDestroy')->name('subs.massDestroy');
    Route::resource('subs','Admin\SubController', [
        'except' => [ 'create' ]
    ]);
    Route::get('subs/create/{id}','Admin\SubController@create')->name('subs.create');
    Route::get('subs/{id}/list', 'Admin\SubController@courseSubjects')->name('subs.courseSubjects');


});
