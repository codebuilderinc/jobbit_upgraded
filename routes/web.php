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

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/jobs', [App\Http\Controllers\HomeController::class, 'index'])->name('jobs');
Route::get('/jobs/rejected',  [App\Http\Controllers\HomeController::class, 'rejectedJobs'])->name('rejectedJobs');
Route::get('/jobs/messaged', 'HomeController@messagedJobs')->name('messagedJobs');

Route::get('/job/message/{id}', 'HomeController@msgJob')->name('jobs');
Route::post('/job/message/{id}', 'HomeController@postMsgJob');
Route::post('/job/reject/{id}', 'HomeController@postRejectJob');
Route::post('/job/restore/{id}', 'HomeController@postRestoreJob');


Route::post('/push', 'PushController@store');
Route::get('/push', 'PushController@push')->name('push');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
