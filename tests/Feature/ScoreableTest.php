<?php

use Binafy\LaravelScore\Models\Score;
use Tests\SetUp\Models\Photo;
use Tests\SetUp\Models\User;
use function Pest\Laravel\assertDatabaseEmpty;

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

test('user can get negative scores count', function () {
    $user = createUser();
    $user2 = User::query()->create([
        'name' => 'binafy',
        'email' => 'binafy@gmail.com',
        'password' => bcrypt('password'),
    ]);
    $user3 = User::query()->create([
        'name' => 'taylor',
        'email' => 'taylor@gmail.com',
        'password' => bcrypt('password'),
    ]);
    $photo = Photo::query()->create(['name' => fake()->name]);

    $user->addNegativeScore($photo);
    $user2->addNegativeScore($photo);
    $user3->addNegativeScore($photo);

    expect($photo->getScoresCount())->toBe(0);
});

test('user can get positive scores count', function () {
    $user = createUser();
    $user2 = User::query()->create([
        'name' => 'binafy',
        'email' => 'binafy@gmail.com',
        'password' => bcrypt('password'),
    ]);
    $user3 = User::query()->create([
        'name' => 'taylor',
        'email' => 'taylor@gmail.com',
        'password' => bcrypt('password'),
    ]);
    $photo = Photo::query()->create(['name' => fake()->name]);

    $user->addScore($photo);
    $user2->addScore($photo);
    $user3->addScore($photo);

    expect($photo->getScoresCount())->toBe(3);
});

test('user can delete score', function () {
    $user = createUser();
    $photo = Photo::query()->create(['name' => fake()->name]);

    $user->addScore($photo, userId: $user->getKey());
    $photo->removeScore(userId: $user->getKey());

    assertDatabaseEmpty('scores');

    auth()->login($user);
    $photo = Photo::query()->create(['name' => fake()->name]);

    $user->addScore($photo);
    $photo->removeScore();

    assertDatabaseEmpty('scores');
});
