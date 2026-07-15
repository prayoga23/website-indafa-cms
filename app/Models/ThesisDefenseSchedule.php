<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThesisDefenseSchedule extends Model
{
    protected $fillable = ['type', 'event_date', 'time', 'thesis_title', 'student_name', 'student_nim', 'room'];
}
