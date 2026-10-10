<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['semester', 'code', 'name', 'sks', 'type'];
}
