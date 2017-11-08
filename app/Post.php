<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments(){
        $this->hasMany(Comment::class);
    }

    public function user(){
        $this->belongsTo(User::class);
    }
}
