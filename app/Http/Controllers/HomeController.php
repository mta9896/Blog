<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['ordinary', 'admin']);
        return view('home');
    }

        /*
        public function someAdminStuff(Request $request)
        {
          $request->user()->authorizeRoles('manager');

          return view(‘some.view’);
        }
        */

//    public function addUser(Request $request){
//
//        DB::table('users')->insert(
//            ['name' => $request->name, 'username' => $request->username, 'email' => $request->email, 'password' => $request->password]
//        );
//    }
}
