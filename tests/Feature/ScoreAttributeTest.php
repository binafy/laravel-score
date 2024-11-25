<?php

use Tests\SetUp\Models\Photo;

test('user can get positive score count attribute', function () {
    $user = createUser();
    $photo = Photo::query()->create(['name' => fake()->name]);

    $user->addScore($photo);

    // Get positive score count attribute
    expect($photo->positiveScores()->count())->toBe(1);
});
