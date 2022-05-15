<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Store::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        'phone' => $faker->phonenumber,
        'mobile_phone' => $faker->phonenumber,
        'slug' => $faker->slug,
    ];
});
