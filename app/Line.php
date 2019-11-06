<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_create', 'user_modified', 'status',
    ];
}
