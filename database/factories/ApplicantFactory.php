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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Applicant::class, function (Faker\Generator $faker) {
    return [
      'first_name' => str_random(10),
		'middle_name'=>str_random(10),
		'first_surname'=>str_random(10),
		'second_surname'=>str_random(10),
		'birth_date'=>str_random(10),
		'document'=>str_random(10),
		'home_phone'=>str_random(10),
		'mobile_phone'=>str_random(10),
		'email' => str_random(10).'@gmail.com',
		'workshop_name'=>str_random(10),
    ];
});
