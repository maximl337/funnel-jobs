<?php

Route::auth();

Route::get('/', 'JobController@index');

Route::resource('tags', 'TagController');

Route::get('jobs/myskills', 'JobController@getByMySkills');

Route::post('jobs/{id}/bid', 'JobController@bid');

Route::resource('jobs', 'JobController');

Route::get('bids', 'BidController@index');

Route::get('bids/{id}/edit', 'BidController@edit');

Route::post('bids/{id}', 'BidController@update');

Route::delete('bids/{id}', 'BidController@destroy');

Route::get('users/jobs', 'JobController@getMyJobs');