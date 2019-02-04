<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\EmailTemplate::class, function (Faker $faker) {
	return $data = [
        'title' => $faker->sentence(20),
        'event' => ['UserRegistred','PageVisited','ProfileUpdated'][rand(0,2)],
        'subject' => $faker->sentence(),
        'content' => $faker->sentence(250),
        'type' => rand(0,1) === 1 ? 'automatic' : 'trigger',
        'status' => rand(0,5) === 5 ? 0 : 1,
    ];
});
