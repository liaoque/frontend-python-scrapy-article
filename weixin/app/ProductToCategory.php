<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductToCategory extends Model
{
    //
    protected $table = 'product_to_category';
    protected $primaryKey = 'product_id';



    public function product(){
         return $this->hasManyThrough('App\ProductDescription','App\Product',  'product_id', 'product_id', 'product_id', 'product_id');
    }


}
