<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_id',
        'caption',
        ];

    public function videoPreview($video_id){
        return "http://www.youtube.com/watch?v=" . $video_id;
    }

    public function ImageVideoPreview($video_id){
        return "http://img.youtube.com/vi/" . $video_id . "/0.jpg" ;
    }
}
