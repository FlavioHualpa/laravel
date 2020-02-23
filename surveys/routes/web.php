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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/questionnaire/create', 'QuestionnaireController@create')->name('qnr.create');
Route::post('/questionnaire/store', 'QuestionnaireController@store')->name('qnr.store');
Route::delete('/questionnaire/delete', 'QuestionnaireController@destroy')->name('qnr.delete');

// Route::get('/questionnaire/easy', 'QuestionnaireController@easyCreate');

Route::get('/questionnaire/{questionnaire}', 'QuestionnaireController@show')->name('qnr.show');


Route::get('/questionnaire/{questionnaire}/survey', 'SurveyController@create')->name('survey.create');
Route::post('/questionnaire/{questionnaire}/survey', 'SurveyController@store')->name('survey.store');

Route::post('/question/store', 'QuestionController@store')->name('question.store');
Route::delete('/question/delete', 'QuestionController@destroy')->name('question.delete');

Route::get('/survey/saved', 'SurveyController@saved')->name('survey.saved');

Route::view('admin', 'admin.notallowed')->name('admin.notallowed');
Route::get('admin/users', 'AdminController@index')->name('admin.users');
Route::get('admin/users/{user}', 'AdminController@show')->name('admin.user.data');
