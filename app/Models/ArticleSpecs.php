<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleSpecs extends Model
{
    use HasFactory;

    public static function createFromNames($article_title, $specs_name) {
        $article = Article::where('Titre', $article_title)->first();
        $specs_id = PCPartSpecs::where('name', $specs_name)->first()->id;
        $article->specs()->attach($specs_id);
    }
}
