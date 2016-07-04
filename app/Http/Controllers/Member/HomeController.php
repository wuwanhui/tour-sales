<?php

namespace App\Http\Controllers\Member;

use App\Http\Requests;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.home', ['model' => 'home', 'menu' => 'config']);
    }
}
