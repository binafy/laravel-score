<?php

namespace Binafy\LaravelScore\Traits;

use Binafy\LaravelScore\Models\Score;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

trait InteractWithScore
{
    /**
     * Relation one-to-many, Score model.
     */
    public function scores(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(
            config('laravel-score.model'),
            config('laravel-score.user.foreign_key'),
            $this->getKeyName()
        );
    }

    /**
     * Create score.
     */
    public function addScore(Model $scoreable, $score = 1, int|null $userId = null)
    {
        return Score::query()->create([
            'scoreable_id' => $scoreable->getKey(),
            'scoreable_type' => $scoreable::class,
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
            'scoreable_type' => $scoreable::class,
            'user_id' => $userId ?? auth()->id(),
            'score' => -1,
        ]);
    }

    /**
     * Get positive score count attribute.
     */
    public function positiveScoreCountAttribute(): Attribute
    {
        return Attribute::make(
            get: fn () => $this
                ->scores()
                ->where('score', 1)
                ->count(),
        );
    }
}
