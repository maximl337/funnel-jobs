<?php

Route::auth();

Route::get('/', 'JobController@index');

/**
 * TAGS
 */
Route::resource('tags', 'TagController');

/**
 * JOBS
 */
Route::get('jobs/myskills', 'JobController@getByMySkills');

Route::post('jobs/{id}/bid', 'JobController@bid');

Route::resource('jobs', 'JobController');

/**
 * BIDS
 */
Route::get('bids', 'BidController@index');

Route::get('bids/{id}/edit', 'BidController@edit');

Route::post('bids/{id}', 'BidController@update');

Route::delete('bids/{id}', 'BidController@destroy');

Route::post('bids/{jobs}/accept', 'BidController@accept');

/**
 * USER
 */
Route::get('users/jobs', 'JobController@getMyJobs');

Route::get('users/{id}', 'UserController@show');

Route::get('users/{id}/edit', 'UserController@edit');

Route::post('users/{id}', 'UserController@update');

/**
 * Message
 */
Route::post('message/send', 'MessageController@send');