<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryPhoto extends Model
{
    protected $fillable = [
        'gallery_id',
        'image',
        'caption',
        'sort_order'
    ];

    public function gallery()
    {
        return $this->belongsTo(
            Gallery::class
        );
    }
}
