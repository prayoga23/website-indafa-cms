<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicGuidebook extends Model
{
    protected $fillable = ['title', 'badge_text', 'badge_class', 'icon_class', 'icon_wrapper_class', 'description', 'file_path'];
}
