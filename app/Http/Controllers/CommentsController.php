<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CommentsController extends Controller
{
    public function index(){
        $comments = DB::table('comments')->get();

        $comments = $comments
            ->map(function ($item) {
                $result = (array) $item;
                $result = array_merge($result, [
                    '_links' => [
                        'self' => url('/comments/' . $result['id']),
                        'author' => url('/user/' . $result['user_id'])
                    ],
                ]);

                return $result;
            });

        return response()->json([
            'comments' => $comments,
            '_links' => [
                'self' => url('/comments')
            ]
        ]);
    }

    public function showComments(){
//        $comments = DB::table('comments')->get();
//        return view('comments' , compact('comments'));
    }

}

