<?php

namespace App\Spider;

use Illuminate\Database\Eloquent\Model;

class ImageList extends Model
{
    //
    protected $connection = 'mysql_article_spider';

    protected $table = 'image_list';

}
