<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;

class Post extends Model implements Viewable
{
    use HasFactory, InteractsWithViews;

    protected $fillable = [
        'photo',
        'heading',
        'short_content',
        'long_content',
        'total_views'
        ];
}
