<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoUrl extends Model
{
    use HasFactory;
    protected $fillable=[
        'task_id',
        'videoUrl',
        'thumbnail',
        'status'
    ];
    protected $table = 'video_url';
}