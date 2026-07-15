<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Tambahkan baris ini jika Anda ingin menggunakan strict type hinting (opsional)
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudyProgram extends Model
{
    protected $fillable = [
        'faculty_id',
        'name',
        'slug',
        'degree',
        'accreditation',
        'head_of_program',
        'logo',
        'vision',
        'mission',
        'description',
        'is_active'
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    /**
     * Tambahkan relasi ke model Lecturer (Dosen) di bawah ini
     */
    public function lecturers(): HasMany
    {
        // Parameter pertama: Nama model target (Dosen Anda, sesuaikan jika namanya Dosen::class)
        // Parameter kedua: Nama foreign key di tabel dosen, biasanya 'study_program_id'
        return $this->hasMany(Lecturer::class, 'study_program_id');
    }
    public function news()
{
    return $this->hasMany(News::class, 'study_program_id');
}

// 2. Relasi ke Galeri (Jika Galeri terikat ke Prodi)
public function galleries()
{
    return $this->hasMany(Gallery::class, 'study_program_id');
}
}
