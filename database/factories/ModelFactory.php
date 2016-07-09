<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        
        'name' => $faker->name,
        'title' => $faker->jobTitle,
        'body' => $faker->text(500) ,
        'avatar' => "http://i.imgur.com/zgFv3GQ.jpg",

        'street' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'zip' => $faker->postcode,
        'country' => $faker->country,
        'facebook' => $faker->url,
        'twitter' => $faker->url,
        'linkedin' => $faker->url,
        'googleplus' => $faker->url,
        'github' => $faker->url,
        'stackoverflow' => $faker->url,
        'website' => $faker->url,
        
    ];
});

$factory->define(App\Tag::class, function($faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->define(App\Job::class, function($faker) {
    return [
        'title' 		=> $faker->sentence,
        'body' 		=> $faker->paragraph,
        'deadline_at' 	=> $faker->dateTime
    ];
});
