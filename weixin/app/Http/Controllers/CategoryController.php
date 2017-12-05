<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategy;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $category = new Category();
        $categorys = $category->tree();
        return $categorys->toJson(JSON_UNESCAPED_UNICODE);
    }
}
