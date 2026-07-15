<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicProcedureStep extends Model
{
    protected $fillable = ['flow_type', 'step_number', 'title', 'description'];
}
