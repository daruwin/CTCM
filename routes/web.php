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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('classrooms', 'ClassroomController');
Route::resource('applicants', 'ApplicantController');
Route::resource('primary_topics', 'PrimaryTopicController');
Route::resource('proposals', 'ProposalController');
Route::resource('schedules', 'ScheduleController');
Route::resource('secondary_topics', 'SecondaryTopicController');
Route::resource('teachers', 'TeacherController');
Route::resource('temaries', 'TemaryController');
Route::resource('workers', 'WorkerController');
Route::resource('workshops', 'WorkshopController');
