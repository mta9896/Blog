<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $role_ordinary = Role::where('name', 'ordinary')->first();
        $role_admin  = Role::where('name', 'admin')->first();
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('123456');
//        bcrypt('secret')
        $admin->save();
        $admin->roles()->attach($role_admin);

        $role_ordinary  = Role::where('name', 'ordinary')->first();
        $ordinary = new User();
        $ordinary->name = 'User1';
        $ordinary->email = 'sth@example.com';
        $ordinary->password = bcrypt('123456');;
        $ordinary->save();

        $ordinary->roles()->attach($role_ordinary);
        $role_ordinary  = Role::where('name', 'ordinary')->first();
        $ordinary = new User();
        $ordinary->name = 'User2';
        $ordinary->email = 'sth1@example.com';
        $ordinary->password = bcrypt('123456');;
        $ordinary->save();
        $ordinary->roles()->attach($role_ordinary);
    }
}
