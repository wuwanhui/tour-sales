<?php
namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public $pageSize = 2;

    public function __construct()
    {
        $this->middleware('auth:manage');
    }
}
 