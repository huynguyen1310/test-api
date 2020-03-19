<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title',
        'content',
        'views',
        'difficulty',
        'length'
    ];

    public function scopeFilter($query, QueryFilter $filters)
    {
    	return $filters->apply($query);
    }
}
