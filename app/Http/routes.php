<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', ['uses' => 'JobsController@index', 'as' => 'home']);
Route::group(['prefix' => 'job'], function () {
    Route::get('/', ['uses' => 'JobsController@index', 'as' => 'job-home']);
    Route::get('create', ['uses' => 'JobsController@showCreate', 'as' => 'job-create']);
    Route::post('save-job', ['uses' => 'JobsController@saveJob', 'as' => 'job-save']);
    Route::get('edit/{auth_id}', ['uses' => 'JobsController@showEdit', 'as' => 'job-edit']);
    Route::post('update-job', ['uses' => 'JobsController@updateJob', 'as' => 'job-update']);
    Route::get('delete/{auth_id}', ['uses' => 'JobsController@deleteJob', 'as' => 'job-delete']);
    Route::get('search', ['uses' => 'JobsController@searchJobs', 'as' => 'job-search']);
});
