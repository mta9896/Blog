<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission($permission_name , $permission_type)
    {

        return null !== $this->permissions()->where('name', $permission_name)->where('type' , $permission_type)->first();

    }
}
