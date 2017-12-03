<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';
    protected $primaryKey = 'product_id';

    const CREATED_AT = 'date_added';
    const UPDATED_AT = 'date_modified';

    public $timestamps = true;

    public function description()
    {
        return $this->hasOne('App\ProductDescription', 'product_id', 'product_id')->where('language_id', 1);
    }

    public function images(){
        return $this->hasMany('App\ProductImage', 'product_id', 'product_id');
    }

}
