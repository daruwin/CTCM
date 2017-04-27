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

Route::resource('applicants', 'ApplicantController');
Route::get('/applicants.data', 'ApplicantController@Data')->name('applicants.data');
Route::get('/applicants/{document}/show', 'ApplicantController@show');
Route::post('applicants/approve/{id}',array('uses' => 'ApplicantController@postApprove', 'as' => 'application.approve'));
Route::post('applicants/reject/{id}',array('uses' => 'ApplicantController@postReject', 'as' => 'application.reject'));
Route::get('/applicants.datashow', 'ApplicantController@Datashow')->name('applicants.datashow');

Route::resource('workshops', 'WorkshopController');
Route::get('/workshops.data', 'WorkshopController@Data')->name('workshops.data');