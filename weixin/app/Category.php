<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'category';
    protected $primaryKey = 'category_id';

    const CREATED_AT = 'date_added';
    const UPDATED_AT = 'date_modified';

    public $timestamps = true;
//    protected $dateFormat = 'U';


    public function description (){
        return $this->hasMany('App\CategoryDescription', 'category_id', 'category_id')->where('language_id', 1);
    }


    public function tree($parentId = 0){
        $categorys = $this->where('status', 1)->where('parent_id', $parentId)->get();
        if(empty($categorys)){
            return false;
        }
        foreach ($categorys as $key => $category){
            $categorys[$key]->children = $this->tree($category->category_id);
            $categorys[$key]->name = $category->description()->first()->name;
        }
        return $categorys;
    }

}
