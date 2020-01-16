<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => rtrim($faker->sentence(rand(1,10)), "."),
        'body' => rtrim($faker->paragraphs(rand(3,7), true), "."),
        'open' => false//convert into string with true value
    ];
});
