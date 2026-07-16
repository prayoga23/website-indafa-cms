<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'site_name' => 'required|max:255',

            'tagline' => 'nullable|max:255',

            'description' => 'nullable',

            'logo' => 'nullable|image|max:10240',

            'favicon' => 'nullable|image|max:5120',

            'address' => 'nullable',

            'phone' => 'nullable|max:50',

            'whatsapp' => 'nullable|max:50',

            'email' => 'nullable|email',

            'website' => 'nullable|url',

            'google_maps' => 'nullable',

            'facebook' => 'nullable|url',

            'instagram' => 'nullable|url',

            'youtube' => 'nullable|url',

            'twitter' => 'nullable|url',

            'tiktok' => 'nullable|url',

            'linkedin' => 'nullable|url',

            'footer_text' => 'nullable',

            'meta_title' => 'nullable|max:255',

            'meta_description' => 'nullable',

            'meta_keywords' => 'nullable',

            'cta_pmb_title' => 'nullable|max:255',
            'cta_pmb_text' => 'nullable',
            'cta_pmb_link_register' => 'nullable|max:255',
            'cta_pmb_link_info' => 'nullable|max:255',
        ];
    }
}
