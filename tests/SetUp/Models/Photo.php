<?php

namespace Tests\SetUp\Models;

use Binafy\LaravelScore\Traits\Scoreable;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use Scoreable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['id'];
}
