<?php

namespace App;

use App\Traits\UserStampTrait;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use UserStampTrait;

    protected $guarded = [];

    public function commentable() {
        return $this->morphTo();
    }
}
