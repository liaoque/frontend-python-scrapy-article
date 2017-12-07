<?php

namespace App\Spider;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $connection = 'mysql_article_spider';

    protected $table = 'video';
}
