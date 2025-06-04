<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PCBuild extends Model
{
    use HasFactory;

    protected $table = 'pc_builds';

    protected $fillable = ['name', 'user_id', 'is_ordered'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function articles()
    {
        return $this->belongsToMany(
            Article::class, 'pc_build_articles', 'pc_build_id', 'article_id'
        )->withTimestamps();
    }

    public function totalPrice() {
        $total = 0.0;
        foreach ($this->articles as $article) {
            $total += floatval($article->Price);
        }
        return $total;
    }
}
