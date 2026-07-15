<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    protected $fillable = ['title', 'category', 'image_path', 'activity_date'];
}
