<?php

namespace Binafy\Traits;


trait Scoreable
{
    /**
     * Relation morph-to-many.
     */
    public function scores(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(
            config('laravel-score.model', Binafy\LaravelScore\Models\Score::class),
            'scoreable'
        );
    }
}
