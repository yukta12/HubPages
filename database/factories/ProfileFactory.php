<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        //
        'user_id' => factory(App\User::class),
        'website' => $faker->url,
        'git_url' => $faker->url,
        'linkedin_url' => $faker->url,
    ];
});
