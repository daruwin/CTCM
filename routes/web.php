<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


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
Route::get('/classrooms.data', 'ClassroomController@Data')->name('classrooms.data');
Route::get('/classrooms.delete/{id}', function($id) {
	DB::table('classrooms')->where('id', $id)->delete();
	return redirect()->action('ClassroomController@index');
});


Route::resource('applicants', 'ApplicantController');
Route::get('/applicants.data', 'ApplicantController@Data')->name('applicants.data');

Route::resource('proposals', 'ProposalController');
Route::get('/proposals.data', 'ProposalController@Data')->name('proposals.data');

Route::resource('teachers', 'TeacherController');
Route::get('/teachers.data', 'TeacherController@Data')->name('teachers.data');

Route::resource('workers', 'WorkerController');
Route::get('/workers.data', 'WorkerController@Data')->name('worksers.data');

Route::resource('workshops', 'WorkshopController');
Route::get('/workshops.data', 'WorkshopController@Data')->name('workshops.data');

// Pendientes

Route::resource('schedules', 'ScheduleController');

Route::resource('temaries', 'TemaryController');
Route::resource('primary_topics', 'PrimaryTopicController');
Route::resource('secondary_topics', 'SecondaryTopicController');
