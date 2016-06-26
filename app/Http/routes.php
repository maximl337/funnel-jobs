<?php

Route::auth();

Route::get('/', 'HomeController@index');

Route::resource('tags', 'TagController');

Route::get('jobs/myskills', 'JobController@getByMySkills');

Route::resource('jobs', 'JobController');
