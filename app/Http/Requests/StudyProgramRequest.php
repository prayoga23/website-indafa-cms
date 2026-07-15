<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudyProgramRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'faculty_id' => 'required|exists:faculties,id',

            'name' => 'required|max:255',

            'degree' => 'nullable|max:20',

            'accreditation' => 'nullable|max:50',

            'head_of_program' => 'nullable|max:255',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'vision' => 'nullable',

            'mission' => 'nullable',

            'description' => 'nullable'
        ];
    }
}
