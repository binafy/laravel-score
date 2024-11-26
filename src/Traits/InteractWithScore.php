<?php

namespace Binafy\LaravelScore\Traits;

use Binafy\LaravelScore\Models\Score;
use Illuminate\Database\Eloquent\Model;

trait InteractWithScore
{
    /**
     * Relation one-to-many, Score model.
     */
    public function scorings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(
            config('laravel-score.model', \Binafy\LaravelScore\Models\Score::class),
            config('laravel-score.user_foreign_key', 'user_id'),
            $this->getKeyName()
        );
    }

    /**
     * Create score.
     */
    public function addScore(Model $scoreable, int $score = 1, int|null $userId = null)
    {
        return Score::query()->create([
            'scoreable_id' => $scoreable->getKey(),
            'scoreable_type' => $scoreable->getMorphClass(),
            'user_id' => $userId ?? auth()->id(),
            'score' => $score,
        ]);
    }

    /**
     * Create negative score.
     */
    public function addNegativeScore(Model $scoreable, int|null $userId = null)
    {
        return Score::query()->create([
            'scoreable_id' => $scoreable->getKey(),
            'scoreable_type' => $scoreable->getMorphClass(),
            'user_id' => $userId ?? auth()->id(),
            'score' => -1,
        ]);
    }
}
