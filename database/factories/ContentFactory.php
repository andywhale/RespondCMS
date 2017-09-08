<?php

use Faker\Generator as Faker;
use App\Content;

$factory->define(Content::class, function (Faker $faker) {
    return [
        'user_id' => function() { return factory(App\User::class)->create()->id() },
        'title' => $faker->sentence(),
        'body' => $faker->paragraph()
    ];
});
