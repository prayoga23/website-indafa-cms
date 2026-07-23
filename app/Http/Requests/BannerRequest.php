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
            'title' => 'nullable|max:255',

            'subtitle' => 'nullable|max:255',

            'description' => 'nullable',

            'image' => $bannerId
                ? 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:20480'
                : 'required|image|mimes:jpg,jpeg,png,webp,svg|max:20480',

            'button_text' => 'nullable|max:100',

            'button_link' => 'nullable|string',

            'status' => 'required|in:draft,publish',

            'is_active' => 'required|boolean',

            'sort_order' => 'required|integer|min:0',

            'start_date' => 'nullable|date',

            'end_date' => 'nullable|date|after_or_equal:start_date',
        ];
    }

    public function messages(): array
    {
        return [
            'image.uploaded' => 'Ukuran file gambar terlalu besar untuk diunggah (maksimal 20 MB). Mohon gunakan gambar dengan ukuran di bawah 20 MB atau kompres foto terlebih dahulu.',
            'image.max' => 'Ukuran file gambar tidak boleh lebih dari 20 MB.',
            'image.image' => 'File yang diunggah harus berupa file gambar.',
            'image.mimes' => 'Format gambar yang diperbolehkan hanya JPG, JPEG, PNG, WEBP, atau SVG.',
        ];
    }
}
