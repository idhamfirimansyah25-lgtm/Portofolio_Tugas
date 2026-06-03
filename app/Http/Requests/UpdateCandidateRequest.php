<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCandidateRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        $id = $this->route('candidate')->id;
        return [
            'candidate_number' => 'required|integer|unique:candidates,candidate_number,' . $id,
            'name' => 'required|string|max:255',
            'vision' => 'required|string',
            'mission' => 'required|string',
        ];
    }
}