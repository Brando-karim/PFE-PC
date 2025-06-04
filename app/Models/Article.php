<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function specs()
    {
        return $this->belongsToMany(
            PCPartSpecs::class, 'article_specs', 'article_id', 'specs_id'
        )->withTimestamps();
    }

    public function pc_builds()
    {
        return $this->belongsToMany(
            PCBuild::class, 'pc_build_articles', 'article_id', 'pc_build_id'
        )->withTimestamps();
    }
}
