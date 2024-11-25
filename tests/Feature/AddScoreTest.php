<?php

use Binafy\LaravelScore\Models\Score;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\SetUp\Models\Photo;
use Tests\SetUp\Models\User;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

test('user can give score to scoreable with user id', function () {
    $user = createUser();
    $photo = Photo::query()->create(['name' => fake()->name]);

    $user->addScore($photo, userId: $user->id);

    // DB Assertions
    assertDatabaseCount('scores', 1);
    assertDatabaseHas('scores', [
        'score' => 1,
        'scoreable_id' => $photo->getKey()
    ]);

    // Assertions
    expect($photo->scores->first())
        ->toBeInstanceOf(Score::class)
        ->and($photo->scores->first()->user->name)
        ->toBe($user->name);
});

test('user can give score to scoreable with logged user', function () {
    $user = createUser();
    auth()->login($user);

    $photo = Photo::query()->create(['name' => fake()->name]);

    $user->addScore($photo);

    // DB Assertions
    assertDatabaseCount('scores', 1);
    assertDatabaseHas('scores', [
        'score' => 1,
        'scoreable_id' => $photo->getKey()
    ]);

    // Assertions
    expect($photo->scores->first())
        ->toBeInstanceOf(Score::class)
        ->and($photo->scores->first()->user->name)
        ->toBe($user->name);
});

test('user can give negative score to scoreable with logged user', function () {
    $user = createUser();
    auth()->login($user);

    $photo = Photo::query()->create(['name' => fake()->name]);

    $user->addNegativeScore($photo);

    // DB Assertions
    assertDatabaseCount('scores', 1);
    assertDatabaseHas('scores', [
        'score' => -1,
        'scoreable_id' => $photo->getKey()
    ]);

    // Assertions
    expect($photo->scores->first())
        ->toBeInstanceOf(Score::class)
        ->and($photo->scores->first()->user->name)
        ->toBe($user->name);
});
