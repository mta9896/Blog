<?php

namespace App\Http\Controllers;

use App\Post;
use App\Policies;
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
        $editable = false;
        $posts_array = Post::orderBy('created_at' , 'desc')->get();
        return view('postsview' , compact('posts_array' , 'editable'));
    }

    public function viewPost($post_id){
        $currentpost = DB::table('posts')->where('id' , $post_id)->first();
        return view('post' , compact('currentpost' , 'comments'));
    }

    public function viewNewPostForm(){
        return view('createpost');
    }

    public function addPost(Request $request){

        if(auth()->user()) { //If user has logged in
            $post = new Post();
            $post->title = $request->title;
            $post->text = $request->text;
            $post->author_id = auth()->user()->id;
            $post->save();
            $post_id = $post->id;
            return view('add_post', compact('post_id'));
        }
        else
            return view('loginerror');
    }

    public function editPost($post_id){
        $currentpost = DB::table('posts')->where('id' , $post_id)->first();
        return view('edit_post' , compact('currentpost'));
    }

    public function edit(Request $request, $post_id){

        if(auth()->user()->isAuthorized('edit' , $post_id)){
            Post::where('id', $post_id)->update(array('title' => $request->title));
            Post::where('id', $post_id)->update(array('text' => $request->text));
            return view('post_edited', compact('post_id'));
        }
//        }
        else
            return view('auth_error');
    }

    public function delete(Request $request, $post_id){
        if(auth()->user()->isAuthorized('delete' , $post_id)){
            DB::table('posts')->where('id' , $post_id)->delete();
            return view('post_deleted');
        }
        else
            return view('auth_error');
    }

}
