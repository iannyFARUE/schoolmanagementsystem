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

Route::prefix('teachers')->group(function () {
    Route::get('/login', 'Auth\StaffLoginController@showLoginForm')->name('staff.login');
    Route::post('/logout', 'Auth\StaffLoginController@logout')->name('staff.logout');

    Route::post('/login', 'Auth\StaffLoginController@login')->name('staff.submit.login');
    Route::get('/create', 'TeacherController@create')->name('teacher.create');
    Route::post('/create', 'TeacherController@store')->name('teacher.store');
    Route::get('', 'TeacherController@getTeachers')->name('get.teachers');
});

Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.submit.login');
Route::post('/admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminDashboardController@index')->name('admin.dashboard');
Route::get('/student', 'StudentController@index')->name('student.dashboard');

Route::get('/users', 'AdminDashboardController@getUsers')->name('get.users');
Route::get('classes', 'ClassController@getClasses')->name('get.classes');
Route::get('students', 'AdminDashboardController@getStudents')->name('get.students');
Route::get('sections', 'SectionController@getSections')->name('get.sections');
Route::get('subjects', 'SubjectController@getSubjects')->name('get.subjects');
Route::get('/staff', "StaffController@index")->name('staff.dashboard');
Route::get('/duties/create', 'DutiesController@create')->name('duties.create');
Route::post('/duties/create', 'DutiesController@store')->name('duties.store');
Route::get('/classes/create', 'ClassController@create')->name('classes.create');
Route::post('/classes/create', 'ClassController@store')->name('classes.store');
Route::get('/classes/{class}/edit', 'ClassController@edit')->name('classes.edit');

Route::get('/p/create', 'AdminDashboardController@create')->name('p.create');
Route::get('/sections/create', 'SectionController@create')->name('sections.create');
Route::post('/sections/create', 'SectionController@store')->name('sections.store');
Route::get('/subjects/create', 'SubjectController@create')->name('subjects.create');
Route::post('/subjects/create', 'SubjectController@store')->name('subjects.store');
Route::post('/p/create', 'AdminDashboardController@store')->name('p.store');
Route::get('/p/{student}/edit', 'AdminDashboardController@edit')->name('p.edit');
Route::patch('/p/{student}', 'AdminDashboardController@update')->name('p.update');
Route::delete('/p/{student}', 'AdminDashboardController@destroy')->name('p.destroy');
