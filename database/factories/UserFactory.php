<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Review;
use Illuminate\Support\Str;
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

// User
$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

// Review
$factory->define(Review::class, function (Faker $faker) {
    return [
        'livehouse_id' => rand(1, 861),
        'user_name' => $faker->firstNameMale,
        'comments' => $faker->paragraph,
        'points' => 0.5 * rand(1, 10),
        'title' => $faker->sentence,
        'user_type' => rand(0, 1),
        'comments_like' => rand(0, 10),
        'official_flg' => 0,
        'regist_date' => now(),
        'update_time' => now(),
    ];
});
