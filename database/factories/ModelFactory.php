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

$factory->define(App\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->safeEmail,
        'password'       => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Entities\Category::class, function (Faker\Generator $faker) {
    return [
        'name'               => $faker->name,
        'description'        => $faker->sentence,
        'parent_category_id' => ''
    ];
});
$factory->define(App\Entities\Product::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->name,
        'quanlity'    => $faker->numberBetween(0, 100),
        'status'      => $faker->numberBetween(0, 1),
        'description' => $faker->sentence,
        'name'        => $faker->name,
        'category_id' => App\Entities\Category::all()->random()->id,
    ];
});
