<?php

namespace Binafy\LaravelScore\Traits;

use Binafy\LaravelScore\Models\Score;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
}
