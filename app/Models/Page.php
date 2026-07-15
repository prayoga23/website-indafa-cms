<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [

        'faculty_id',
        'study_program_id',

        'title',
        'slug',

        'excerpt',

        'content',

        'featured_image',

        'status'
    ];

    public function faculty()
    {
        return $this->belongsTo(
            Faculty::class
        );
    }

    public function studyProgram()
    {
        return $this->belongsTo(
            StudyProgram::class
        );
    }
}
