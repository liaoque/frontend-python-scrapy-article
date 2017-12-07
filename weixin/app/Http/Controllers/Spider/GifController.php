<?php

namespace App\Http\Controllers\Spider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GifController extends Controller
{
    //
    public function index()
    {
        $result = Gif::where('status', 1)->orderBy('id', 'desc')->paginate(10);
        return $result->toJson();
    }
}
