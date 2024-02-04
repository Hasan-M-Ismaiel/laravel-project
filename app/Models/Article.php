<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['title', 'body', 'category_id'];

    public function tags () :BelongsToMany
    {   
        return $this->belongsToMany(Tag::class);
    }

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }
}
