<?php

use Binafy\LaravelScore\Models\Score;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\SetUp\Models\Photo;
use Tests\SetUp\Models\User;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

/*
 * Use `RefreshDatabase` for delete migration data for each tests.
 */
uses(RefreshDatabase::class);

test('user can give score to scoreable with user id', function () {
    $user = User::query()->create([
        'name' => 'milwad',
        'email' => 'milwad@gmail.com',
        'password' => bcrypt('password'),
    ]);
    $photo = Photo::query()->create(['name' => fake()->name]);

    $user->addScore($photo, $user->id);

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
