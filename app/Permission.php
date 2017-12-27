<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function roles(){
        $this->belongsToMany(Role::class);
    }
}
