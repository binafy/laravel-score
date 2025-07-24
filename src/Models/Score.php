<?php

namespace Binafy\LaravelScore\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * The relations to eager load on every query.
     *
     * @var string[]
     */
    protected $with = ['scoreable'];

    /**
     * Create a new instance of the model.
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('laravel-score.table', 'scores');
    }

    // Relations

    /**
     * Relation one-to-many, User model.
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(
            config('laravel-score.user.model', 'App\Models\User'),
            config('laravel-score.user.foreign_key', 'user_id')
        );
    }

    /**
     * Relation morph-to.
     */
    public function scoreable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Check score is negative.
     */
    public function isNegative(): bool
    {
        return $this->score == -1;
    }
}
