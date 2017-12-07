<?php

namespace App\Spider;

use Illuminate\Database\Eloquent\Model;

class Xiezhen extends Model
{
    //
    protected $connection = 'mysql_article_spider';

    protected $table = 'xiezhen';

    public function imageList(){
        return $this->hasMany(ImageList::class, 'pid', 'id');
    }

}
