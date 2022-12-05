<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'content',
    ];

    public const ABOUT_PAGE_SLUG = 'about-us';
    public const TERMS_PAGE_SLUG = 'terms-and-conditions';
    public const PRIVACY_PAGE_SLUG = 'privacy-policy';

    public static function ABOUT_PAGE_STATUS($slug): int
    {
        $statusCode = Page::where('slug', $slug)->first();
        return $statusCode->status;
    }


}
