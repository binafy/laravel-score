<?php

namespace Binafy\LaravelScore\Traits;

use Binafy\LaravelScore\Models\Score;

trait Scoreable
{
    /**
     * Relation morph-to-many.
     */
    public function scores(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(
            config('laravel-score.model', Score::class),
            'scoreable'
        );
    }

    /**
     * Relation one-to-many, Score model.
     */
    public function scoreable(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(
            config('laravel-score.model', Score::class),
            'scoreable_id',
        )->where('scoreable_type', $this->getMorphClass());
    }

    /**
     * Get positive score relation.
     */
    public function positiveScores(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->scores()->where('score', 1);
    }

    /**
     * Get negative score relation.
     */
    public function negativeScores(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->scores()->where('score', -1);
    }

    /**
     * Determined user give score before.
     */
    public function isScored(?int $userId = null): bool
    {
        if (is_null($userId)) {
            $userId = auth()->id();
        }

        return $this->scores()->where('user_id', $userId)->exists();
    }

    /**
     * Calculate the net count of scores.
     */
    public function getScoresCount(): int
    {
        $count = 0;
        $this->scores()->get()->each(function (Score $score) use (&$count) {
            if ($score->isNegative()) {
                $count--;
            } else {
                $count++;
            }
        });

        if ($count < 0) {
            return 0;
        }

        return $count;
    }

    /**
     * Removes the score record for the specified user.
     */
    public function removeScore(?int $userId = null): bool
    {
        if (is_null($userId)) {
            $userId = auth()->id();
        }

        return $this->scores()
            ->where('user_id', $userId)
            ->delete();
    }
}
