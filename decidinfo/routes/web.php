<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SurveyController;

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

Route::get('/dashboard/survey/index', [SurveyController::class, 'index'])
    ->name('surveys.index');

Route::get('/dashboard/survey/create', [SurveyController::class, 'create'])
    ->name('surveys.create');

Route::get('/dashboard/survey/main', [SurveyController::class, 'show'])
    ->name('surveys.main');

Route::get('/dashboard/survey/section', [SectionController::class, 'create'])
    ->name('surveys.section');

Route::post('/dashboard/survey/nextStep', [SurveyController::class, 'nextStep'])
    ->name('surveys.nextStep');

Route::post('/dashboard/survey/prevStep', [SurveyController::class, 'prevStep'])
    ->name('surveys.prevStep');