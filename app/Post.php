<?php

namespace App;

use App\Traits\UserStampTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    use UserStampTrait;

    public function user() {
        return $this->belongsTo(User::class);
    }
}
