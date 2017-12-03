<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductToCategory;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    //
    public function index($categoryId){
        $list = [];
        $productToCategory = ProductToCategory::where('category_id', $categoryId)->get();
        foreach ($productToCategory as $item){
            $product =  Product::find($item->product_id);
            $product->name =  $product->description()->first()->name;
            $list[]=  $product;
        }
        return json_encode($list, JSON_UNESCAPED_UNICODE);
    }


}
