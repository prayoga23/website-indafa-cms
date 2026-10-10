<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'dean',
        'logo',
        'description',
        'is_active'
    ];
    public function studyPrograms()
{
    return $this->hasMany(StudyProgram::class);
}
public function news()
    {
        // Pastikan di tabel 'news' database Anda memiliki kolom 'faculty_id'
        return $this->hasMany(News::class, 'faculty_id');
    }

    /**
     * SEKALIAN ANTISIPASI: Tambahkan relasi ke Galeri (Galleries)
     */
    public function galleries()
    {
        // Pastikan di tabel 'galleries' database Anda memiliki kolom 'faculty_id'
        return $this->hasMany(Gallery::class, 'faculty_id');
    }
}
