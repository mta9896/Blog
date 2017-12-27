<?php

use Illuminate\Database\Seeder;

class RolesPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
//     */
    public function run()
    {
        $role_admin  = \App\Role::where('name', 'admin')->first();
        $edit_all = \App\Permission::where('name' , 'edit')->where('type' , 'all')->first();
        $role_admin->permissions()->attach($edit_all);
        $delete_all = \App\Permission::where('name' , 'delete')->where('type' , 'all')->first();
        $role_admin->permissions()->attach($delete_all);
        $view_all = \App\Permission::where('name' , 'view')->where('type' , 'all')->first();
        $role_admin->permissions()->attach($view_all);

        $role_ordinary  = \App\Role::where('name', 'ordinary')->first();
        $edit_self = \App\Permission::where('name' , 'edit')->where('type' , 'self')->first();
        $role_ordinary->permissions()->attach($edit_self);
        $delete_self = \App\Permission::where('name' , 'delete')->where('type' , 'self')->first();
        $role_ordinary->permissions()->attach($delete_self);
        $view_self = \App\Permission::where('name' , 'view')->where('type' , 'self')->first();
        $role_ordinary->permissions()->attach($view_self);

    }
}
