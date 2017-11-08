<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function posts(){
        $this->hasMany(Post::class);
    }

    public function comments(){
        $this->hasMany(Comment::class);
    }
}
