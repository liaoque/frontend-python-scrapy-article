<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductInfoController extends Controller
{
    //
    public function index($productId){
        $product = Product::find($productId);
        if(!$product){
            return '';
        }
        $description= $product->description()->first();
        if($description->description){
            $description->description = htmlspecialchars_decode($description->description);
        }
        $images= $product->images;

        $result = array_merge($product->toArray(), $description->toArray(), $images->toArray());
        return $result;
    }
}
