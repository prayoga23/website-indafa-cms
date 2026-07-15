<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [

        'faculty_id',
        'program_studi_id',
        'title',
        'subtitle',
        'description',
        'image',
        'button_text',
        'button_link',
        'status',
        'is_active',
        'sort_order',
        'start_date',
        'end_date',

    ];

    protected $casts = [

        'is_active' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',

    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class);
    }

}
