<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicCalendar extends Model
{
    protected $fillable = ['semester_type', 'activity_name', 'date_range', 'color_class', 'order_position'];
}
