<?php
namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public $pageSize = 2;

    public function __construct()
    {
        $this->middleware('auth:member');
    }
}
 