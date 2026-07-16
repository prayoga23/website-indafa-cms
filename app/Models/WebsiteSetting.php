<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $fillable = [

        'site_name',
        'tagline',
        'description',

        'logo',
        'favicon',

        'address',
        'phone',
        'whatsapp',
        'email',
        'website',

        'google_maps',

        'facebook',
        'instagram',
        'youtube',
        'twitter',
        'tiktok',
        'linkedin',

        'footer_text',

        'meta_title',
        'meta_description',
        'meta_keywords',

        'cta_pmb_title',
        'cta_pmb_text',
        'cta_pmb_link_register',
        'cta_pmb_link_info'
    ];
}
