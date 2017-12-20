<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

class PostsController extends Controller
{
    public function index(){
        $posts = DB::table('posts')->get();

        $posts = $posts
            ->map(function ($item) {
                $result = (array) $item;
                $result = array_merge($result, [
                    '_links' => [
                        'self' => url('/posts/' . $result['id']),
                        'author' => url('/user/' . $result['author_id'])
                    ],
                ]);

                return $result;
            });

        return response()->json([
            'posts' => $posts,
            '_links' => [
                'self' => url('/posts')
            ]
        ]);
//        return view('postsview' , compact('posts'));
    }

    public function viewPosts(){
        return view('postsview');
    }

    public function viewPost($post_id){
        $currentpost = DB::table('posts')->where('id' , $post_id)->first();
//        $comments = Post::find(1)->comments;
        return view('post' , compact('currentpost' , 'comments'));
    }

    public function viewNewPostForm(){
        return view('createpost');
    }

    public function addPost(Request $request){
        DB::table('posts')->insert(
            ['title' => $request->title, 'text' => $request->text, 'author_id' => $request->author_id]
        );
        $post_id=Post::count();
        return view('add_post', compact('post_id'));


    }

}
