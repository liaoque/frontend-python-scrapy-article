<?php

namespace App\Http\Controllers\Spider;

use App\Spider\Xiezhen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class XiezhenController extends Controller
{
    //
    public function index()
    {
        $result = Xiezhen::with('imageList')->where('status', 1)->orderBy('id', 'desc')->paginate(10);
        return $result->toJson();
    }
}
