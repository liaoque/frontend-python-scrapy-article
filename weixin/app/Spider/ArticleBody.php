<?php

namespace App\Spider;

use Illuminate\Database\Eloquent\Model;

class ArticleBody extends Model
{
    //
    protected $connection = 'mysql_article_spider';

    protected $table = 'article_body';
}
