<?php

Route::auth();

Route::get('/', 'JobController@index');

Route::resource('tags', 'TagController');

Route::get('jobs/myskills', 'JobController@getByMySkills');

Route::post('jobs/{id}/bid', 'JobController@bid');

Route::resource('jobs', 'JobController');

Route::get('bids', 'BidController@index');