<?php

namespace App\Http\Controllers\Spider;

use App\Spider\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    //
    public function index()
    {
        $result = Video::where('status', 1)->orderBy('id', 'desc')->paginate(10);
        return $result->toJson();
    }
}
