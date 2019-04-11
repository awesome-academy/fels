<?php

use Faker\Generator as Faker;
use App\Models\Lesson;

$factory->define(Lesson::class, function (Faker $faker) {
    $topics = \App\Models\Topic::pluck('id')->toArray();

    return [
        'lesson_name' => $faker->sentence,
        'picture' => 'default.jpg',
        'description' => $faker->paragraph,
        'topic_id' => $faker->randomElement($topics),
    ];
});
