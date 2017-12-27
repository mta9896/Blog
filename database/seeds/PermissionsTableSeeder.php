<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $edit_all = new \App\Permission();
        $edit_all->name = 'edit';
        $edit_all->description = 'Edit all posts';
        $edit_all->type = 'all';
        $edit_all->save();

        $delete_all = new \App\Permission();
        $delete_all->name = 'delete';
        $delete_all->description = 'Delete all posts';
        $delete_all->type = 'all';
        $delete_all->save();

        $view_all = new \App\Permission();
        $view_all->name = 'view';
        $view_all->description = 'View all posts';
        $view_all->type = 'all';
        $view_all->save();

        $edit_self = new \App\Permission();
        $edit_self->name = 'edit';
        $edit_self->description = 'Edit a post';
        $edit_self->type = 'self';
        $edit_self->save();

        $delete_self = new \App\Permission();
        $delete_self->name = 'delete';
        $delete_self->description = 'Delete a post';
        $delete_self->type = 'self';
        $delete_self->save();

        $view_self = new \App\Permission();
        $view_self->name = 'view';
        $view_self->description = 'View a post';
        $view_self->type = 'self';
        $view_self->save();

    }
}
