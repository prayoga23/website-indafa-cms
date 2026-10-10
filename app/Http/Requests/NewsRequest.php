<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
        'faculty_id' => 'nullable|exists:faculties,id',
        'study_program_id' => 'nullable|exists:study_programs,id',

        'title' => 'required|max:255',

        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        'content' => 'required',

        'status' => 'required|in:draft,publish',
    ];
}
}
