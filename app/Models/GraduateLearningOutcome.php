<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GraduateLearningOutcome extends Model
{
    protected $fillable = ['category', 'code_label', 'description', 'order_position'];
}
