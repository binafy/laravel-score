<?php

namespace Binafy\LaravelScore\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait Scoreable
{
    /**
     * Relation morph-to-many.
     */
    public function scores(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(
            config('laravel-score.model', \Binafy\LaravelScore\Models\Score::class),
            'scoreable'
        );
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
}
