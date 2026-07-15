<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    protected $fillable = ['exam_date', 'exam_day', 'time_range', 'subject_name', 'room'];
}
