<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $bannerId = $this->route('banner');

        return [
            'faculty_id' => 'nullable|exists:faculties,id',
            'program_studi_id' => 'nullable|exists:study_programs,id',
            'title' => 'max:255',

            'subtitle' => 'nullable|max:255',

            'description' => 'nullable',

            'image' => $bannerId
                ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240'
                : 'required|image|mimes:jpg,jpeg,png,webp|max:10240',

            'button_text' => 'nullable|max:100',

            'button_link' => 'nullable|url',

            'status' => 'required|in:draft,publish',

            'is_active' => 'required|boolean',

            'sort_order' => 'required|integer|min:0',

            'start_date' => 'nullable|date',

            'end_date' => 'nullable|date|after_or_equal:start_date',
        ];
    }
}
