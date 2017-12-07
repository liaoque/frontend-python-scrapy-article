<?php

namespace App\Http\Controllers\Spider;

use App\Spider\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //
    public function index()
    {
        $result = Article::with('body')->where('status', 1)->orderBy('id', 'desc')->paginate(10);
        return $result->toJson();
    }
}
