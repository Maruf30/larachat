<?php

namespace App\Http\Controllers;
use App\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function index($id)
    { 
        return view('home');
    }

    public function allmessage()
    { 
        return view('allmessage');
    }
    function jsonResponse(){
        $user = DB::table('chats')->get();
        return response()->json($user);
    }
}
