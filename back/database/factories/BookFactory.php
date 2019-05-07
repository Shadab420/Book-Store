<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        	'title' => $faker->word,
            'coverImg' => 'https://i.imgur.com/9UeLFiE.jpg',
            'author_id' => App\Author::all()->random()->id,
            'pub_id' => App\Publication::all()->random()->id,
            'cat_id' => App\Category::all()->random()->id,
            'description' => $faker->sentence(10, true),
            'price' => $faker->randomNumber(2),
    ];
});
