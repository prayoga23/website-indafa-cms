<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomeMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'kaprodi_name',
        'kaprodi_title',
        'kaprodi_image',
        'quote',
        'welcome_text_1',
        'welcome_text_2',
        'profile_link',
        'contact_link',
    ];
}
