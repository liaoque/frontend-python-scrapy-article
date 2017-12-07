<?php

namespace App\Http\Controllers\Spider;

use App\Spider\Duanzi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DuanziController extends Controller
{
    //
    public function index()
    {
        $result = Duanzi::where('status', 1)->orderBy('id', 'desc')->paginate(10);
        return $result->toJson();
    }
}
