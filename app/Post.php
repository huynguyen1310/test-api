<?php

namespace App;

use App\Traits\UserStampTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $guarded = [];

    use UserStampTrait , SoftDeletes;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class,'commentable');
    }
}
