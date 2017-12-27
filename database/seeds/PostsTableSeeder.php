<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post1 = new \App\Post();
        $post1->title = "title 1";
        $post1->text = "post 1 text";
        $post1->author_id = 1;
        $post1->save();

        $post2 = new \App\Post();
        $post2->title = "title 2";
        $post2->text = "post 2 text";
        $post2->author_id = 2;
        $post2->save();

        $post2 = new \App\Post();
        $post2->title = "title 3";
        $post2->text = "post 3 text";
        $post2->author_id = 3;
        $post2->save();
    }
}
