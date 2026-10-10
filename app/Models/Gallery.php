<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'faculty_id',
        'study_program_id',
        'title',
        'slug',
        'description',
        'cover_image',
        'status'
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class);
    }

    public function photos()
    {
        return $this->hasMany(
            GalleryPhoto::class
        );
    }
}
