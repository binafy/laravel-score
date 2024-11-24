<?php

namespace Binafy\LaravelScore\Traits;

use Binafy\LaravelScore\Models\Score;
use Illuminate\Database\Eloquent\Model;

trait InteractWithScore
{
    /**
     *
     */
    public function addScore(Model $scoreable, int|null $userId = null)
    {
        return Score::query()->create([
            'scoreable_id' => $scoreable->getKey(),
            'scoreable_type' => $scoreable::class,
            'user_id' => $userId ?? auth()->id(),
            'score' => 1,
        ]);
    }
}
