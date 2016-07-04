<?php

namespace App\Http\Controllers\Manage;

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
  $this->middleware('auth:manage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.home', ['model' => 'home', 'menu' => 'config']);
    }
}
