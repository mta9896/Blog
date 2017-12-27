<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableInterface;

class User extends Model implements AuthenticatableInterface
{
    use Authenticatable;

    protected $fillable = ['name', 'username', 'email', 'password'];
    public function posts(){
        $this->hasMany(Post::class);
    }

    public function comments(){
        $this->hasMany(Comment::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function authorizeRoles($roles)

    {

        if (is_array($roles)) {

            return $this->hasAnyRole($roles) ;
//                || abort(401, 'This action is unauthorized.');

        }

        return $this->hasRole($roles);
//            || abort(401, 'This action is unauthorized.');

    }

    public function hasAnyRole($roles)

    {

            return null !== $this->roles()->whereIn('name', $roles)->first();
//        return $this->roles()->whereIn('name', $roles)->first();

    }


    public function hasRole($role)
    {

        return null !== $this->roles()->where('name', $role)->first();

    }

    public function isAuthorized($permission , $post_id){
        $result = false;
        $author_id = Post::where('id', $post_id)->first()->author_id;
        switch ($permission){
            case 'edit':{
                foreach($this->roles as $role){
                    if($role->hasPermission('edit', 'all')){
                        $result = true;
                    }
                }

                foreach($this->roles as $role){
                    if($role->hasPermission('edit', 'self')){
                        if($this->id == $author_id)
                            $result = true;
                    }
                }
            }
            break;

            case 'delete':{
                foreach($this->roles as $role){
                    if($role->hasPermission('delete', 'all')){
                        $result = true;
                    }
                }

                foreach($this->roles as $role){
                    if($role->hasPermission('delete', 'self')){
                        if($this->id == $author_id)
                            $result = true;
                    }
                }
            }
            break;

            case 'view':{
                foreach($this->roles as $role){
                    if($role->hasPermission('view', 'all')){
                        $result = true;
                    }
                }

                foreach($this->roles as $role){
                    if($role->hasPermission('view', 'self')){
                        if($this->id == $author_id)
                            $result = true;
                    }
                }
            }
            break;
        }



        return $result;
    }




}
