<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        //fetch the auth credentials from the db
        $oauth = DB::table('oauth_clients')
            ->where('password_client', 1)
            ->first();

        $data = (object) [
            'end_point' => url('/oauth/token'),
            'client_id' => $oauth->id,
            'client_secret' => $oauth->secret,
            'username' => auth()->user()->email
        ];

        return view('home', compact('data'));
    }
}
