<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSchedule extends Model
{
    protected $fillable = ['day', 'time_range', 'subject_name', 'lecturer_name', 'room', 'semester_level'];
}
