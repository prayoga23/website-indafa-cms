<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicDocument extends Model
{
    protected $fillable = ['name', 'file_path', 'file_extension', 'year'];
}
