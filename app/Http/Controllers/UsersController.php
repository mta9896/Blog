<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function index(){
        $users = DB::table('users')->get();

        $users = $users
            ->map(function ($item) {
                $result = (array) $item;
                $result = array_merge($result, [
                    '_links' => [
                        'self' => url('/posts/' . $result['id']),
                    ],
                ]);

                return $result;
            });

        return response()->json([
            'users' => $users,
            '_links' => [
                'self' => url('/users')
            ]
        ]);
    }

    public function viewPosts($user_id){
        $posts_array = \App\Post::where('author_id', '=', $user_id)->orderBy('created_at' , 'desc')->get();
        $editable = false;
        if(auth()->user()->id == $user_id)
            $editable = true;
        return view('user_posts', compact('posts_array' , 'editable'));
    }
}
