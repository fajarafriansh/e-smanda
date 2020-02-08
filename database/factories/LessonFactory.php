<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Lesson;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Lesson::class, function (Faker $faker) {
    $name = $faker->text(50);
    return [
        'title' => $name,
        'slug' => Str::slug($name),
        'short_text' => $faker->paragraph(),
        'full_text' => $faker->text(1000),
        'position' => rand(1, 10),
        'free_lesson' => rand(0, 1),
        'published' => rand(0, 1),
    ];
});
