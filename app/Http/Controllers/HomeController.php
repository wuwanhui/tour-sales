<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function customized()
    {
        return view('home');
    }


    public function destination()
    {
        return view('home');
    }
}
