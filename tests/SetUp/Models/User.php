<?php

namespace Tests\SetUp\Models;

class User extends \Illuminate\Foundation\Auth\User
{
    /**
     * Set fillable for columns.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * Set column to hidden for columns.
     *
     * @var string[]
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Cast columns.
     *
     * @var string[]
     */
    protected $casts = ['email_verified_at' => 'datetime'];
}
