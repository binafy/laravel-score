<?php

use Tests\SetUp\Models\Photo;

test('user can get positive score count', function () {
    $user = createUser();
    $photo = Photo::query()->create(['name' => fake()->name]);

    $user->addScore($photo);

    // Get positive score count attribute
    expect($photo->positiveScores()->count())->toBe(1);
});

test('user can get negative score count', function () {
    $user = createUser();
    $photo = Photo::query()->create(['name' => fake()->name]);

    $user->addNegativeScore($photo);

    // Get negative score count attribute
    expect($photo->negativeScores()->count())->toBe(1);
});
