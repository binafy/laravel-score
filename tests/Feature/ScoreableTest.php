<?php

use Binafy\LaravelScore\Models\Score;
use Tests\SetUp\Models\Photo;

test('user can get positive score count', function () {
    $user = createUser();
    $photo = Photo::query()->create(['name' => fake()->name]);

    $user->addScore($photo);

    expect($photo->positiveScores()->count())
        ->toBe(1)
        ->and($photo->scoreable()->first())
        ->toBeInstanceOf(Score::class);
});

test('user can get negative score count', function () {
    $user = createUser();
    $photo = Photo::query()->create(['name' => fake()->name]);

    $user->addNegativeScore($photo);

    expect($photo->negativeScores()->count())->toBe(1);
});

test('user can check give score before', function () {
    $user = createUser();
    $photo = Photo::query()->create(['name' => fake()->name]);
    $photo2 = Photo::query()->create(['name' => fake()->name . '2']);

    $user->addNegativeScore($photo);

    expect($photo->isScored())
        ->toBeTrue()
        ->and($photo2->isScored())
        ->toBeFalse();
});
