<?php

namespace App\Spider;

use Illuminate\Database\Eloquent\Model;

class Gif extends Model
{
    //
    protected $connection = 'mysql_article_spider';

    protected $table = 'gif';
}
