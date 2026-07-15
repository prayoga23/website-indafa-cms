<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'event_date',
        'start_time',
        'end_time',
        'location',
        'tag',
    ];

    // Boot method untuk generate slug otomatis saat menyimpan judul agenda baru
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($agenda) {
            $agenda->slug = Str::slug($agenda->title) . '-' . rand(1000, 9999);
        });
    }
}
