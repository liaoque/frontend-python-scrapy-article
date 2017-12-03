<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        $category = new Category();
        $categorys=  $category->tree();
        return $categorys->toJson(JSON_UNESCAPED_UNICODE);
    }
}
