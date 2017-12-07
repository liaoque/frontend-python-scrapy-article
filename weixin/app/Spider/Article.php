<?php

namespace App\Spider;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $connection = 'mysql_article_spider';

    protected $table = 'article';

    public function body()
    {
        return $this->hasOne(ArticleBody::class, 'aid', 'id');
    }
}
